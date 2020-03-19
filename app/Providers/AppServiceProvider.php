<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces;
use App\Services;

class AppServiceProvider extends ServiceProvider
{
    protected $applicationServices = [
        Interfaces\UserServiceInterface::class => Services\UserService::class,
        Interfaces\LessonServiceInterface::class => Services\LessonService::class,
        Interfaces\CategoryServiceInterface::class => Services\CategoryService::class,
        Interfaces\RoleServiceInterface::class => Services\RoleService::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->applicationServices as $interface => $service) {
            $this->app->bind($interface, $service);
        }
    }
}
