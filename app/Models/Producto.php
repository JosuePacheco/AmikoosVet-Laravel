<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'proveedor_id'
        , 'producto'
        , 'marca'
        , 'precio'
        , 'stock'
    ];

    public static function reglasValidacion() {
        // https://laravel.com/docs/9.x/validation#available-validation-rules
        return [
            'proveedor_id' => 'required|integer|min:0'
            , 'producto' => 'required|string|min:3|max:100'
            , 'marca' => 'required|string|min:0|max:200'
            , 'precio' => 'required|numeric|min:0|max:3000'
            , 'stock' => 'required|numeric|min:0|max:10000'
        ];
    }

    public static function etiquetas() {
        return [
            'proveedor_id' => 'proveedor'
            , 'producto' => 'producto'
            , 'marca' => 'marca'
            , 'precio' => 'precio'
            , 'stock' => 'stock'
        ];
    }
}
