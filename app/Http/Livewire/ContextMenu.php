<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Native\Laravel\Events\Menu\MenuItemClicked;
use Native\Laravel\Facades\ContextMenu as NativeContextMenu;
use Native\Laravel\Menu\Items\Checkbox;
use Native\Laravel\Menu\Items\Label;
use Native\Laravel\Menu\Items\Link;
use Native\Laravel\Menu\Menu;

class ContextMenu extends Component
{
    public array $latestEvents = [];

    protected $listeners = [
        'echo:nativephp,.'.MenuItemClicked::class => 'menuItemClicked',
    ];

    public function menuItemClicked($payload)
    {
        $this->latestEvents[] = $payload['item'];
    }

    public function register()
    {
        NativeContextMenu::register(
            Menu::new()
                ->label('Hello World')
                ->separator()
                ->checkbox('Check me', true)
                ->link('https://laravel.com', 'Laravel')
                ->separator()
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
