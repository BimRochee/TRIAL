<?php

namespace App\Firebase;

use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Contract\Auth as FirebaseAuth;
use App\Models\User;

class FirebaseUserProvider implements UserProvider
{
   protected $hasher;
   protected $model;
   protected $auth;
   public function __construct(HasherContract $hasher, $model)
   {
      $this->model = $model;
      $this->hasher = $hasher;
      $this->auth = app('firebase.auth');
   }
   public function retrieveById($identifier)
   {
      Log::info('Retrieving user by UID:', [$identifier]);

      try {
         $firebaseUser = $this->auth->getUser($identifier);

         $user = new User([
            'localId' => $firebaseUser->uid,
            'email' => $firebaseUser->email,
            'displayName' => $firebaseUser->displayName
         ]);

         return $user;
      } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
         Log::error('No user with UID found:', ['uid' => $identifier, 'error' => $e->getMessage()]);
         return null;
      } catch (\Exception $e) {
         Log::error('Error retrieving user:', ['uid' => $identifier, 'error' => $e->getMessage()]);
         return null;
      }
   }
   public function retrieveByToken($identifier, $token)
   {
   }
   public function updateRememberToken(UserContract $user, $token)
   {
   }
   public function retrieveByCredentials(array $credentials)
   {
   }
   public function validateCredentials(UserContract $user, array $credentials)
   {
   }
}
