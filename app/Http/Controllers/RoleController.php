<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $roles = $this->role->all();
        return view('nav.users', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->role->create($request->all());
        return redirect()->route('admin.users.index');
    }

    // Add methods for edit, update, and delete as needed
}

