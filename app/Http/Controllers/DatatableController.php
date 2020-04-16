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

    public function courses() {
        return $this->datatableService->courses(Auth::id());
    }

    public function criteria() {
        return $this->datatableService->criteria();
    }

    public function facts() {
        return $this->datatableService->facts();
    }

    public function knowledge() {
        return $this->datatableService->knowledge();
    }
}
