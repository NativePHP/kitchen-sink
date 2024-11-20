<?php

namespace App\Providers;

use Native\Laravel\Facades\Menu;
use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Facades\Window;
use Native\Laravel\Window as AppWindow;

class NativeAppServiceProvider
{
    public function boot(): void
    {
        // Menu::default();
        Menu::create(
            Menu::app(),
            Menu::file(),
            Menu::make(
                Menu::goToRoute('home')
                    ->label('Home')
                    ->icon(public_path('medalTemplate.png')),
                Menu::goToUrl(url('/window'))
                    ->label('Windows'),
                Menu::goToUrl('https://nativephp.com')
                    ->label('External'),
                Menu::label('Simon')
                    ->id('simon')
                    ->event(\Native\Laravel\Events\Menu\MenuItemClicked::class),
            )->label('Navigation'),
            Menu::make(
                Menu::make(
                    Menu::radio('Do you want this?'),
                    Menu::radio('Or that?')
                        ->tooltip('A little tip?'),
                    Menu::separator(),
                    Menu::radio('Yeh you do!')->id('yes'),
                    Menu::radio('Nope')->disabled(),
                )->label('Radios'),
                Menu::make(
                    Menu::checkbox('You want this?')
                        ->checked(),
                    Menu::checkbox('Yeh you do!')->id('yes'),
                    Menu::checkbox('Nope')->disabled(),
                )->label('Checkboxes'),
                Menu::separator(),
                Menu::fullscreen(),
                Menu::separator(),
                Menu::link('https://nativephp.com/', 'Docs'),
                Menu::link('https://nativephp.com/docs/getting-started/sponsoring', 'Sponsor'),
            )->label('Items'),
        );

        Window::open()
            ->url(url('/'))
            ->titleBarHiddenInset()
            ->fullscreenable(false)
            ->width(1024)
            ->height(768);
    }
}
