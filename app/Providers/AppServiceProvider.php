<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Inertia::version(function () {
            return md5_file(public_path('mix-manifest.json'));
        });

        Inertia::share([
                           'errors' => function () {
                               return Session::get('errors')
                                   ? Session::get('errors')->getBag('default')->getMessages()
                                   : (object)[];
                           },
                           // Lazily shared auth data
                           'auth' => function () {
                               return [
                                   'user' => auth()->user() ? [
                                       'id' => auth()->user()->id,
                                       'name' => auth()->user()->name
                                   ] : null
                               ];
                           },
                            'flash' => function () {
                                return Session::get('message');
                            }
                       ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
