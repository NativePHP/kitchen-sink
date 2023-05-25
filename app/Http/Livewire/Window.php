<?php

namespace App\Http\Livewire;

use Illuminate\Mail\Markdown;
use Livewire\Component;
use Native\Laravel\Dialog;
use Native\Laravel\Events\App\OpenFile;
use Native\Laravel\Facades\App;

class Window extends Component
{
    public $content = "";

    public $filename = "";

    protected $nativeListeners = [
        OpenFile::class => 'openFile',
    ];

    public function chooseFile()
    {
        $markdownFile = Dialog::new()
            ->title('Choose a file')
            ->filter('Markdown', ['md'])
            ->singleFile()
            ->show();

        $this->openFile($markdownFile);
        App::addRecentDocument($markdownFile);
    }

    public function render()
    {
        return view('livewire.window');
    }

    public function openFile($filename)
    {
        if (is_array($filename)) {
            $filename = $filename['path'];
        }
        $this->filename = $filename;
        $this->content = Markdown::parse(file_get_contents($filename))->toHtml();
    }
}
