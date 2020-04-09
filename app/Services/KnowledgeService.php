<?php


namespace App\Services;


use App\Fact;
use App\Knowledge;
use App\Services\Interfaces\KnowledgeServiceInterface;

class KnowledgeService extends Service implements KnowledgeServiceInterface
{
    public function getRuleByType($type) {
        $rules = Knowledge::where(Knowledge::COL_TYPE, $type)
            ->where(Knowledge::COL_STATUS, Knowledge::ACTIVE_STATUS)
            ->get();

        return $rules;
    }

    public function getAdvises($sr) {
        $advisesId = $this->deduceWithRule2($this->deduceWithRule1($sr));
        $advises = Fact::whereIn(Fact::COL_ID, $advisesId)
            ->get();

        return $advises;
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
        $premises = json_decode($rule->premise, true);
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
        $premises = json_decode($rule->premise, true);
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
}
