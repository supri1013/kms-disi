<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //tampilkan dashboard
    public function index()
    {
        return view ('admin.dashboard');
    }
}
