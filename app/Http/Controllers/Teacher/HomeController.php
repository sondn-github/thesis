<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home() {
        return view('admin.home');
    }
}
