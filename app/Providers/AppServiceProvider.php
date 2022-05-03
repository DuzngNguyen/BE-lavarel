<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use TrungPhuNA\Blog\Entities\Menu;
use TrungPhuNA\Setting\Entities\SettingSidebar;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        try{
            $sidebarGlobal = SettingSidebar::where('m_status',2 )
            ->orderBy('m_sort','asc')->get();
            \View::share('sidebarGlobal', $sidebarGlobal ?? []);

            $menus = Menu::all();
            \View::share('menus', $menus ?? []);
        }catch (\Exception $exception)
        {

        }
    }
}
