<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Native\Laravel\Dialog;

#[Title('Dialogs')]
class Dialogs extends Component
{
    public $selectedFile = '';

    public $selectedSaveFile = '';

    public string $title = '';

    public string $buttonLabel = '';

    public bool $multipleSelections = false;

    public bool $resolveSymlinks = true;

    public bool $asSheet = false;

    public function selectFile()
    {
        $file = Dialog::new()
            ->title($this->title)
            ->button($this->buttonLabel)
            ->when($this->asSheet, fn (Dialog $dialog) => $dialog->asSheet())
            ->when($this->multipleSelections, fn (Dialog $dialog) => $dialog->multiple())
            ->when(! $this->resolveSymlinks, fn (Dialog $dialog) => $dialog->dontResolveSymlinks())
            ->open();

        $this->selectedFile = is_array($file) ? implode(', ', $file) : $file;
    }

    public function saveFile()
    {
        $file = Dialog::new()
            ->title($this->title)
            ->button($this->buttonLabel)
            ->when($this->asSheet, fn (Dialog $dialog) => $dialog->asSheet())
            ->save();

        $this->selectedSaveFile = is_array($file) ? implode(', ', $file) : $file;
    }

    public function render()
    {
        return view('livewire.dialogs');
    }
}
