<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Company::create([
            'name' => 'Silvana e André Consultoria Financeira ME',
            'cnpj' => '64075898000140',
            'address' => 'Rua Sebastião Paiva de Lima, 684'
        ]);

        \App\Models\Company::create([
            'name' => 'Bento e Helena Advocacia ME',
            'cnpj' => '48641151000155',
            'address' => 'Rua Conselheiro Crispiniano 69, 331'
        ]);
    }
}
