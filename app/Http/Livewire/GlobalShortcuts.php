<?php

namespace App\Http\Livewire;

use App\Events\GlobalShortcutPressedEvent;
use Livewire\Component;
use Native\Laravel\GlobalShortcut;

class GlobalShortcuts extends Component
{
    public $shortcut;

    public $lastPressed;

    public $shortcuts = [];

    protected $listeners = [
        'echo:nativephp,.'.GlobalShortcutPressedEvent::class => 'handleShortcutPressed',
    ];

    public function saveShortcut()
    {
        $accelerator = $this->buildAccelerator($this->shortcut);

        GlobalShortcut::new()
            ->key($accelerator)
            ->event(GlobalShortcutPressedEvent::class)
            ->register();

        $this->shortcuts[] = $accelerator;
    }

    public function removeShortcut($shortcut)
    {
        GlobalShortcut::new()
            ->key($shortcut)
            ->unregister();

        $this->shortcuts = array_filter($this->shortcuts, function ($item) use ($shortcut) {
            return $item !== $shortcut;
        });

        $this->lastPressed = null;
    }

    public function handleShortcutPressed($payload)
    {
        $this->lastPressed = $payload['accelerator'];
    }

    public function render()
    {
        return view('livewire.global-shortcuts');
    }

    protected function buildAccelerator(array $shortcut)
    {
        $mapping = [
            '⇧' => 'Shift',
            '⌘' => 'CommandOrControl',
            '⌥' => 'Alt',
            '⌃' => 'Control',
            'space' => 'Space',
            'backspace' => 'Backspace',
            'enter' => 'Enter',
            'tab' => 'Tab',
            'up' => 'Up',
            'down' => 'Down',
            'left' => 'Left',
            'right' => 'Right',
            'home' => 'Home',
            'end' => 'End',
            'pageup' => 'PageUp',
            'pagedown' => 'PageDown',
            'delete' => 'Delete',
            'insert' => 'Insert',
            'esc' => 'Escape',
        ];

        $accelerator = '';

        foreach ($shortcut as $keyString) {
            $keyString = strtolower($keyString);

            if (isset($mapping[$keyString])) {
                $accelerator .= $mapping[$keyString] . '+';
            } else {
                $accelerator .= $keyString . '+';
            }
        }

        return trim($accelerator, '+');
    }
}
