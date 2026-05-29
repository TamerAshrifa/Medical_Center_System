<?php

namespace App\Providers;

use App\Repositories\Interfaces\Repo_interface_ResetPasswordToken;
use App\Repositories\Interfaces\Repo_interface_User;
use App\Repositories\Repo_ResetPasswordToken;
use App\Repositories\Repo_User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            Repo_interface_User::class,
            Repo_User::class
        );

        $this->app->bind(
            Repo_interface_ResetPasswordToken::class,
            Repo_ResetPasswordToken::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
