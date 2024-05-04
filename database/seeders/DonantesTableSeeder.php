<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //'sexo', 'aptitud', 'estado_salud', 'edad', 'fecha_donacion'

        DB::table('donantes')->insert([
            [
                'sexo' => 'femenino',
                'aptitud' => 'apto',
                'estado_salud' => 'bueno',
                'fecha_donacion' => '2030-03-01',
            ],

        ]);

    }
}
