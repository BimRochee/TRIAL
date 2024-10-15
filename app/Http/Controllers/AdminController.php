<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Exception\Auth\UserNotFound;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;

class AdminController extends Controller
{
    protected $database;
    protected $auth;
    public function __construct()
    {
        $serviceAccount = base_path('resources\credentials\firebase_credentials.json');
        $databaseUrl = 'https://traco-3b79e-default-rtdb.firebaseio.com/';

        // Check if the service account file exists
        // if (!file_exists($serviceAccount)) {
        //     throw new \Exception('The Firebase credentials file does not exist at the specified path: ' . $serviceAccount);
        // }

        // Initialize Firebase with the credentials and database URL
        $this->database = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri($databaseUrl)
            ->createDatabase();

        $this->auth = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->createAuth();
    }

    public function dashboard()
    {
        return view('admin.admin-dashboard');
    }

    public function transactions()
    {
        return view('admin.transactions');
    }

    public function index()
    {
        $adminsRef = $this->database->getReference('admins');
        $adminsSnapshot = $adminsRef->getSnapshot();
        $admins = $adminsSnapshot->getValue();
        // $admins = Admin::paginate(10);
        return view('list.admins', compact('admins'));
    }
}
