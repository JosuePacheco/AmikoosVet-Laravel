<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\ApiController;
use App\Models\Dato;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Venta;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:api", ["except" => ["login", "register"]]);
    }

    public function login(LoginRequest $request)
    {
        if (!($token = auth()->attempt(request(["email", "password"])))) {
            return $this->errorResponse("Revisa tus credenciales", 401);
        }

        return $this->respondWithToken($token);
    }

    public function user()
    {
        $user = auth()->user();
        $group = $user->group;
        if (!$group) {
            return $this->successResponse(
                [$user, "group_id" => "", "group_name" => ""],
                200
            );
        }
        return $this->successResponse(
            [
                $user,
                "group_id" => $user->group->id,
                "group_name" => $user->group->name,
            ],
            200
        );
    }

    public function logout()
    {
        auth()->logout();
        return $this->showMessage("Sesion terminada");
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function register(RegisterRequest $request)
    {
       
        $user = User::create([
            "name" => $request->name,
            "codigopostal" => $request->codigopostal,
            "direccion" => $request->direccion,
            "telefono" => $request->telefono,
            "nickname" => $request->nickname,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);

        $token = auth()->attempt([
            "email" => $request->email,
            "password" => $request->password,
        ]);

        return $this->successResponse(
            [
                "message" => "Usuario Registrado exitosamente",
            ],
            201
        );
    }

    protected function respondWithToken($token)
    {
        $user = auth()->user();
        
            return response()->json([
                "token" => $token,
                "type" => "bearer",
                "expires_in" =>
                    auth()
                        ->factory()
                        ->getTTL() * 60,
                "user" => $user,
            ]);
            return response()->json([
                "token" => $token,
                "type" => "bearer",
                "expires_in" =>
                    auth()
                        ->factory()
                        ->getTTL() * 60,
                "user" => $user,
            ]);
    }
}
