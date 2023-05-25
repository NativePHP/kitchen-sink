<?php

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

Route::get('/', function () {
    return view('welcome', [
        'title' => 'Welcome',
    ]);
});
Route::get('/notifications', function () {
    return view('notifications', [
        'title' => 'Notifications',
    ]);
});
Route::view('/clipboard', 'clipboard');
Route::view('/dialogs', 'dialogs');
Route::view('/screen', 'screen');
Route::view('/global-shortcuts', 'global-shortcuts');
Route::view('/app', 'app');
Route::view('/frameless', 'frameless');

Route::get('/job', function () {
    dispatch(new App\Jobs\TestJob());
    return redirect('/dashboard');
})->name('job');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
