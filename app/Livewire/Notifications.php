<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Native\Laravel\Events\Notifications\NotificationClicked;
use Native\Laravel\Facades\Window as NativeWindow;
use Native\Laravel\Notification;

#[Title('Notifications')]
class Notifications extends Component
{
    public string $title = 'NativePHP';
    public string $message = 'A notification from NativePHP';
    public bool $notificationClicked = false;

    protected $listeners = [
        'native:'.NotificationClicked::class => 'notificationClicked',
    ];

    public function sendNotification()
    {
        Notification::new()
            ->title($this->title)
            ->message($this->message)
            ->show();
    }

    public function framelessWindow()
    {
        $currentWindow = NativeWindow::current();

        NativeWindow::open()
            ->position(
                $currentWindow->x,
                $currentWindow->y + $currentWindow->height
            )
            ->invisibleFrameless()
            ->height(70)
            ->width(200)
            ->url(url('/frameless'))
            ->open();
    }

    public function notificationClicked()
    {
        $this->notificationClicked = true;
    }

    public function render()
    {
        return view('livewire.notifications');
    }
}
