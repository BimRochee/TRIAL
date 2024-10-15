<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Exception\Auth\UserNotFound;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Firebase;

class UserController extends Controller
{
    protected $database;

    public function __construct()
    {
        $serviceAccountPath = base_path('resources/credentials/firebase_credentials.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccountPath)
            ->withDatabaseUri('https://cacaotrace-f69ac-default-rtdb.asia-southeast1.firebasedatabase.app/');
        $this->database = $firebase->createDatabase();
    }

    public function index()
    {
        $admins = $this->database->getReference('admins')->getValue();
        Log::info('Admins:', ['admins' => $admins]);

        if (!is_array($admins)) {
            $admins = [];
        }

        return view('users.index', compact('admins'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'displayName' => 'required|string|max:255',
        ]);

        $userProperties = [
            'email' => $request->email,
            'displayName' => $request->displayName,
        ];

        try {
            $this->auth->updateUser($id, $userProperties);
            $this->database->getReference('admins/' . $id)->update($request->all());

            return redirect()->route('users.index')->with('status', 'User updated successfully.');
        } catch (UserNotFound $e) {
            return back()->withErrors(['error' => 'User not found.']);
        }
    }

    public function destroy($id)
    {
        try {
            $user = $this->auth->getUser($id);

            if ($user->disabled) {
                $this->auth->enableUser($id);
                $this->database->getReference('admins/' . $id . '/disabled')->set(false);
                return back()->with('status', 'User enabled successfully.');
            } else {
                $this->auth->disableUser($id);
                $this->database->getReference('admins/' . $id . '/disabled')->set(true);
                return back()->with('status', 'User disabled successfully.');
            }
        } catch (UserNotFound $e) {
            return back()->withErrors(['error' => 'User not found.']);
        }
    }

    public function countOnboardedUsers(Request $request)
    {
        $usersRef = $this->database->getReference('Users');

        $onboardedCount = 0;

        $users = $usersRef->getValue();

        if (is_array($users)) {
            foreach ($users as $user) {
                if (isset($user['Onboarding']['onboarding_done']) && $user['Onboarding']['onboarding_done'] == true) {
                    $onboardedCount++;
                }
            }
        }

        return view('admin.admin-dashboard', ['totalMembers' => $onboardedCount]);
    }
}
