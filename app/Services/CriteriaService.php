<?php


namespace App\Services;


use App\Criteria;
use App\Services\Interfaces\CriteriaServiceInterface;

class CriteriaService extends Service implements CriteriaServiceInterface
{
    public function getAllCriteria()
    {
        return Criteria::all();
    }
}
