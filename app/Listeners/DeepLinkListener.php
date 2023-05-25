<?php

namespace App\Listeners;

use Native\Laravel\Events\App\OpenedFromURL;

class DeepLinkListener
{
    public function handle(OpenedFromURL $event): void
    {
        ray('Opened app from URL: ' . $event->url);
    }
}
