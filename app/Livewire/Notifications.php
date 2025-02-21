<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Native\Laravel\Events\Notifications\NotificationActionClicked;
use Native\Laravel\Events\Notifications\NotificationClicked;
use Native\Laravel\Events\Notifications\NotificationReply;
use Native\Laravel\Facades\Window;
use Native\Laravel\Notification;

#[Title('Notifications')]
class Notifications extends Component
{
    public string $title = 'NativePHP';

    public string $message = 'A notification from NativePHP';

    public ?string $replyPlaceholder = null;

    public bool $hasReply = false;

    public array $actions = [];

    public bool $notificationClicked = false;

    public ?string $notificationReplied = null;

    public ?string $notificationActionClicked = null;

    protected $listeners = [
        'native:'.NotificationClicked::class => 'notificationClicked',
        'native:'.NotificationReply::class => 'notificationReplied',
        'native:'.NotificationActionClicked::class => 'notificationActionClicked',
    ];

    public function sendNotification()
    {
        $notification = Notification::new()
            ->title($this->title)
            ->message($this->message);

        if ($this->hasReply) {
            $notification = $notification->hasReply(
                $this->replyPlaceholder ?? ''
            );
        }

        $actions = array_filter($this->actions);
        if (count($actions)) {
            foreach ($actions as $action) {
                $notification = $notification->addAction($action);
            }
        }

        $notification->show();
    }

    public function framelessWindow()
    {
        $currentWindow = Window::current();

        Window::open(uniqid())
            ->focusable(false)
            ->showDevTools(false)
            ->position(
                $currentWindow->x,
                $currentWindow->y + $currentWindow->height
            )
            ->invisibleFrameless()
            ->height(70)
            ->width(200)
            ->url(url('/frameless'));
    }

    public function notificationClicked()
    {
        $this->notificationClicked = true;
    }

    public function notificationReplied(string $reference, string $reply)
    {
        $this->notificationReplied =
            'Reference: '.$reference.' / Reply: '.$reply;
    }

    public function notificationActionClicked(string $reference, string $index)
    {
        $this->notificationReplied =
            'Reference: '.$reference.' / Index of the clicked button: '.$index;
    }

    public function render()
    {
        return view('livewire.notifications');
    }
}
