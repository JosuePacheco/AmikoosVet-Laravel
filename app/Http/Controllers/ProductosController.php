<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Producto;
use App\Models\Proveedor;
use JsValidator;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto;
        // enviamos listado de categorías posibles
        $proveedores = Proveedor::select('id', 'nombre')->orderBy('nombre', 'asc')->pluck('nombre', 'id');
        $validator = JsValidator::make(Producto::reglasValidacion(), [], Producto::etiquetas(), '#formulario');
        return view('productos.form', compact('producto', 'proveedores', 'validator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->setValidator($request, Producto::reglasValidacion(), [])->validate();
        Producto::create($request->all());
        flash('Producto creado satisfactoriamente')->success();
        return redirect()->route('productos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        // enviamos listado de categorías posibles
        $proveedores = Proveedor::select('id', 'nombre')->orderBy('nombre', 'asc')->pluck('nombre', 'id');
        $validator = JsValidator::make(Producto::reglasValidacion(), [], Producto::etiquetas(), '#formulario');
        return view('productos.form', compact('producto', 'proveedores', 'validator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $this->setValidator($request, Producto::reglasValidacion(), [])->validate();
        $producto->update($request->all());
        flash('Producto actualizado satisfactoriamente')->success();
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        flash('Producto eliminado satisfactoriamente')->warning();
        return redirect()->route('productos.index');
    }

    protected function setValidator(Request $request, $validationRules, $replaceValidationRules = []) {
        return Validator::make($request->all(), array_merge($validationRules, $replaceValidationRules))
            ->setAttributeNames(Producto::etiquetas());
    }
}
