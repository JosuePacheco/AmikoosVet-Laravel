<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            [
                 'proveedor_id' => 1
                ,'producto' => 'Correa'
                ,'marca' => 'AmikoosVet'
                ,'precio' => 150
                ,'stock' => 15
            ]
        ]);
    }
}
