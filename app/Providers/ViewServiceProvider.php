<?php


namespace App\Providers;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{

    protected $admin, $admin_aside;

    public function __construct()
    {
        $this->admin = [
            'admin.*'
        ];
        $this->admin_aside = [
            'admin.layouts.aside'
        ];
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $_system_config = json_decode('{}');
            $_system_config->site_name = "111";
            $view->with(compact('_system_config'));
        });
        view()->composer($this->admin_aside,function($view){

            $active_route = Route::currentRouteName();
            $view->with(compact('active_route'));
        });
//        view()->composer($this->admin, function($view){
//            $view->with(compact('_daili_list', '_online_member_array'));
//        });
    }
}
