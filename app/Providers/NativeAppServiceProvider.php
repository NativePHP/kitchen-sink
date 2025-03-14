<?php

namespace App\Providers;

use App\Events\MyCustomMenuEvent;
use Native\Laravel\Facades\Menu;
use Native\Laravel\Facades\Window;

class NativeAppServiceProvider
{
    public function boot(): void
    {
        // Menu::default();
        Menu::create(
            Menu::app(),
            Menu::file(),
            Menu::edit(),
            Menu::make(
                Menu::route('app')
                    ->label('Home')
                    ->icon(public_path('medalTemplate.png')),
                Menu::link(url('/window'))
                    ->label('Windows'),
                Menu::link('https://nativephp.com')
                    ->openInBrowser()
                    ->label('External'),
                Menu::label('Custom Event')
                    ->id('custom')
                    ->event(MyCustomMenuEvent::class),
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
                Menu::link('https://nativephp.com/', 'Docs')
                    ->openInBrowser(),
                Menu::link('https://nativephp.com/docs/getting-started/sponsoring', 'Sponsor')
                    ->openInBrowser(),
            )->label('Items'),
        );

        Window::open()
            ->url(route('app'))
            ->titleBarHiddenInset()
            ->fullscreenable(false)
            ->width(1024)
            ->height(768);
    }
}
