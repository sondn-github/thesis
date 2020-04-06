<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\DatatableServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DatatableController extends Controller
{
    protected $datatableService;

    public function __construct(DatatableServiceInterface $datatableService)
    {
        $this->datatableService = $datatableService;
    }

    public function lessons() {
        $teacherId = Auth::id();
        return $this->datatableService->lessons($teacherId);
    }
}
