<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Native\Laravel\Facades\Screen as NativeScreen;

#[Title('Screens')]
class Screen extends Component
{
    public function getCursorPositionProperty()
    {
        return NativeScreen::cursorPosition();
    }
    public function getDisplaysProperty()
    {
        return NativeScreen::displays();
    }

    public function render()
    {
        return view('livewire.screen');
    }
}
