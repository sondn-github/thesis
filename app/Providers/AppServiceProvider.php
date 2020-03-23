<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces;
use App\Services;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    protected $applicationServices = [
        Interfaces\UserServiceInterface::class => Services\UserService::class,
        Interfaces\LessonServiceInterface::class => Services\LessonService::class,
        Interfaces\CategoryServiceInterface::class => Services\CategoryService::class,
        Interfaces\RoleServiceInterface::class => Services\RoleService::class,
        Interfaces\CriteriaServiceInterface::class => Services\CriteriaService::class,
        Interfaces\EvaluationServiceInterface::class => Services\EvaluationService::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Get all languages
        $dir    = base_path().'/resources/lang';
        $files2 = array_diff(scandir($dir), array('..', '.'));
        View::share('languages', $files2);

        // Get current language
        View::share('currLang', App::getLocale());
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
