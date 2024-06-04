<?php

namespace App\Providers;

use App\Helpers\HelperMethods;
use App\Helpers\Setting;
use App\Models\User;
use App\View\Composers\MenuComposer;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Lab404\Impersonate\Events\LeaveImpersonation;
use Lab404\Impersonate\Events\TakeImpersonation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Define facades
        /*$this->app->bind('setting',function(){
            return new Setting();
        });
        $this->app->bind('helperMethods',function(){
            return new HelperMethods();
        });*/
        $this->app->singleton('setting', Setting::class); // should use singleton instead of bind to avoid multiple instances
        $this->app->singleton('helperMethods', HelperMethods::class);

        if ($this->app->runningInConsole()) {
            $this->app->register(\InfyOm\Generator\InfyOmGeneratorServiceProvider::class);
        }
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //this line is only necessary because infyom set the adminlte as default template
        Paginator::useTailwind();
        //override the infyom model generator to add extra informations
        $loader = AliasLoader::getInstance();
        $loader->alias('BinaryTorch\LaRecipe\Models\Documentation','App\Overrides\larecipe\Documentation');
        if ($this->app->isLocal()) {
            $loader->alias('InfyOm\Generator\Generators\Scaffold\ViewGenerator', 'App\Overrides\infyomlabs\ViewGenerator');
            $loader->alias('InfyOm\Generator\Generators\Scaffold\ControllerGenerator', 'App\Overrides\infyomlabs\ControllerGenerator');
            $loader->alias('InfyOm\Generator\Generators\ModelGenerator', 'App\Overrides\infyomlabs\ModelGenerator');
            $loader->alias('InfyOm\Generator\Generators\FactoryGenerator', 'App\Overrides\infyomlabs\FactoryGenerator');
            $loader->alias('InfyOm\Generator\Utils\TableFieldsGenerator', 'App\Overrides\infyomlabs\TableFieldsGenerator');
        }
        //defined the alias for facades here or directly on config/app.php
        $loader->alias('Setting', \App\Facades\Setting::class);
        $loader->alias('HelperMethods', \App\Facades\HelperMethods::class);

        //enable/disable documentation per role
        Gate::define('viewLarecipe', function (?User $user, $documentation) {
            //for guest users
            if (empty($user)) {
                return false;
            } else { // for authenticated users
                if ($user->can('adminFullApp')) {
                    return true;
                } elseif ($user->can('adminApp')) {
                    return true;
                } elseif ($user->can('manageApp')) {
                    return true;
                } elseif ($user->can('accessAsClient')) {
                    return true;
                }
            }
            return false;
        });

        // Build out the impersonation event listeners - Otherwise we get a redirect to login if not setting the password_hash_sanctum when using sanctum.
        Event::listen(function (TakeImpersonation $event) {
            session()->put([
                'password_hash_sanctum' => $event->impersonated->getAuthPassword(),
            ]);
        });

        Event::listen(function (LeaveImpersonation $event) {
            session()->remove('password_hash_web');
            session()->put([
                'password_hash_sanctum' => $event->impersonator->getAuthPassword(),
            ]);
            Auth::setUser($event->impersonator);
        });

        //view composers
        View::composer('*', 'App\View\Composers\ThemeComposer');
        View::composer('*', 'App\View\Composers\LayoutComposer');
        View::composer(['components.backend.mobile-menu.index', 'components.backend.themes.*',], MenuComposer::class);

        //observers
        //Demo::observe(DemoObserver::class); // or direcly on the model using somethig like #[ObservedBy([DemoObserver::class])]
    }
}
