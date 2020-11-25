<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DirectorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('directorios')->insert([
            'nombre_completo' => 'Manuel Perez',
            'direccion' => 'calle 23 san ramon',
            'telefono' =>'78123683',
            'url_foto' => null  
        ],
        [
            'nombre_completo' => 'Raul Perez',
            'direccion' => 'calle 48 san ramon',
            'telefono' =>'78123683',
            'url_foto' => null  

        ]

        );
    }
}
