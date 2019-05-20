<?php

use Illuminate\Database\Seeder;

class TarefaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tarefas')->insert([
            'id_usuario' => 1,
            'id_tipo' => 1,
            'titulo' => "Tarefa1TesteUser1Tipo1",
            'privacidade' => 1,
            'status' => 0,
        ]);

        DB::table('tarefas')->insert([
            'id_usuario' => 1,
            'id_tipo' => 1,
            'titulo' => "Tarefa2TesteUser1Tipo1",
            'privacidade' => 0,
            'status' => 0,
        ]);

        DB::table('tarefas')->insert([
            'id_usuario' => 1,
            'id_tipo' => 2,
            'titulo' => "Tarefa1TesteUser1Tipo2",
            'privacidade' => 1,
            'status' => 0,
        ]);

        DB::table('tarefas')->insert([
            'id_usuario' => 1,
            'id_tipo' => 2,
            'titulo' => "Tarefa2TesteUser1Tipo2",
            'privacidade' => 0,
            'status' => 0,
        ]);

        DB::table('tarefas')->insert([
            'id_usuario' => 2,
            'id_tipo' => 3,
            'titulo' => "Tarefa1TesteUser2Tipo1",
            'privacidade' => 1,
            'status' => 0,
        ]);

        DB::table('tarefas')->insert([
            'id_usuario' => 2,
            'id_tipo' => 3,
            'titulo' => "Tarefa2TesteUser2Tipo1",
            'privacidade' => 0,
            'status' => 0,
        ]);

        DB::table('tarefas')->insert([
            'id_usuario' => 2,
            'id_tipo' => 4,
            'titulo' => "Tarefa1TesteUser2Tipo2",
            'privacidade' => 1,
            'status' => 0,
        ]);

        DB::table('tarefas')->insert([
            'id_usuario' => 2,
            'id_tipo' => 4,
            'titulo' => "Tarefa2TesteUser2Tipo2",
            'privacidade' => 0,
            'status' => 0,
        ]);
    }
}
