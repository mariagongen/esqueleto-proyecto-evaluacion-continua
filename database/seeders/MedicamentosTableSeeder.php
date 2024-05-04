<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //'nombre', 'miligramos'

        DB::table('medicamentos')->insert([
            [
                'nombre' => 'Nolotil',
                'miligramos' => '50mg',
            ],

        ]);
    }
}
