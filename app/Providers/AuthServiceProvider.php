<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-stuff', function ($user) {
            return $user->role == 'admin';
        });

        Gate::define('candidate-stuff', function ($user) {
            return $user->role == 'candidate';
        });

        Gate::define('same-candidate', function ($user, $currentId) {
            return $user->role == 'candidate' && $user->has('candidato') && $user->candidato->id == $currentId;
        });
    }
}
