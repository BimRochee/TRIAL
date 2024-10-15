<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AdminRegistrationController extends Controller
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

    public function showStep1()
    {
        return view('user-admin.register-admin');
    }

    public function handleStep1(Request $request)
    {
        $request->validate([
            'role' => 'required|string|in:Admin,Consolidator',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'province' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'birthdate' => 'required|date',
            'civil_status' => 'required|string|in:single,married,divorced',
            'emp_no' => 'required|string|max:20'
        ]);

        $request->session()->put('registration', $request->only([
            'role',
            'first_name',
            'last_name',
            'province',
            'city',
            'birthdate',
            'civil_status',
            'emp_no'
        ]));

        logger('Step 1 data:', $request->session()->get('registration'));

        return redirect()->route('admin.register.step2');
    }

    public function showStep2()
    {
        return view('user-admin.register-admin-s2');
    }

    public function handleStep2(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|max:50',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $registrationData = $request->session()->get('registration');
        $registrationData['username'] = $request->username;
        $registrationData['email'] = $request->email;
        $registrationData['password'] = $request->password;
        $registrationData['status'] = 'Pending';
        $registrationData['date_registered'] = Carbon::now()->toDateTimeString();

        $this->database->getReference('Registration_requests/' . uniqid())->set($registrationData);

        Log::info('Step 2 data stored in Firebase:', $registrationData);

        $request->session()->forget('registration');

        return redirect()->route('admin.register.complete')->with('status', 'Your registration request has been submitted and is awaiting approval.');
    }

    public function showComplete()
    {
        return view('user-admin.register-admin-complete');
    }

    public function showRequests()
    {
        $requests = $this->database->getReference('Registration_requests')->getValue();
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

                // Update the status to 'approved'
                $request['status'] = 'Approved';

                // Move the data to the 'admins' collection
                $this->database->getReference('Admins/' . $createdUser->uid)->set($request);

                // Delete the request from 'registration_requests'
                $this->database->getReference('Registration_requests/' . $id)->remove();

                // Send email notification to the user (this is a simplified example, you should use a mail service)
                mail($request['email'], 'Registration Approved', 'Your registration has been approved.');

                return redirect()->route('admin.requests')->with('status', 'Registration request approved.');
            } catch (\Exception $e) {
                return back()->withErrors(['error' => 'Failed to approve registration request.']);
            }
        }

        return back()->withErrors(['error' => 'Registration request not found.']);
    }

    public function denyRequest($id)
    {
        $this->database->getReference('Registration_requests/' . $id)->remove();
        return redirect()->route('admin.requests')->with('status', 'Registration request denied.');
    }
}
