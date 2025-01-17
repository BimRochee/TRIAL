<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Firebase\Guard as FirebaseGuard;
use App\Firebase\FirebaseUserProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
   protected $policies = [
      // 'App\Model' => 'App\Policies\ModelPolicy',
   ];
   public function boot()
   {
      $this->registerPolicies();

      Auth::provider('firebaseuserprovider', function ($app, array $config) {
         return new FirebaseUserProvider($app['hash'], $config['model']);
      });
   }
}