<?php

namespace App\Livewire;

use Livewire\Component;
use Native\Desktop\Facades\Window;

class Blank extends Component
{
    public function close()
    {
        Window::close();
    }

    public function render()
    {
        return view('livewire.blank');
    }
}
