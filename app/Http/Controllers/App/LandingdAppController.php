<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LandingdAppController extends Controller
{
    public function index(Request $request): View
    {
        return view('landing.index');
    }
}
