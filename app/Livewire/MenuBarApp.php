<?php

namespace App\Livewire;

use App\Events\SyncComplete;
use Livewire\Attributes\On;
use Livewire\Component;
use Native\Laravel\Facades\MenuBar as MenuBarFacade;

class MenuBarApp extends Component
{
    public function sync()
    {
        MenuBarFacade::label(' Syncing...');
        MenuBarFacade::icon(public_path('syncTemplate.png'));

        $completion = 0;

        while ($completion <= 100) {
            set_time_limit(3);
            MenuBarFacade::tooltip($completion . '% complete');
            $completion++;
            usleep(mt_rand(50_000, 250_000));
        }

        MenuBarFacade::label(' Done!');

        sleep(1);

        MenuBarFacade::label('');
        MenuBarFacade::tooltip('Ok, it\'s over. We\'re back');
        MenuBarFacade::icon(base_path('vendor/nativephp/electron/resources/js/resources/IconTemplate.png'));

        SyncComplete::dispatch();
    }

    #[On('native:menubar.updated')]
    public function menuBarUpdated()
    {
        dump('Thanks!');
    }

    public function render()
    {
        return view('livewire.menubarapp');
    }
}
