<?php


namespace App\Services;


use App\Fact;
use App\Http\Requests\StoreKnowledgeRequest;
use App\Http\Requests\UpdateKnowledgeRequest;
use App\Knowledge;
use App\Services\Interfaces\KnowledgeServiceInterface;
use Illuminate\Http\Request;

class KnowledgeService extends Service implements KnowledgeServiceInterface
{
    public function getRuleByType($type) {
        return Knowledge::where(Knowledge::COL_TYPE, $type)
            ->where(Knowledge::COL_STATUS, Knowledge::ACTIVE_STATUS)
            ->get();
    }

    public function getAdvises($sr) {
        $advisesId = $this->deduceWithRule2($this->deduceWithRule1($sr));

        return Fact::whereIn(Fact::COL_ID, $advisesId)
            ->get();
    }

    public function deduceWithRule1($sr) {
        $conclusions = [];
        $rules = $this->getRuleByType(1);
        foreach ($rules as $rule) {
            if ($this->compareWithRule1($sr, $rule)) {
                $conclusions[$rule->conclusion] = $rule->reliability;
            }
        }

        return $conclusions;
    }

    public function deduceWithRule2($conclusions) {
        $rules = $this->getRuleByType(2);
        $advises = [];

        foreach ($rules as $rule) {
            if ($this->compareWithRule2($conclusions, $rule) && $rule->reliability >= Knowledge::MIN_RELIABILITY) {
                array_push($advises, $rule->conclusion);
            }
        }

        return $advises;
    }

    public function compareWithRule1($sr, $rule) {
        $premises = $rule->premise;
        foreach ($premises as $premise) {
            $temp = explode(",", $premise);
            $criteriaId = $temp[0];
            $operator = $temp[1];
            $value = $temp[2];
            switch ($operator) {
                case ">":
                    if ($sr[$criteriaId] <= $value) {
                        return false;
                    }
                    break;
                case ">=":
                    if ($sr[$criteriaId] < $value) {
                        return false;
                    }
                    break;
                case "<":
                    if ($sr[$criteriaId] >= $value) {
                        return false;
                    }
                    break;
                case "<=":
                    if ($sr[$criteriaId] > $value) {
                        return false;
                    }
                    break;
            }
        }

        return true;
    }

    public function compareWithRule2($conclusions, $rule) {
        $premises = $rule->premise;
        foreach ($premises as $premise) {
            $temp = explode(",", $premise);
            $factId = $temp[0];
            $startValue = $temp[1];
            $endValue = $temp[2];
            if (!(isset($conclusions[$factId]) && $conclusions[$factId] >= $startValue && $conclusions[$factId] <= $endValue)) {
                return false;
            }
        }

        return true;
    }

    public function changeStatus($request) {
        return Knowledge::findOrFail($request->id)
            ->update([
                Knowledge::COL_STATUS => $request->input(Knowledge::COL_STATUS),
            ]);
    }

    public function convertToPremiseWithType1(Request $request) {
        $premises = [];

        foreach ($request->criteria as $key => $criteriaId) {
            $premise = $criteriaId.','.Knowledge::OPERATORS[$request->operators[$key]].','.$request->scores[$key];
            array_push($premises, $premise);
        }

        return $premises;
    }

    public function storeRuleType1(Request $request) {
        return Knowledge::create([
            Knowledge::COL_CODE => $request->input(Knowledge::COL_CODE),
            Knowledge::COL_TYPE => Knowledge::TYPE_1,
            Knowledge::COL_PREMISE => $this->convertToPremiseWithType1($request),
            Knowledge::COL_CONCLUSION => $request->input(Knowledge::COL_CONCLUSION),
            Knowledge::COL_RELIABILITY => $request->input(Knowledge::COL_RELIABILITY),
            Knowledge::COL_STATUS => $request->input(Knowledge::COL_STATUS),
        ]);
    }

    public function getKnowledgeById($id) {
        return Knowledge::findOrFail($id);
    }

    public function updateRuleType1(Request $request, $id) {
        return Knowledge::findOrFail($id)
            ->update([
                Knowledge::COL_CODE => $request->input(Knowledge::COL_CODE),
                Knowledge::COL_PREMISE => $this->convertToPremiseWithType1($request),
                Knowledge::COL_CONCLUSION => $request->input(Knowledge::COL_CONCLUSION),
                Knowledge::COL_RELIABILITY => $request->input(Knowledge::COL_RELIABILITY),
                Knowledge::COL_STATUS => $request->input(Knowledge::COL_STATUS),
            ]);
    }
}
