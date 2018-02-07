<?php

namespace App\Providers;

use App\Notifications\NewEventCreated;
use App\Notifications\VerifyEmail;
use App\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Request::macro('intersectKeys', function ($keys) {
            return array_intersect_key($this->all(), array_flip($keys));
        });

        \App\User::created(function ($user) {
           $user->notify(new VerifyEmail());
        });

        \App\Event::created(function ($event) {
            Notification::send(User::all(), new NewEventCreated($event));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
