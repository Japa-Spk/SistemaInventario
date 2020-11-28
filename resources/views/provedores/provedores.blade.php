@extends('layouts.app', ['activePage' => 'tabla_provedores', 'titlePage' => __('Provedores')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Provedores</h4>
            <p class="card-category"> Lista de los provedores</p>
            <button type="button" class="btn btn-default btn-round btn-lg" data-toggle="modal" data-target="#provedorModal">
              <i class="material-icons">add_circle</i> {{ __('Agregar provedor') }}
            </button>
          </div>
          @include('provedores.crearprovedor')
          @include('provedores.editarprovedor')
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
                    Dirección
                  </th>
                  <th>
                    Telefóno
                  </th>
                  <th>
                    Marca
                  </th>
                  <th>
                    Acción
                  </th>
                </thead>
                <tbody>
                  @foreach ($provedores as $provedor)
                  <tr>
                    <td>
                      {{ $provedor->id }}
                    </td>
                    <td>
                      {{ $provedor->nombre }}
                    </td>
                    <td>
                      {{ $provedor->direccion }}
                    </td>
                    <td>
                      {{ $provedor->telefono }}
                    </td>
                    <td>
                      {{ $provedor->marca }}
                    </td>
                    <td>
                      <!-- <button type="button" hreft="" class="btn btn-default">Editar</button> -->
                      
                      <form method="post" action="{{ url('provedores/'.$provedor->id.'/delete') }}">
                        {{ csrf_field() }}
                        <a href="" class="btn btn-default" id="editProvedor" data-toggle="modal" data-target='#editprovedorModal' data-id="{{ $provedor->id }}">Editar</a>
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