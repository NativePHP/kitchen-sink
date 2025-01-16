<?php

namespace App\Livewire;

use App\Events\MenuBarClicked;
use App\Events\SyncComplete;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Native\Laravel\Facades\MenuBar as MenuBarFacade;
use Native\Laravel\Facades\Notification;

#[Title('MenuBar')]
class MenuBar extends Component
{
    public $order = '';

    public function create()
    {
        MenuBarFacade::create()
            ->showDockIcon()
            ->route('menubar')
            ->resizable(false);
    }

    public function icon()
    {
        MenuBarFacade::icon(public_path('medalTemplate.png'));
    }

    public function tooltip()
    {
        MenuBarFacade::tooltip('Hello, Tray!');
    }

    #[On('native:'.MenuBarClicked::class)]
    public function menuBarOpen($combo = null)
    {
        if ($combo['altKey']) {
            $this->order = 'Vodka martini - shaken, not stirred!';
        } else {
            $this->order = 'Orange vod-juice-ka';
        }
    }

    #[On('native:'.SyncComplete::class)]
    public function syncComplete()
    {
        Notification::new()
            ->title('Sync complete!')
            ->message("I've given 'er all we've got, cap'n")
            ->show();
    }

    public function render()
    {
        return view('livewire.menu-bar');
    }
}
