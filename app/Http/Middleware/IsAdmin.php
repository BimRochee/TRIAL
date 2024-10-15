<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;
use Kreait\Firebase\Auth;

class IsAdmin
{
    protected $firebaseAuth;

    /**
     * Create a new middleware instance.
     *
     * @param \Kreait\Firebase\Auth $firebaseAuth
     */
    public function __construct(Auth $firebaseAuth)
    {
        $this->firebaseAuth = $firebaseAuth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        $uid = Session::get('uid');

        if ($uid) {
            try {
                // Get the Firebase user by UID
                $user = $this->firebaseAuth->getUser($uid);

                // Check if the customClaims array has the "admin" key and it is set to true
                if (isset($user->customClaims['admin']) && $user->customClaims['admin'] === true) {
                    return $next($request); // User is an admin, proceed to the next request
                } else {
                    return redirect('/home')->with('error', 'You are not authorized to access this page.');
                }
            } catch (\Exception $e) {
                // Handle Firebase exceptions (e.g., invalid UID, network issues)
                return redirect('/home')->with('error', 'There was an issue verifying your access.');
            }
        }

        // No user in session, redirect to home or login
        return redirect('/home')->with('message', 'You need to log in to access this page.');
    }
}
