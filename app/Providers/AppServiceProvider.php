<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Notification;
use App\Posts;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        if (Schema::hasTable('notifications')) {

            view()->composer('*', function ($view) 
            {
                if (Auth::user()) {

                    $notifs = Notification::where('user_id', Auth::user()->id)->take(10)->latest()->get();
                    // dd($notifs->get());
                    $view->with('notifs', $notifs);    

                }
            });  

        }

        if (Schema::hasTable('posts')) {

            view()->composer('*', function ($view) {

                $archive_year = Posts::where('approved','1')->orderBy('created_at','asc')->get()->groupBy(function($date) {
                    return Carbon::parse($date->created_at)->format('Y');
                });

                $archive_month = Posts::where('approved','1')->orderBy('created_at','asc')->get()->groupBy(function($date) {
                    return Carbon::parse($date->created_at)->format('Y-F');
                });

                $view->with('archive_year', $archive_year)->with('archive_month', $archive_month);

            }); 
        }
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
