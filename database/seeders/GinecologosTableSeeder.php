<?php

namespace Database\Seeders;

use App\Models\Ginecologo;
use Illuminate\Database\Seeder;

class GinecologoSeeder extends Seeder
{
    /**
     * Run the database seeds for the Ginecologo entity.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ginecologos')->insert([
            [
                'nombre' => 'Ana',
                'apellido' => 'González',
                'email' => 'ana@medico.com',
                'password' => bcrypt('1234'),
                'numero_colegiado' => '12345',
                'telefono' => '623456240',
                'direccion' => 'Calle Principal 123',
                'user_id' => '52',
            ],

        ]);

    }
}

