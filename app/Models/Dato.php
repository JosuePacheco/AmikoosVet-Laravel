<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dato extends Model
{
    protected $table = 'datos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'venta_id'
        , 'cantidad'
        , 'total'
    ];

    public static function reglasValidacion() {
        // https://laravel.com/docs/9.x/validation#available-validation-rules
        return [
            'venta_id' => 'required|integer|min:0'
            , 'cantidad' => 'required|numeric|min:1'
            , 'total' => 'required|numeric|min:0|max:200'
        ];
    }

    public static function etiquetas() {
        return [
            'venta_id' => 'venta'
            , 'cantidad' => 'cantidad'
            , 'total' => 'total'
        ];
    }
}
