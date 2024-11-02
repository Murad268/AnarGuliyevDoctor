<?php

use App\Models\Lang;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('language/{code}', [\App\Http\Controllers\SwitchLanguageController::class, 'switch'])->name('language.switch');
Route::get('search', [\App\Http\Controllers\SearchController::class, 'search'])->name('search');


$mainLang =  'az';
$repository = app(\App\Repositories\MenuRepository::class);
Cache::put('app_locale', $mainLang);
$lang = Cache::get('app_locale', config('app.locale'));
Route::prefix('')
    ->name('client.')
    ->middleware('web') // Add the 'web' middleware here
    ->group(function () use ($repository, $lang) {
        foreach ($repository->all() as $link) {

            if ($link->code == 'home') {
                Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name($link->code);
            } else if ($link->code == 'about') {
                Route::get($link->getTranslation('link', $lang),  [\App\Http\Controllers\AboutController::class, 'index'])->name($link->code);
            } else if ($link->code == 'portfolio') {
                Route::get($link->getTranslation('link', $lang),  [\App\Http\Controllers\PortfolioController::class, 'index'])->name($link->code);
            } else if ($link->code == 'services') {
                Route::get($link->getTranslation('link', $lang),  [\App\Http\Controllers\ServiceController::class, 'index'])->name($link->code);
            } else if ($link->code == 'blogs') {
                Route::get($link->getTranslation('link', $lang),  [\App\Http\Controllers\BlogsController::class, 'index'])->name($link->code);
            } else if ($link->code == 'contact') {
                Route::get($link->getTranslation('link', $lang),  [\App\Http\Controllers\ContactController::class, 'index'])->name($link->code);
            } else if ($link->code == 'blog') {
                Route::get($link->getTranslation('link', $lang)."/{slug}", [\App\Http\Controllers\BlogsController::class, 'blog'])->name($link->code);
            } else if ($link->code == 'service') {
                Route::get($link->getTranslation('link', $lang)."/{slug}", [\App\Http\Controllers\ServiceController::class, 'service'])->name($link->code);
            }
        }
    });


