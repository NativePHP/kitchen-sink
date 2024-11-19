<?php

namespace App\Providers;

use App\Events\MyCustomShortcutEvent;
use App\Events\MenuBarClicked;
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
    public function boot(): void
    {
        Window::open()
            ->url(url('/'))
            ->titleBarHiddenInset()
            ->width(1024)
            ->height(768);
    }
}
