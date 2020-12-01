@extends('layouts.app', ['activePage' => 'tienda', 'titlePage' => __('Tienda')])

@section('content')
@include('tienda.compra')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Tienda</h4>
            <p class="card-category"> Lista de los productos</p>
          </div>
          <div class="row">
          @foreach ($productos as $producto)
          <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <img src="https://quimicaactiva.com/wp-content/uploads/2017/08/no-disponible.png" alt="" class="img-raised img-circle">
            <div class="card-body">
              <h5 class="card-title">{{$producto->nombre}}</h5>
              <p class="card-text">{{$producto->descripcion}}</p>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#compraModal">
                <i class="material-icons">add_shopping_cart</i>
              </button>
            </div>
          </div>
          </div>
          @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection