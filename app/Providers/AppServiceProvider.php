<?php
namespace App\Providers;

use App\Models\Banner;
use App\Models\Email;
use App\Models\Info;
use App\Models\Infos;
use App\Models\Menu;
use App\Models\Phone;
use App\Models\Service;
use App\Repositories\MenuRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(MenuRepository::class, function ($app) {
            return new MenuRepository(new Menu);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        View::composer('*', function ($view) {
            $infos = Infos::first();
            $email = Email::first()->email;
            $phone = Phone::first()->phone;
            $menus = Menu::all();
            $banners = Banner::first();
            $view->with(compact('infos', 'email', 'phone', 'menus', 'banners'));
        });
    }
}
