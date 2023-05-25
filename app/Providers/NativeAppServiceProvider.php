<?php

namespace App\Providers;

use App\Events\MyCustomShortcutEvent;
use Native\Laravel\Facades\ContextMenu;
use Native\Laravel\Facades\Dock;
use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Facades\Window;
use Native\Laravel\GlobalShortcut;
use Native\Laravel\Menu\Menu;
use Native\Laravel\Window as AppWindow;

class NativeAppServiceProvider
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        Menu::new()
            ->appMenu()
            ->submenu('Hey',
                Menu::new()
                    ->link('Laravel', 'https://laravel.com')
            );
            //->register();

        Window::new()
            ->url(url('/notifications'))
            ->titleBarHiddenInset()
            ->width(900)
            ->height(500)
            ->open();
    }
}
