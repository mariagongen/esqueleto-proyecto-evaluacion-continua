<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //'fecha_hora', 'medico_id', 'paciente_id'
        DB::table('citas')->insert([
            [
                'fecha_hora' => '2025-10-10 13:15',
                'medico_id' => '1',
                'paciente_id' => '1',
            ],

        ]);

    }
}
