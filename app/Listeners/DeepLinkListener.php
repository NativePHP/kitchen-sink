<?php

namespace App\Listeners;

use Native\Laravel\Events\App\OpenedFromURL;

class DeepLinkListener
{
    public function handle(OpenedFromURL $event): void
    {
        info('Opened app from URL: '.$event->url);
    }
}
