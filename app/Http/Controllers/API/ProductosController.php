<?php

namespace App\Http\Controllers\API\ProductosController;

use App\Http\Requests\productoRequest;
use App\Models\Producto;
use App\Http\Controllers\ApiController;

class ProductosController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();

        return $this->showAll($productos);
    }

    public function show(Producto $producto)
    {
    return $this->showOne($producto);
    }

   
    public function update(datoRequest $request, Producto $producto)
    {
            $producto->fill($request->all());
            if ($producto->isClean()) {
                return $this->errorResponse(
                    "You need to specify a different value to update",
                    422
                );
            }
            $producto->save();
    
            return $this->showOne($producto);

    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return $this->showOne($producto);
    }
}