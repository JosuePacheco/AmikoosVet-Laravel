<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proveedores')->insert([
            [
                 'nombre' => 'AmikoosVet'
                ,'codigopostal' => '50200'
                ,'direccion' => 'Miguel Hidalgo, sn, Lerma'
                ,'telefono' => '7247864734'
                ,'email' => 'amikoos.vet@gmail.com'
            ]
        ]);
    }
}
