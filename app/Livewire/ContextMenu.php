<?php

namespace App\Livewire;

use Livewire\Component;
use Native\Laravel\Events\Menu\MenuItemClicked;
use Native\Laravel\Facades\ContextMenu as NativeContextMenu;
use Native\Laravel\Facades\Menu;

class ContextMenu extends Component
{
    public array $latestEvents = [];

    protected $listeners = [
        'native:'.MenuItemClicked::class => 'menuItemClicked',
    ];

    public function menuItemClicked($item, $combo)
    {
        $this->latestEvents[] = compact('item', 'combo');
    }

    public function register()
    {
        NativeContextMenu::register(
            Menu::make(
                Menu::label('Hello World'),
                Menu::separator(),
                Menu::checkbox('Check me', true),
                Menu::link('https://laravel.com', 'Laravel')
                    ->openInBrowser(),
                Menu::separator(),
            )
        );

        $this->latestEvents[] = 'Registered';
    }

    public function remove()
    {
        NativeContextMenu::remove();

        $this->latestEvents[] = 'Removed';
    }

    public function render()
    {
        return view('livewire.context-menu');
    }
}
