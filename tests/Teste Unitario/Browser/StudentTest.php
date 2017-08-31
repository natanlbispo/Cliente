<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class StudentTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testStudentList()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->visit('/student/list');
        });

        $user->delete();
    }

    public function testClickStudentList()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->clickLink('Listar Alunos');
        });

        $user->delete();
    }

    public function testStudentAdd()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->visit('/student/add');
        });

        $user->delete();
    }

    public function testStudentAddNoFill()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->visit('/student/add')
                    ->press('Enviar')
                    ->assertPathIs('/student/list');
        });

        $user->delete();
    }

    public function testStudentAddName()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->visit('/student/add')
                    ->type('name', 'Aluno Teste Unitário')
                    ->press('Enviar')
                    ->assertPathIs('/student/list');
        });

        $user->delete();
    }

    
    public function testStudentAddMatriculaLow()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->visit('/student/add')
                    ->type('name', 'Aluno Teste Unitário')
                    ->type('matricula', '12345')
                    ->press('Enviar')
                    ->assertPathIs('/student/list');
        });

        $user->delete();
    }
      
    public function testStudentAddMatriculaRight()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->visit('/student/add')
                    ->type('name', 'Aluno Teste Unitário')
                    ->type('matricula', '123456789')
                    ->press('Enviar')
                    ->assertPathIs('/student/list');
        });

        $user->delete();
    }

    public function testStudentAddMatriculaHigh()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->visit('/student/add')
                    ->type('name', 'Aluno Teste Unitário')
                    ->type('matricula', '1234567891')
                    ->press('Enviar')
                    ->assertPathIs('/student/list');
        });

        $user->delete();
    }
    
    public function testStudentAddEmailIncomplete()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->visit('/student/add')
                    ->type('name', 'Aluno Teste Unitário')
                    ->type('matricula', '123456789')
                    ->type('email', 'teste')
                    ->press('Enviar')
                    ->assertPathIs('/student/list');
        });

        $user->delete();
    }

    public function testStudentAddEmailWithoutDomain()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->visit('/student/add')
                    ->type('name', 'Aluno Teste Unitário')
                    ->type('matricula', '123456789')
                    ->type('email', 'teste@')
                    ->press('Enviar')
                    ->assertPathIs('/student/list');
        });

        $user->delete();
    }

    public function testStudentAddEmailDomainIncomplete()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->visit('/student/add')
                    ->type('name', 'Aluno Teste Unitário')
                    ->type('matricula', '123456789')
                    ->type('email', 'teste@gmail')
                    ->press('Enviar')
                    ->assertPathIs('/student/list');
        });

        $user->delete();
    }

    public function testStudentAddEmailRight()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->visit('/student/add')
                    ->type('name', 'Aluno Teste Unitário')
                    ->type('matricula', '123456789')
                    ->type('email', 'teste@gmail.com')
                    ->press('Enviar')
                    ->assertPathIs('/student/list');
        });

        $user->delete();
    }

    public function testStudentAddCpfLow()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->visit('/student/add')
                    ->type('name', 'Aluno Teste Unitário')
                    ->type('matricula', '123456789')
                    ->type('email', 'teste@gmail.com')
                    ->type('cpf', '12345')
                    ->press('Enviar')
                    ->assertPathIs('/student/list');
        });

        $user->delete();
    }

    public function testStudentAddCpfHigh()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->visit('/student/add')
                    ->type('name', 'Aluno Teste Unitário')
                    ->type('matricula', '123456789')
                    ->type('email', 'teste@gmail.com')
                    ->type('cpf', '123456789111')
                    ->press('Enviar')
                    ->assertPathIs('/student/list');
        });

        $user->delete();
    }

    public function testStudentAddCpfRight()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->visit('/student/add')
                    ->type('name', 'Aluno Teste Unitário')
                    ->type('matricula', '123456789')
                    ->type('email', 'teste@gmail.com')
                    ->type('cpf', '12345678912')
                    ->press('Enviar')
                    ->assertPathIs('/student/list');
        });

        $user->delete();
    }


    public function testStudentAddNotaHigh()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->visit('/student/add')
                    ->type('name', 'Aluno Teste Unitário')
                    ->type('name', 'Aluno Teste Unitário')
                    ->type('matricula', '123456789')
                    ->type('email', 'teste@gmail.com')
                    ->type('cpf', '12345678912')
                    ->type('nota', '20')
                    ->press('Enviar')
                    ->assertPathIs('/student/list');
        });

        $user->delete();
    }

    public function testStudentAddNotaRight()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->visit('/student/add')
                    ->type('name', 'Aluno Teste Unitário')
                    ->type('name', 'Aluno Teste Unitário')
                    ->type('matricula', '123456789')
                    ->type('email', 'teste@gmail.com')
                    ->type('cpf', '12345678912')
                    ->type('nota', '10')
                    ->press('Enviar')
                    ->assertPathIs('/student/list');
        });

        $user->delete();
    }

    public function testStudentAddSemestreIncomplete()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->visit('/student/add')
                    ->type('name', 'Aluno Teste Unitário')
                    ->type('matricula', '123456789')
                    ->type('email', 'teste@gmail.com')
                    ->type('cpf', '12345678912')
                    ->type('nota', '10.00')
                    ->type('semestre_entrada', '2011')
                    ->press('Enviar')
                    ->assertPathIs('/student/list');
        });

        $user->delete();
    }


    public function testStudentAddSemestreWithDot()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->visit('/student/add')
                    ->type('name', 'Aluno Teste Unitário')
                    ->type('matricula', '123456789')
                    ->type('email', 'teste@gmail.com')
                    ->type('cpf', '12345678912')
                    ->type('nota', '10.00')
                    ->type('semestre_entrada', '2011.2')
                    ->press('Enviar')
                    ->assertPathIs('/student/list');
        });

        $user->delete();
    }


    public function testStudentAddSemestreRight()
    {
        $user = factory(User::class)->create([
            'professor_matricula' => '123456789',
            'admin' => '1',
            'access' => '1'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('matricula', $user->professor_matricula)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/admin')
                    ->visit('/student/add')
                    ->type('name', 'Aluno Teste Unitário')
                    ->type('matricula', '123456789')
                    ->type('email', 'teste@gmail.com')
                    ->type('cpf', '12345678912')
                    ->type('nota', '10.00')
                    ->type('semestre_entrada', '20142')
                    ->press('Enviar')
                    ->assertPathIs('/student/list');
        });

        $user->delete();
    }


}
