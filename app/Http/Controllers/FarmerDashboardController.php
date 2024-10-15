<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FarmerDashboardController extends Controller
{
    public function index()
    {
        return view('farmer.dashboard');
    }
    public function showProfile()
    {
        // Your logic for showing the profile
        return view('farmer.profile');
    }

}

