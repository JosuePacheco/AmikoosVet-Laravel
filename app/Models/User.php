<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'codigopostal',
        'direccion',
        'telefono',
        'nickname',
        'email',
        'password',
    ];

    public static function reglasValidacion() {
        // https://laravel.com/docs/9.x/validation#available-validation-rules
        return [
            'name' => 'required|string|min:0'
            , 'codigopostal' => 'required|numeric|min:3|max:6'
            , 'direccion' => 'required|string|min:0|max:2000'
            , 'telefono' => 'required|numeric|min:0|max:12'
            , 'nickname' => 'required|string|min:0|max:50'
            , 'email' => 'required|string|min:0|max:100'
            , 'password' => 'required|string|min:6'
        ];
    }

    public static function etiquetas() {
        return [
            'name' => 'name'
            , 'codigopostal' => 'codigopostal'
            , 'direccion' => 'direccion'
            , 'telefono' => 'telefono'
            , 'nickname' => 'nickname'
            , 'email' => 'email'
            , 'password' => 'password'
        ];
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
