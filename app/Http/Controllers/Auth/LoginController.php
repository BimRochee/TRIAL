<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Auth as FirebaseAuth;
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase\Exception\Auth\FailedToSignIn;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
  use AuthenticatesUsers;

  protected $redirectTo = RouteServiceProvider::HOME;
  protected $auth;
  protected $database;

  public function __construct(FirebaseAuth $auth)
  {
    $this->middleware('guest')->except('logout');
    $this->auth = $auth;

    // Initialize Firebase database
    $serviceAccountPath = base_path('resources/credentials/firebase_credentials.json');
    $databaseUrl = 'https://cacaotrace-f69ac-default-rtdb.asia-southeast1.firebasedatabase.app/';
    $this->database = (new \Kreait\Firebase\Factory)
      ->withServiceAccount($serviceAccountPath)
      ->withDatabaseUri($databaseUrl)
      ->createDatabase();
  }

  protected function login(Request $request)
  {
    $this->validateLogin($request);

    try {
      $signInResult = $this->auth->signInWithEmailAndPassword($request['email'], $request['password']);
      $firebaseUser = $signInResult->data();

      // Set session
      $loginUid = $signInResult->firebaseUserId();
      Session::put('uid', $loginUid);

      // Log the user's UID to verify
      Log::info('User logged in with UID:', [$firebaseUser]);

      // Store user data in Firebase Realtime Database
      $userData = [
        'email' => $firebaseUser['email'],
        'name' => $firebaseUser['displayName'] ?? '',
        'last_login' => now()->toDateTimeString(),
      ];
      $this->database->getReference('users/' . $loginUid)->set($userData);

      // Assuming Auth::loginUsingId() is used for session management
      Auth::loginUsingId($loginUid);

      return redirect($this->redirectPath());
    } catch (FailedToSignIn $e) {
      Log::error('Firebase authentication failed: ' . $e->getMessage());
      throw ValidationException::withMessages([$this->username() => [trans('auth.failed')]]);
    } catch (FirebaseException $e) {
      Log::error('Firebase exception: ' . $e->getMessage());
      throw ValidationException::withMessages([$this->username() => [trans('auth.failed')]]);
    }
  }

  public function username()
  {
    return 'email';
  }

  public function handleCallback(Request $request, $provider)
  {
    $socialTokenId = $request->input('social-login-tokenId', '');

    try {
      $verifiedIdToken = $this->auth->verifyIdToken($socialTokenId);
      $firebaseUser = $verifiedIdToken->claims();

      // Store user data in Firebase Realtime Database
      $userData = [
        'email' => $firebaseUser['email'],
        'name' => $firebaseUser['name'],
        'last_login' => now()->toDateTimeString(),
      ];
      $this->database->getReference('users/' . $firebaseUser['user_id'])->set($userData);

      // Assuming Auth::loginUsingId() is used for session management
      Auth::loginUsingId($firebaseUser['user_id']);

      return redirect($this->redirectPath());
    } catch (\InvalidArgumentException $e) {
      Log::error('Invalid token: ' . $e->getMessage());
      return redirect()->route('login')->withErrors(['error' => 'Invalid token']);
    } catch (FirebaseException $e) {
      Log::error('Firebase exception: ' . $e->getMessage());
      return redirect()->route('login')->withErrors(['error' => 'Authentication failed']);
    }
  }

  protected function validateLogin(Request $request)
  {
    $request->validate([
      $this->username() => 'required|string',
      'password' => 'required|string',
    ]);
  }
}
