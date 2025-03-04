<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Native\Laravel\Facades\Dock as DockFacade;

#[Title('Dock')]
class Dock extends Component
{
    public $countdown = 5;

    // Bounce only works on macOS when the app is not in focus
    public function bounce($type = 'informational')
    {
        // Start the countdown
        while ($this->countdown !== 0) {
            $this->stream(
                to: 'countdown',
                content: $this->countdown,
                replace: true,
            );

            sleep(1);

            $this->countdown--;
        }

        // Bounce the dock icon
        DockFacade::bounce($type);

        // Reset the countdown
        $this->countdown = 5;
    }

    public function render()
    {
        return view('livewire.dock');
    }
}
