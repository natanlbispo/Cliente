<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Bem vindos ao SigPPG');
        });
    }

    public function testLoginAdmin()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '68637251420',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'sabolsas')
                    ->press('Login')
                    ->assertPathIs('/admin');
        });
    }

    public function testLoginUser()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '0',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/user');
        });
    }

    public function testLoginUser()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '0',
            'access' => '0'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/login');
        });
    }
}
