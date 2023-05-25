<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Native\Laravel\Dialog;

class Dialogs extends Component
{
    public $selectedFile = '';
    public $selectedSaveFile = '';
    public string $title = 'Select a file';
    public string $buttonLabel = 'Select';
    public bool $multipleSelections = false;

    public function selectFile()
    {
        $dialog = Dialog::new()
            ->title($this->title)
            ->button($this->buttonLabel);

        if ($this->multipleSelections) {
            $dialog->multiple();
        }

        $file = $dialog->show();
        $this->selectedFile = is_array($file) ? implode(', ', $file) : $file;
    }

    public function saveFile()
    {
        $file = Dialog::new()
            ->title($this->title)
            ->button($this->buttonLabel)
            ->save();

        $this->selectedSaveFile = is_array($file) ? implode(', ', $file) : $file;
    }

    public function render()
    {
        return view('livewire.dialogs');
    }
}
