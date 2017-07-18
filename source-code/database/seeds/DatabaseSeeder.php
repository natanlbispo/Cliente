<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Model::unguard();
      $this->call('AlunosTalbeSeeder');
    }
}

class AlunosTalbeSeeder extends Seeder{

  public function run(){
    DB::insert('insert into alunos (nome, orientador, matricula, nota, data) values(?,?,?,?,?)', array('Natan', 'Ivan',2,3,'4'));
  }
}
