<?php

namespace App\Listeners;

use Native\Desktop\Events\Menu\MenuItemClicked;

class MenuItemClickedListener
{
    public function __construct() {}

    public function handle(MenuItemClicked $event): void {}
}
