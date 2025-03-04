<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Native\Laravel\Facades\Window as WindowFacade;
use Native\Laravel\Windows\Window as NativeWindow;

#[Title('Windows')]
class Window extends Component
{
    public $title = 'NativePHP';

    public $showDevTools = false;

    public $windowId = null;

    public $closable = true;

    public $alwaysOnTop = false;

    public function open()
    {
        WindowFacade::open($this->windowId ?? uniqid())
            ->title($this->title)
            ->alwaysOnTop($this->alwaysOnTop)
            ->url(url('/new-window'))
            ->webPreferences([
                'scrollBounce' => true,
            ])
            ->showDevTools($this->showDevTools);
    }

    public function setTitle()
    {
        $this->getWindow()->title($this->title);
    }

    public function toggleClosable()
    {
        $this->getWindow()->closable($this->closable = ! $this->closable);
    }

    public function toggleDevTools()
    {
        $window = $this->getWindow();

        if ($window->devToolsOpen()) {
            $window->hideDevTools();
        } else {
            $window->showDevTools();
        }
    }

    public function render()
    {
        return view('livewire.window');
    }

    private function getWindow(): NativeWindow
    {
        return ! empty($this->windowId)
            ? WindowFacade::get($this->windowId)
            : WindowFacade::current();
    }
}
