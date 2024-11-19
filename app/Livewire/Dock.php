<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Native\Laravel\Facades\Dock as DockFacade;

#[Title('Dock')]
class Dock extends Component
{
    public $countdown = 5;

    public function bounce($type = 'informational')
    {
        while ($this->countdown !== 0) {
            $this->stream(
                to: 'countdown',
                content: $this->countdown,
                replace: true,
            );

            sleep(1);

            $this->countdown--;
        };

        DockFacade::bounce($type);
    }

    public function render()
    {
        return view('livewire.dock');
    }
}
