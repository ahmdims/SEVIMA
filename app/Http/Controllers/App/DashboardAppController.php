<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardAppController extends Controller
{
    public function index(Request $request): View
    {
        return view('app.dashboard.index');
    }
}
