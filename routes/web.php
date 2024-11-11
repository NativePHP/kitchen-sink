<?php

use App\Livewire\App;
use App\Livewire\ChildProcess;
use App\Livewire\Clipboard;
use App\Livewire\Dialogs;
use App\Livewire\Notifications;
use App\Livewire\Screen;
use App\Livewire\Window;
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
    return redirect('/app');
});
Route::get('/notifications', Notifications::class);
Route::get('/clipboard', Clipboard::class);
Route::get('/child-processes', ChildProcess::class);
Route::get('/dialogs', Dialogs::class);
Route::get('/screen', Screen::class);
Route::view('/global-shortcuts', 'global-shortcuts');
Route::get('/app', App::class);
Route::get('/window', Window::class);
Route::view('/frameless', 'frameless');
Route::view('/context-menu', 'context-menu');

Route::view('/new-window', 'new-window');

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
