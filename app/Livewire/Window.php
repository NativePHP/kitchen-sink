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
    public $windowId = '';

    protected $listeners = [
        'echo:nativephp,.'.OpenFile::class => 'openFile',
    ];

    public function open()
    {
        $window = NativeWindow::new()
            ->title($this->title)
            ->url(url('/new-window'));

        if ($this->windowId !== '') {
            $window->id($this->windowId);
        }

        $window->open();
    }

    public function render()
    {
        return view('livewire.window');
    }
}
