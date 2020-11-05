@extends('layouts.app', ['activePage' => 'tabla_productos', 'titlePage' => __('Productos')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Productos</h4>
            <p class="card-category"> Lista de los productos del inventario</p>
            <button type="button" class="btn btn-default btn-round btn-lg" data-toggle="modal" data-target="#productoModal">
              <i class="material-icons">add_circle</i> {{ __('Agregar producto') }}
            </button>
          </div>
          @include('productos.crearproducto')
          @include('productos.editarproducto')
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Nombre
                  </th>
                  <th>
                    Unidad de medida
                  </th>
                  <th>
                    Valor de medida
                  </th>
                  <th>
                    Descripcion
                  </th>
                  <th>
                    Acción
                  </th>
                </thead>
                <tbody>
                  @foreach ($productos as $producto)
                  <tr>
                    <td>
                      {{ $producto->id }}
                    </td>
                    <td>
                      {{ $producto->nombre }}
                    </td>
                    <td>
                      {{ $producto->unidad_medida }}
                    </td>
                    <td>
                      {{ $producto->valor_umedida }} $
                    </td>
                    <td>
                      {{ $producto->descripcion }}
                    </td>
                    <td>
                      <!-- <button type="button" hreft="" class="btn btn-default">Editar</button> -->
                      <a href="" class="btn btn-default" id="editProducto" data-toggle="modal" data-target='#editproductoModal' data-id="{{ $producto->id }}">Editar</a>
                      <form method="post" action="{{ url('productos/'.$producto->id.'/delete') }}">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Eliminar</a>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection