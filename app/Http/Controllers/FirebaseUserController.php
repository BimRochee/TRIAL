<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class FirebaseUserController extends Controller
{
    protected $database;

    public function __construct()
    {
        $this->database = app('firebase.database');
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role' => 'required|string|in:admin,consolidator,farmer',
        ]);

        $newUser = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        $this->database->getReference('users')->push($newUser);

        return response()->json(['message' => 'User created successfully']);
    }
}
