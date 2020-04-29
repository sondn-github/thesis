<?php


namespace App\Services;


use App\Fact;
use App\Knowledge;
use App\Services\Interfaces\KnowledgeServiceInterface;

class KnowledgeService extends Service implements KnowledgeServiceInterface
{
    public function getRuleByType($type) {
        return Knowledge::where(Knowledge::COL_TYPE, $type)
            ->where(Knowledge::COL_STATUS, Knowledge::ACTIVE_STATUS)
            ->get();
    }

    public function filterConclusions($conclusions) {
        $rightConclusions = [];
        foreach ($conclusions as $conclusion) {
            foreach ($conclusion as $conclusionId => $reliability) {
                if ($reliability >= Knowledge::MIN_RELIABILITY) {
                    $rightConclusions[] = $conclusionId;
                }
            }
        }

        return $rightConclusions;
    }

    public function getAdvises($sr) {
        $conclusions = $this->deduceWithRule2($this->deduceWithRule1($sr));
        $rightConclusions = $this->filterConclusions($conclusions);

        return Fact::whereIn(Fact::COL_ID, $rightConclusions)
            ->where(Fact::COL_TYPE, Fact::TYPE_ADVISE)
            ->get();
    }

    public function deduceWithRule1($sr) {
        $conclusions = [];
        $rules = $this->getRuleByType(Knowledge::TYPE_1);
        foreach ($rules as $rule) {
            if ($this->compareWithRule1($sr, $rule)) {
                $conclusions[] = array($rule->conclusion => $rule->reliability);
            }
        }

        return $conclusions;
    }

    public function removeUsedConclusions($conclusionsSource, $usedConclusion) {
        $source = $conclusionsSource;
        foreach ($usedConclusion as $conclusionId) {
            unset($source[$conclusionId]);
        }
        return $source;
    }

    public function deduceWithRule2($conclusionsFromRule1) {
        $rules = $this->getRuleByType(Knowledge::TYPE_2);
        $conclusions = $conclusionsFromRule1;
        $isDone = false;
        $rulesIsUsed = [];
        foreach ($rules as $rule) {
            $rulesIsUsed[$rule->id] = false;
        }
        while (!$isDone) {
            $isDone = true;
            foreach ($rules as $rule) {
                $usedConclusions = $this->compareWithRule2($conclusions, $rule);
                if ($usedConclusions && !$rulesIsUsed[$rule->id]) {
                    $rulesIsUsed[$rule->id] = true;
                    $isDone = false;
                    $conclusions = $this->removeUsedConclusions($conclusions, $usedConclusions);
                    $conclusions[] = array($rule->conclusion => $rule->reliability);
                }
            }
        }

        return $conclusions;
    }

    public function compareWithRule1($sr, $rule) {
        $premises = $rule->premise;
        foreach ($premises as $premise) {
            $temp = explode(",", $premise);
            $criteriaId = $temp[0];
            $operator = $temp[1];
            $value = $temp[2];
            if (isset($sr[$criteriaId])) {
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
            } else {
                return false;
            }
        }

        return true;
    }

    public function compareWithRule2($conclusions, $rule) {
        $premises = $rule->premise;
        $usedConclusions = [];
        $count = 0;
        foreach ($premises as $premise) {
            $temp = explode(",", $premise);
            $factId = $temp[0];
            $startValue = $temp[1];
            $endValue = $temp[2];
            foreach ($conclusions as $key => $conclusion) {
                if (isset($conclusion[$factId]) && $conclusion[$factId] >= $startValue && $conclusion[$factId] <= $endValue) {
                    $usedConclusions[] = $key;
                    $count++;
                }
            }
        }

        if ($count == count($premises)) {
            return $usedConclusions;
        } else {
            return false;
        }
    }

    public function changeStatus($request) {
        return Knowledge::findOrFail($request->id)
            ->update([
                Knowledge::COL_STATUS => $request->input(Knowledge::COL_STATUS),
            ]);
    }

    public function convertToPremiseWithType1($request) {
        $premises = [];

        foreach ($request->criteria as $key => $criteriaId) {
            $premise = $criteriaId.','.Knowledge::OPERATORS[$request->operators[$key]].','.$request->scores[$key];
            array_push($premises, $premise);
        }

        return $premises;
    }

    public function storeRuleType1($request) {
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

    public function updateRuleType1($request, $id) {
        return Knowledge::findOrFail($id)
            ->update([
                Knowledge::COL_CODE => $request->input(Knowledge::COL_CODE),
                Knowledge::COL_TYPE => Knowledge::TYPE_1,
                Knowledge::COL_PREMISE => $this->convertToPremiseWithType1($request),
                Knowledge::COL_CONCLUSION => $request->input(Knowledge::COL_CONCLUSION),
                Knowledge::COL_RELIABILITY => $request->input(Knowledge::COL_RELIABILITY),
                Knowledge::COL_STATUS => $request->input(Knowledge::COL_STATUS),
            ]);
    }

    public function convertToPremiseWithType2($request) {
        $premises = [];

        foreach ($request->facts as $key => $factId) {
            $premise = $factId.','.$request->scoresFrom[$key].','.$request->scoresTo[$key];
            array_push($premises, $premise);
        }

        return $premises;
    }

    public function storeRuleType2($request) {
        return Knowledge::create([
            Knowledge::COL_CODE => $request->input(Knowledge::COL_CODE),
            Knowledge::COL_TYPE => Fact::findOrFail($request->input(Knowledge::COL_CONCLUSION))->type,
            Knowledge::COL_PREMISE => $this->convertToPremiseWithType2($request),
            Knowledge::COL_CONCLUSION => $request->input(Knowledge::COL_CONCLUSION),
            Knowledge::COL_RELIABILITY => $request->input(Knowledge::COL_RELIABILITY),
            Knowledge::COL_STATUS => $request->input(Knowledge::COL_STATUS),
        ]);
    }

    public function updateRuleType2($request, $id) {
        return Knowledge::findOrFail($id)
            ->update([
                Knowledge::COL_CODE => $request->input(Knowledge::COL_CODE),
                Knowledge::COL_TYPE => Fact::findOrFail($request->input(Knowledge::COL_CONCLUSION))->type,
                Knowledge::COL_PREMISE => $this->convertToPremiseWithType2($request),
                Knowledge::COL_CONCLUSION => $request->input(Knowledge::COL_CONCLUSION),
                Knowledge::COL_RELIABILITY => $request->input(Knowledge::COL_RELIABILITY),
                Knowledge::COL_STATUS => $request->input(Knowledge::COL_STATUS),
            ]);
    }
}
