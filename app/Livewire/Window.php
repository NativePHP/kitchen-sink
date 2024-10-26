<?php

namespace App\Livewire;

use Illuminate\Mail\Markdown;
use Livewire\Component;
use Native\Laravel\Dialog;
use Native\Laravel\Events\App\OpenFile;
use Native\Laravel\Facades\Window as NativeWindow;

class Window extends Component
{
    public $title = 'NativePHP';
    public $windowId = null;

    public function open()
    {
        $window = NativeWindow::open($this->windowId ?? uniqid())
            ->title($this->title)
            ->url(url('/new-window'));
    }

    public function render()
    {
        return view('livewire.window');
    }
}
