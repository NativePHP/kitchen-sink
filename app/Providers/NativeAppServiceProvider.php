<?php

namespace App\Providers;

use App\Events\MyCustomShortcutEvent;
use Native\Laravel\Facades\ContextMenu;
use Native\Laravel\Facades\Dock;
use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Facades\Window;
use Native\Laravel\GlobalShortcut;
use Native\Laravel\Menu\Items\Checkbox;
use Native\Laravel\Menu\Items\Radio;
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
//        Menu::new()
//            ->appMenu()
//            ->submenu('Hey',
//                Menu::new()
//                    ->add(
//                        new Checkbox('Checkbox'),
//                    )
//                    ->link('Laravel', 'https://laravel.com')
//            )
//            ->register();

        Window::open()
            ->url(url('/'))
            ->titleBarHiddenInset()
            ->width(1024)
            ->height(768);
    }
}
