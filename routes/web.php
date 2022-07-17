<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

# ==================================================================================== #
#  Email Verification Routes                                                           #
# ==================================================================================== #
// The Email Verification Notice
// Route::get('/email/verify', function () {
//     return view('auth.verify');
// })->middleware('auth')->name('verification.notice');

// // The Email Verification Handler
// Route::get('/email/verify/{id}/{hash}', function (Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
//     $request->fulfill();
 
//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// // Resending The Verification Email
// Route::post('/email/verification-notification', function (Illuminate\Http\Request $request) {
//     $request->user()->sendEmailVerificationNotification();
 
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
# ==================================================================================== #
# End of Email Verification Routes                                                     #
# ==================================================================================== #

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
            ->middleware('verified')
            ->name('home');

# ==================================================================================== #
# Admin Routes                                                                         #
# ==================================================================================== #
Route::prefix('admin')
        ->name('admin.')
        //->middleware(['verified', 'auth'])
        ->group(function () {

    Route::resource('/users', App\Http\Controllers\Admin\UserController::class);

    Route::get('/unsubscribe', [App\Http\Controllers\Admin\UserController::class, 'unsubscribe']);
});
# ==================================================================================== #
# End Admin Routes                                                                     #
# ==================================================================================== #
Route::get('/unsubscribe/{user}', function (Illuminate\Http\Request $request) {
 
    return "hola";
})->name('unsubscribe');