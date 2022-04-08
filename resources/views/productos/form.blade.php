@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-box"></i> <?php echo $producto->exists ? 'Editar' : 'Crear' ?> producto
        </div>
        <div class="card-body">
            {{ html()->modelForm($producto, $producto->exists ? 'put' : 'post', $producto->exists ? route('productos.update', $producto->id) : route('productos.store'))->attributes(['id' => 'formulario'])->open() }}

            <div class="mb-3">
                <label for="proveedor_id" class="form-label">proveedor</label>
                {{ html()->select('proveedor_id', $proveedores)->placeholder('Selecciona')->class('form-control form-control-sm') }}
            </div>
            
            <div class="mb-3">
                <label for="producto" class="form-label">Producto</label>
                {{ html()->text('producto')->class('form-control form-control-sm') }}
            </div>
            
            <div class="mb-3">
                <label for="Marca" class="form-label">Marca</label>
                {{ html()->text('marca')->class('form-control form-control-sm') }}
            </div>
            
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                {{ html()->text('precio')->class('form-control form-control-sm') }}
            </div>
            
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                {{ html()->text('stock')->class('form-control form-control-sm')->attributes(['type' => 'number', 'min' => 0, 'max' => '2000']) }}
            </div>
            
            {!! html()->button('<i class="fa fa-save"></i> guardar')->type('submit')->class('btn btn-primary btn-sm') !!}

            {{ html()->closeModelForm() }}
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
{!! $validator !!}
@endsection