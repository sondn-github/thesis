<?php


namespace App\Services;


use App\Criteria;
use App\Evaluation;
use App\Services\Interfaces\ReportServiceInterface;
use App\Type;
use App\User;
use Illuminate\Support\Facades\DB;

class ReportService extends Service implements ReportServiceInterface
{
    public function getNumberEvaluationByCriteriaType() {
        return Evaluation::select(DB::raw('count(users.role_id) as count, criteria_type, roles.name as role_name'))
            ->join('users', 'evaluations.user_id', '=', 'users.id')
            ->join('roles', 'users.role_id', 'roles.id')
            ->where(Evaluation::COL_CRITERIA_TYPE, '!=', Type::TYPE_GV)
            ->where('roles.name', '!=', 'admin')
            ->groupBy([Evaluation::COL_CRITERIA_TYPE, 'roles.name'])
            ->get();
    }

    //Report
    public function getTotalEvaluation() {
        return Evaluation::with('course')
            ->selectRaw('count(user_id) as count, course_id, criteria_type')
            ->where(Evaluation::COL_CRITERIA_TYPE, '!=', Type::TYPE_GV)
            ->groupBy([Evaluation::COL_COURSE_ID, Evaluation::COL_CRITERIA_TYPE])
            ->get();
    }

    public function getDetailEvaluationByCriteriaType($criteriaType) {
        $evaluations = Evaluation::with('course')
            ->select(DB::raw('count(users.role_id) as count, roles.name as role_name, course_id'))
            ->join('users', 'evaluations.user_id', '=', 'users.id')
            ->join('roles', 'users.role_id', 'roles.id')
            ->where('roles.name', '!=', 'admin')
            ->where(Evaluation::COL_CRITERIA_TYPE, '!=', Type::TYPE_GV)
            ->groupBy(['course_id', 'roles.name']);

        if ($criteriaType == 1) {
            $evaluations = $evaluations->where(Evaluation::COL_CRITERIA_TYPE, Type::TYPE_ICT);
        } else {
            $evaluations = $evaluations->where(Evaluation::COL_CRITERIA_TYPE, '!=', Type::TYPE_ICT);
        }
        return $evaluations->get();
    }
}
