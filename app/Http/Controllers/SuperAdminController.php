<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        return view('super-admin.super_admin-dashboard');
    }
}

