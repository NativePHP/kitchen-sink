<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Native\Laravel\Facades\App as NativeApp;
use Native\Laravel\Facades\System;

class App extends Component
{
    public $badgeCount = 0;

    public $unlocked = false;

    public function mount()
    {
        $this->badgeCount = NativeApp::badgeCount();
    }

    public function updatedBadgeCount($value)
    {
        NativeApp::badgeCount($value);
    }

    public function hide()
    {
        NativeApp::hide();
    }

    public function unlockWithTouchID()
    {
        $this->unlocked = System::promptTouchID('unlock NativePHP with Touch ID');
    }

    public function lock()
    {
        $this->unlocked = false;
    }

    public function render()
    {
        return view('livewire.app');
    }
}
