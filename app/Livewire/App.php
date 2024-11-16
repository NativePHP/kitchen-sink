<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Livewire\Attributes\Title;
use Livewire\Component;
use Native\Laravel\Facades\App as NativeApp;
use Native\Laravel\Facades\System;

#[Title('App & System')]
class App extends Component
{
    public $badgeCount = 0;

    public $unlocked = false;

    public Collection $printers;

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

        if ($this->unlocked) {
            $this->printers = collect(System::printers())
                ->mapWithKeys(fn ($printer) => [$printer->name => $printer->displayName]);
        }
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
