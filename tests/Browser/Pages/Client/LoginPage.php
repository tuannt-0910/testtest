<?php

namespace Tests\Browser\Pages\Client;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class LoginPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/login';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertTitleContains(trans('client.login.academics_login'))
            ->assertSee(trans('client.login.email'))
            ->assertInputValue('email', '')
            ->assertSee(trans('client.login.password'))
            ->assertInputValue('password', '')
            ->assertSee(trans('client.header.login'));
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            //
        ];
    }
}
