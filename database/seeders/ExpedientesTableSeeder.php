<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpedienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    
     public function run(): void
     {
         //'fecha_hora', 'medico_id', 'paciente_id'
 
        DB::table('expedientes')->insert([
            [
                'fecha_apertura' => '2025-10-10 13:15',
                'fecha_apertura'=> '1',
                'paciente_id' => '1',
            ],

        ]);

     }
}
