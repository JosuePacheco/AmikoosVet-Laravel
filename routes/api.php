<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProveedoresController;
use App\Http\Controllers\API\ProductosController;
use App\Http\Controllers\API\VentasController;
use App\Http\Controllers\API\DatosController;
use App\Http\Controllers\API\UsersController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {

    Route::APIresource('proveedores', ProveedoresController::class)->names('api-proveedores');
    Route::APIresource('users', UsersController::class)->names('api-users');
    Route::APIresource('productos', ProductosController::class)->names('api-productos');
    Route::APIresource('ventas', VentasController::class)->names('api-ventas');
    Route::APIresource('datos', DatosController::class)->names('api-datos');
    
});

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email'
        , 'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken('app')->plainTextToken;
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// vista pagina Route::resource('categories','Api\ApicategoriesController',['except' => ['create', 'edit']]);
