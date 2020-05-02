<?php


namespace App\Services;


use App\Criteria;
use App\Evaluation;
use App\Services\Interfaces\ReportServiceInterface;
use App\User;
use Illuminate\Support\Facades\DB;

class ReportService extends Service implements ReportServiceInterface
{
    public function getNumberEvaluationByCriteriaType() {
        return Evaluation::select(DB::raw('count(users.role_id) as count, criteria_type, roles.name as role_name'))
            ->join('users', 'evaluations.user_id', '=', 'users.id')
            ->join('roles', 'users.role_id', 'roles.id')
            ->where(Evaluation::COL_CRITERIA_TYPE, '!=', 3)
            ->where('roles.name', '!=', 'admin')
            ->groupBy([Evaluation::COL_CRITERIA_TYPE, 'roles.name'])
            ->get()
            ->toArray();
    }
}
