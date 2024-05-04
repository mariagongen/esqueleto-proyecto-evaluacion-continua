<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Paciente;

class PacientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes')->insert([
            [
                'nombre' => 'María',
                'apellido' => 'Pacinte',
                'email' => 'maria@paciente.com',
                'password' => bcrypt('1234'),
                'nuhsa' => 'NUHSA123456',
                'fecha_nacimiento' => '1990-03-01',
                'telefono' => '612346986',
                'direccion' => 'Calle Paciente1, Ciudad',
            ],

        ]);
    
    }
}

