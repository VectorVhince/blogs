<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Notification;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $notifs = Notification::where('active','1')->get();

        View::share('notifs', $notifs);
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
