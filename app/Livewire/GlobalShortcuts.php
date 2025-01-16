<?php

namespace App\Livewire;

use App\Events\GlobalShortcutPressedEvent;
use Livewire\Attributes\Session;
use Livewire\Component;
use Native\Laravel\Facades\GlobalShortcut;

class GlobalShortcuts extends Component
{
    public $shortcut;

    public $lastPressed;

    // Persist shortcuts across page reloads
    #[Session]
    public $shortcuts = [];

    protected $listeners = [
        'native:'.GlobalShortcutPressedEvent::class => 'handleShortcutPressed',
    ];

    public function saveShortcut()
    {
        $accelerator = $this->buildAccelerator($this->shortcut);

        GlobalShortcut::key($accelerator)
            ->event(GlobalShortcutPressedEvent::class)
            ->register();

        $this->shortcuts[] = $accelerator;
    }

    public function removeShortcut($shortcut)
    {
        GlobalShortcut::key($shortcut)
            ->unregister();

        $this->shortcuts = array_filter($this->shortcuts, function ($item) use ($shortcut) {
            return $item !== $shortcut;
        });

        $this->lastPressed = null;
    }

    public function handleShortcutPressed($accelerator)
    {
        $this->lastPressed = $accelerator;
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
                $accelerator .= $mapping[$keyString].'+';
            } else {
                $accelerator .= $keyString.'+';
            }
        }

        return trim($accelerator, '+');
    }
}
