<?php

namespace App\Livewire;

use Illuminate\Mail\Markdown;
use Livewire\Attributes\Title;
use Livewire\Component;
use Native\Laravel\Dialog;
use Native\Laravel\Events\App\OpenFile;
use Native\Laravel\Facades\Window as NativeWindow;

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
        NativeWindow::open($this->windowId ?? uniqid())
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
        NativeWindow::get($this->windowId)->title($this->title);
    }

    public function toggleClosable()
    {
        NativeWindow::get($this->windowId)->closable($this->closable = !$this->closable);
    }

    public function toggleDevTools()
    {
        $window = NativeWindow::get($this->windowId);

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
}
