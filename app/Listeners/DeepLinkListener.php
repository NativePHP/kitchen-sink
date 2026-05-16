<?php

namespace App\Listeners;

use Native\Desktop\Events\App\OpenedFromURL;

class DeepLinkListener
{
    public function handle(OpenedFromURL $event): void
    {
        info('Opened app from URL: '.$event->url);
    }
}
