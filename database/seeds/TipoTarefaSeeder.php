<?php

use Illuminate\Database\Seeder;

class TipoTarefaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_tarefas')->insert([
            'id_usuario' => 1,
            'descricao' => "TipoTesteUser1",
        ]);

        DB::table('tipo_tarefas')->insert([
            'id_usuario' => 1,
            'descricao' => "TipoTeste2User1",
        ]);

        DB::table('tipo_tarefas')->insert([
            'id_usuario' => 2,
            'descricao' => "TipoTesteUser2",
        ]);

        DB::table('tipo_tarefas')->insert([
            'id_usuario' => 2,
            'descricao' => "TipoTeste2User2",
        ]);
    }
}
