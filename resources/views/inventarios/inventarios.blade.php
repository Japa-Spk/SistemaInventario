@extends('layouts.app', ['activePage' => 'tabla_inventarios', 'titlePage' => __('Inventarios')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Inventarios</h4>
            <p class="card-category"> Lista de los inventarios</p>
            <button type="button" class="btn btn-default btn-round btn-lg" data-toggle="modal" data-target="#inventarioModal" id="createInventario">
              <i class="material-icons">add_circle</i> {{ __('Agregar inventario') }}
            </button>
          </div>
          @include('inventarios.crearinventario')
          @include('inventarios.editarinventario')
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Producto
                  </th>
                  <th>
                    Cantidad
                  </th>
                  <th>
                    Valor Unitario
                  </th>
                  <th>
                    Provedor
                  </th>
                  <th>
                    Acción
                  </th>
                </thead>
                <tbody>
                  @foreach ($inventarios as $inventario)
                  <tr>
                    <td>
                      {{ $inventario->id }}
                    </td>
                    <td>
                      {{ $inventario->producto->nombre }}
                    </td>
                    <td>
                      {{ $inventario->cantidad }}
                    </td>
                    <td>
                      {{ $inventario->valor_unitario }}
                    </td>
                    <td>
                      {{ $inventario->provedor->nombre }}
                    </td>
                    <td>
                      <!-- <button type="button" hreft="" class="btn btn-default">Editar</button> -->
                      
                      <form method="post" action="{{ url('inventarios/'.$inventario->id.'/delete') }}">
                        {{ csrf_field() }}
                        <a href="" class="btn btn-default" id="editInventario" data-toggle="modal" data-target='#editinventarioModal' data-id="{{ $inventario->id }}">Editar</a>
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