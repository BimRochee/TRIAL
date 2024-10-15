<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Exception\Auth\UserNotFound;
use Kreait\Firebase\Exception\AuthException;
use Kreait\Firebase\Exception\FirebaseException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class AdminRequestController extends Controller
{
    protected $database;
    protected $auth;

    public function __construct()
    {
        $serviceAccountPath = base_path('resources\credentials\firebase_credentials.json');
        $databaseUrl = 'https://cacaotrace-f69ac-default-rtdb.asia-southeast1.firebasedatabase.app/';
        if (!file_exists($serviceAccountPath)) {
            throw new \Exception('The Firebase credentials file does not exist at the specified path: ' . $serviceAccountPath);
        }

        $this->database = (new Factory)
            ->withServiceAccount($serviceAccountPath)
            ->withDatabaseUri($databaseUrl)
            ->createDatabase();

        $this->auth = (new Factory)
            ->withServiceAccount($serviceAccountPath)
            ->createAuth();
    }

    public function showRequestsData()
    {
        $requests = $this->database->getReference('Registration_requests')->getValue();

        if (!is_array($requests)) {
            $requests = [];
        }

        // Concatenate province and city into address
        foreach ($requests as &$request) {
            if (isset($request['province']) && isset($request['city'])) {
                $request['address'] = $request['city'] . ', ' . $request['province'];
            }
        }

        return $requests;
    }
    public function showRequests()
    {
        $requests = $this->showRequestsData();
        return view('admin.requests', compact('requests'));
    }

    public function approveRequest($id)
    {
        $request = $this->database->getReference('Registration_requests/' . $id)->getValue();

        if ($request) {
            $userProperties = [
                'email' => $request['email'],
                'password' => $request['password'],
                'displayName' => $request['username'],
                'disabled' => false,
            ];

            try {
                $createdUser = $this->auth->createUser($userProperties);

                // Send email verification link
                $this->auth->sendEmailVerificationLink($request['email']);

                // Update the status to 'approved'
                $request['status'] = 'Approved';

                // Move the data to the appropriate collection based on role
                if ($request['role'] === 'Admin') {
                    $this->database->getReference('Admins/' . $createdUser->uid)->set($request);
                } elseif ($request['role'] === 'Consolidator') {
                    $this->database->getReference('Consolidators/' . $createdUser->uid)->set($request);
                }

                // Delete the request from 'registration_requests'
                $this->database->getReference('Registration_requests/' . $id)->remove();

                // Remove the email notification code
                // mail($request['email'], 'Registration Approved', 'Your registration has been approved.');

                return redirect()->route('admin-dashboard')->with('status', 'Registration request approved.');
            } catch (\Exception $e) {
                return back()->withErrors(['error' => 'Failed to approve registration request.']);
            }
        }

        return back()->withErrors(['error' => 'Registration request not found.']);
    }

    public function denyRequest($id)
    {
        $this->database->getReference('registration_requests/' . $id)->remove();
        return redirect()->route('admin-dashboard')->with('status', 'Registration request denied.');
    }
}
