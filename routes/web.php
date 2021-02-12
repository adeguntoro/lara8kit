<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => true, // Register Routes...
    'reset' => false, // Reset Password Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

//captcha
// Route::get('/contact-form', [App\Http\Controllers\CaptchaServiceController::class, 'index']);
Route::post('/captcha-validation', [App\Http\Controllers\CaptchaServiceController::class, 'capthcaFormValidate']);
Route::get('/reload-captcha', [App\Http\Controllers\CaptchaServiceController::class, 'reloadCaptcha']);