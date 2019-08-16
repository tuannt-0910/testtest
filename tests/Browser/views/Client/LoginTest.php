<?php

namespace Tests\Browser\views\Client;

use Tests\Browser\Pages\Client\HomePage;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Client\LoginPage;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    public function test_I_can_login_user_successfully()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new LoginPage)
                ->type('email', 'academics-manhnv@gmail.com')
                ->type('password', '123456')
                ->press(trans('client.login.login'))
                ->assertPathIs('/testtest/public/');
        });
    }

    public function test_logout_successfully()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage)
                ->assertSee(trans('client.header.logout'))
                ->clickLink(trans('client.header.logout'))
                ->assertPathIs('/testtest/public/');
        });
    }

    public function test_I_can_login_admin_successfully()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new LoginPage)
                ->type('email', 'tuannghiemtien97@gmail.com')
                ->type('password', '123456')
                ->press(trans('client.login.login'))
                ->assertSee(trans('client.header.back_admin'))
                ->assertPathIs('/testtest/public/');
        });
    }
}
