<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categorias')->insert(array(
            'descripcion' => "Deportes",
            'estatus' => 1,
        ));

        \DB::table('categorias')->insert(array(
            'descripcion' => "Politica",
            'estatus' => 1,
        ));

        \DB::table('categorias')->insert(array(
            'descripcion' => "Social",
            'estatus' => 1,
        ));

        \DB::table('categorias')->insert(array(
            'descripcion' => "Internacional",
            'estatus' => 1,
        ));

        \DB::table('categorias')->insert(array(
            'descripcion' => "Cultura",
            'estatus' => 1,
        ));

        \DB::table('categorias')->insert(array(
            'descripcion' => "Salud",
            'estatus' => 1,
        ));
    }
}
