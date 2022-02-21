<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Alexandre da Silva',
            'email' => 'asilva@contatoseguro.com.br',
            'phone' => '51997462280',
            'birthdate' => '1995-11-10',
            'city' => 'Porto Alegre'
        ]);

        \App\Models\User::create([
            'name' => 'Roger Fonseca',
            'email' => 'rfonseca@contatoseguro.com.br',
            'phone' => '51987654321',
            'birthdate' => '1999-09-07',
            'city' => 'São Leopoldo'
        ]);

        \App\Models\User::create([
            'name' => 'Pedro Ribeiro',
            'email' => 'pribeiro@contatoseguro.com.br',
            'phone' => '51997835577',
            'birthdate' => '2000-11-29',
            'city' => 'Canoas'
        ]);

        \App\Models\User::create([
            'name' => 'Cláudio Bezerra',
            'email' => 'cbezerra@contatoseguro.com.br',
            'phone' => '51999998888',
            'birthdate' => '1990-04-01',
            'city' => 'Novo Hamburgo'
        ]);
    }
}
