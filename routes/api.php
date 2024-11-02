<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('service-contact', [\App\Http\Controllers\ContactController::class, 'serviceContact'])->name('contact.service');
Route::post('contact', [\App\Http\Controllers\ContactController::class, 'contact'])->name('contact.contact');
Route::post('/appointments', [\App\Http\Controllers\AppointmentController::class, 'store']);
Route::post('/contact-form', [\App\Http\Controllers\ContactFormController::class, 'store']);