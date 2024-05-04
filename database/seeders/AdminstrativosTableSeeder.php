<?php

namespace Database\Seeders;

use App\Models\Adminstrativo;
use Illuminate\Database\Seeder;

class AdminstrativoSeeder extends Seeder
{
    /**
     * Run the database seeds for the Adminstrativo entity.
     *
     * @return void
     */
    public function run()
    {    

        DB::table('administrativos')->insert([
            [
                'num_id' => '01',
            ],

        ]);
    }
}

