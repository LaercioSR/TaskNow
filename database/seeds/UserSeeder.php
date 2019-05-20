<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = new DateTime('2000-01-01');

        DB::table('users')->insert([
            'nome' => "Teste",
            'sexo' => 0,
            'data_nascimento' => $date,
            'telefone' => "(00) 00000-0000",
            'login' => "Teste",
            'email' => "teste@teste.com",
            'password' => Hash::make("teste123"),
        ]);

        DB::table('users')->insert([
            'nome' => "Teste2",
            'sexo' => 1,
            'data_nascimento' => $date,
            'telefone' => "(00) 00000-0000",
            'login' => "Teste2",
            'email' => "teste2@teste.com",
            'password' => Hash::make("teste123"),
        ]);
    }
}
