<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Native\Laravel\Facades\Clipboard as NativeClipboard;

class Clipboard extends Component
{
    public string $newContent = '';

    public function getClipboardContentProperty()
    {
        return NativeClipboard::text();
    }

    public function setClipboard()
    {
        NativeClipboard::text($this->newContent);
    }

    public function render()
    {
        return view('livewire.clipboard');
    }
}
