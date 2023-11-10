<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tip_tipo_doc;
class Tip_tipo_docSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tip_tipo_doc::create([
            'tip_nombre'=> 'INSTRUCTIVO',
            'tip_prefijo' => 'INS'
        ]);
        Tip_tipo_doc::create([
            'tip_nombre'=> 'MANUAL',
            'tip_prefijo' => 'MNA',
        ]);
        Tip_tipo_doc::create([
            'tip_nombre'=> 'POLITICAS',
            'tip_prefijo' => 'POL'
        ]);
        Tip_tipo_doc::create([
            'tip_nombre'=> 'NORMAS',
            'tip_prefijo' => 'NOR'
        ]);
     
    }
}
