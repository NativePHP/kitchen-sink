<?php

use App\Livewire\App;
use App\Livewire\ChildProcess;
use App\Livewire\Clipboard;
use App\Livewire\ContextMenu;
use App\Livewire\Dialogs;
use App\Livewire\Dock;
use App\Livewire\GlobalShortcuts;
use App\Livewire\MenuBar;
use App\Livewire\MenuBarApp;
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

if (PHP_OS === 'Darwin') {
    Route::get('/dock', Dock::class);
}

Route::get('/screen', Screen::class);
Route::get('/global-shortcuts', GlobalShortcuts::class);
Route::get('/app', App::class);
Route::get('/window', Window::class);
Route::get('/context-menu', ContextMenu::class);
Route::get('/menu-bar', MenuBar::class);

Route::get('/menubarapp', MenuBarApp::class)->name('menubar');

Route::view('/frameless', 'frameless');
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
