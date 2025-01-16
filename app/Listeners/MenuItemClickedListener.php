<?php

namespace App\Listeners;

use Native\Laravel\Events\Menu\MenuItemClicked;

class MenuItemClickedListener
{
    public function __construct() {}

    public function handle(MenuItemClicked $event): void {}
}
