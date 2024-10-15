<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Kreait\Firebase\Factory;

class RegistrationController extends Controller
{

    protected $database;
    protected $auth;

    public function __construct()
    {
        $serviceAccountPath = base_path('resources\credentials\firebase_credentials.json'); // Update this path
        $databaseUrl = 'https://traco-3b79e-default-rtdb.firebaseio.com/'; // Update this URL

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

    /*----------------FARMER REGISTRATION----------------- */
    public function showStep1()
    {
        return view('auth.user-farmer.farmer-register-s1');
    }

    public function handleStep1(Request $request)
    {
        // Validate and store the data in session
        $request->validate([
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'address' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'contact_no' => 'required|string|max:11',
            'civil_status' => 'required|string|max:20',
        ]);

        $request->session()->put('registration', $request->only([
            'first_name',
            'last_name',
            'province',
            'city',
            'birthdate',
            'contact_no',
            'civil_status'
        ]));

        // Log the session data for debugging
        logger('Step 1 data:', $request->session()->get('registration'));

        // Retrieve the Firebase user from the session
        $firebaseUser = session('firebase_user');
        if (!$firebaseUser) {
            // Initialize a temporary user in Firebase with a dummy email and password
            $firebaseUrl = 'https://identitytoolkit.googleapis.com/v1/accounts:signUp?key=AIzaSyBeWu3TUtJ21xFNpJMLrZH3kog0EvtlEm8';
            $data = [
                'email' => 'dummy' . Str::random(10) . '@example.com',
                'password' => 'dummyPassword123',
                'returnSecureToken' => true,
            ];

            $response = Http::post($firebaseUrl, $data);

            if ($response->successful()) {
                $firebaseUser = $response->json();
                session(['firebase_user' => $firebaseUser]);
            } else {
                return back()->withErrors(['error' => 'Failed to register with Firebase.']);
            }
        }

        // Construct the Firebase Realtime Database URL
        $firebaseDatabaseUrl = 'https://traco-3b79e-default-rtdb.firebaseio.com/farmers/' . $firebaseUser['localId'] . '.json';

        // Prepare the data for Firebase
        $additionalData = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'province' => $request->province,
            'city' => $request->city,
            'birthdate' => $request->birthdate,
            'contact_no' => $request->contact_no,
            'civil_status' => $request->civil_status,
        ];

        // Send the data to Firebase Realtime Database
        $response = Http::put($firebaseDatabaseUrl, $additionalData);

        // Log the response from Firebase
        logger('Firebase Response:', $response->json());

        if ($response->successful()) {
            // Redirect to the second step
            return redirect()->route('register.step2');
        } else {
            return back()->withErrors(['error' => 'Failed to submit data to Firebase.']);
        }
    }

    public function showStep2()
    {
        return view('auth.user-farmer.farmer-register-s2');
    }

    public function handleStep2(Request $request)
    {
        // Validate and store the data in session
        $request->validate([
            'farm_address' => 'required|string|max:255',
            'total_farm_hectare' => 'required|numeric',
            'total_cacao_hectare' => 'required|numeric',
            'variety' => 'required|array',
            'clone' => 'required|array',
            'cacao_type_selling' => 'required|array',
        ]);

        // Merge the data with the existing session data
        $request->session()->put('registration', array_merge($request->session()->get('registration'), $request->only([
            'farm_address',
            'total_farm_hectare',
            'total_cacao_hectare',
            'variety',
            'clone',
            'cacao_type_selling'
        ])));

        // Retrieve the Firebase user from the session
        $firebaseUser = session('firebase_user');

        // Construct the Firebase Realtime Database URL
        $firebaseDatabaseUrl = 'https://traco-3b79e-default-rtdb.firebaseio.com/farmers/' . $firebaseUser['localId'] . '.json';

        // Prepare the additional data
        $additionalData = [
            'farm_address' => $request->farm_address,
            'total_farm_hectare' => $request->total_farm_hectare,
            'total_cacao_hectare' => $request->total_cacao_hectare,
            'variety' => $request->variety,
            'clone' => $request->clone,
            'cacao_type_selling' => $request->cacao_type_selling,
        ];

        // Send the data to Firebase Realtime Database
        $response = Http::patch($firebaseDatabaseUrl, $additionalData);

        if ($response->successful()) {
            // Redirect to the third step
            return redirect()->route('register.step3');
        } else {
            return back()->withErrors(['error' => 'Failed to submit data to Firebase.']);
        }
    }

    public function showStep3()
    {
        return view('auth.user-farmer.farmer-register-s3');
    }

    public function handleStep3(Request $request)
    {
        // Validate the request data
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Get all the data from the session
        $registrationData = $request->session()->get('registration');

        // logger('Session Registration Data:', $registrationData);

        // Register the user with Firebase Authentication
        $firebaseUrl = 'https://identitytoolkit.googleapis.com/v1/accounts:signUp?key=AIzaSyBeWu3TUtJ21xFNpJMLrZH3kog0EvtlEm8';
        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'returnSecureToken' => true,
        ];

        $response = Http::post($firebaseUrl, $data);

        if ($response->successful()) {
            $firebaseUser = $response->json();
            $idToken = $firebaseUser['idToken'];

            // Update the user profile with the display name and additional information
            $profileUpdateUrl = 'https://identitytoolkit.googleapis.com/v1/accounts:update?key=AIzaSyBeWu3TUtJ21xFNpJMLrZH3kog0EvtlEm8';
            $profileData = [
                'idToken' => $idToken,
                'displayName' => $request->username,
                'returnSecureToken' => true,
            ];

            $profileResponse = Http::post($profileUpdateUrl, $profileData);

            logger('Firebase Profile Update Response:', $profileResponse->json());

            if ($profileResponse->successful()) {
                // Construct the Firebase Realtime Database URL
                $firebaseDatabaseUrl = 'https://traco-3b79e-default-rtdb.firebaseio.com/farmers/' . $firebaseUser['localId'] . '.json';

                // Prepare the additional data
                $additionalData = array_merge($registrationData, [
                    'username' => $request->username,
                    'email' => $request->email,
                ]);

                // Send the data to Firebase Realtime Database
                $dbResponse = Http::patch($firebaseDatabaseUrl, $additionalData);

                logger('Firebase Database Response:', $dbResponse->json());

                if ($dbResponse->successful()) {
                    // Clear the session data
                    $request->session()->forget('registration');

                    // Redirect to a success page or the dashboard
                    return redirect()->route('admin.admin-dashboard')->with('status', 'Registration complete!');
                } else {
                    return back()->withErrors(['error' => 'Failed to submit additional information to Firebase.']);
                }
            } else {
                return back()->withErrors(['error' => 'Failed to update user profile in Firebase.']);
            }
        } else {
            logger('Firebase Registration Error:', $response->json());
            return back()->withErrors(['error' => 'Failed to register with Firebase.']);
        }
    }
}