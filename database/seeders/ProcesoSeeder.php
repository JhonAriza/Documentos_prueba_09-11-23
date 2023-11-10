<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proceso;
class ProcesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proceso::create([
            'pro_prefijo' => 'ING',
            'pro_nombre'=> 'INGENIERIA'
        ]);
        Proceso::create([
            'pro_prefijo' => 'MAT',
            'pro_nombre'=> 'MATEMATICAS'
        ]);
        Proceso::create([
            'pro_prefijo' => 'ESP',
            'pro_nombre'=> 'ESPAÑOL'
        ]);
        Proceso::create([
            'pro_prefijo' => 'ARIT',
            'pro_nombre'=> 'ARITMETICA'
        ]);
        Proceso::create([
            'pro_prefijo' => 'TUE',
            'pro_nombre'=> 'MATETUETID'
        ]);
     
    }
}
