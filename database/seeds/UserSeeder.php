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
        DB::table('users')->insert([
            'nome' => "Laercio",
            'sexo' => 0,
            'data_nascimento' => "18/08/1999",
            'telefone' => "(75) 98150-4615",
            'login' => "LaercioSR",
            'email' => "laercio.rios13@hotmail.com",
            'password' => Hash::make("laercior13"),
        ]);
    }
}
