<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nombre'
        , 'codigopostal'
        , 'direccion'
        , 'telefono'
        , 'email'
    ];

    public static function reglasValidacion() {
        // https://laravel.com/docs/9.x/validation#available-validation-rules
        return [
            'nombre' => 'required|string|min:0'
            , 'codigopostal' => 'required|numeric|min:3|max:6'
            , 'direccion' => 'required|string|min:0|max:2000'
            , 'telefono' => 'required|numeric|min:0|max:12'
            , 'email' => 'required|string|min:0|max:100'
        ];
    }

    public static function etiquetas() {
        return [
            'nombre' => 'nombre'
            , 'codigopostal' => 'codigopostal'
            , 'direccion' => 'direccion'
            , 'telefono' => 'telefono'
            , 'email' => 'email'
        ];
    }
}
