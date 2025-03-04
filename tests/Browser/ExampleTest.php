<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function test_basic_example(): void
    {
        $this->browse(function (Browser $browser) {
            $baseURL = $browser->script('return document.location.href')[0];
            $baseURL = parse_url($baseURL, PHP_URL_SCHEME).'://'.parse_url($baseURL, PHP_URL_HOST).':'.parse_url($baseURL, PHP_URL_PORT);

            $browser->visit($baseURL.'/')
                ->assertSee('Laravel');
        });
    }
}
