@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Productos')])

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
          <div class="modal fade" id="productoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Crear producto</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="form" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="card card-login card-hidden mb-3">
                      <div class="card-header card-header-info text-center">
                        <h4 class="card-title"><strong>{{ __('Agregar un producto') }}</strong></h4>
                      </div>
                      <div class="card-body ">
                        <!-- <p class="card-description text-center">{{ __('Or Be Classical') }}</p> -->
                        <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">vpn_key</i>
                              </span>
                            </div>
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Codigo...') }}" value="{{ old('name') }}" required>
                          </div>
                          @if ($errors->has('name'))
                          <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                            <strong>{{ $errors->first('name') }}</strong>
                          </div>
                          @endif
                        </div>
                        <div class="bmd-form-group{{ $errors->has('id') ? ' has-danger' : '' }} mt-3">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">local_library</i>
                              </span>
                            </div>
                            <input type="text" name="id" class="form-control" placeholder="{{ __('Nombre...') }}" value="{{ old('id') }}" required>
                          </div>
                          @if ($errors->has('id'))
                          <div id="id-error" class="error text-danger pl-3" for="id" style="display: block;">
                            <strong>{{ $errors->first('id') }}</strong>
                          </div>
                          @endif
                        </div>
                        <div class="bmd-form-group{{ $errors->has('telefono') ? ' has-danger' : '' }} mt-3">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">description</i>
                              </span>
                            </div>
                            <input type="text" name="telefono" class="form-control" placeholder="{{ __('Descripcion...') }}" value="{{ old('telefono') }}" required>
                          </div>
                          @if ($errors->has('telefono'))
                          <div id="telefono-error" class="error text-danger pl-3" for="telefono" style="display: block;">
                            <strong>{{ $errors->first('telefono') }}</strong>
                          </div>
                          @endif
                        </div>
                        <div class="bmd-form-group{{ $errors->has('direccion') ? ' has-danger' : '' }} mt-3">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">ad_units</i>
                              </span>
                            </div>
                            <input type="text" name="direccion" class="form-control" placeholder="{{ __('Unidad de medida...') }}" value="{{ old('direccion') }}" required>
                          </div>
                          @if ($errors->has('direccion'))
                          <div id="direccion-error" class="error text-danger pl-3" for="direccion" style="display: block;">
                            <strong>{{ $errors->first('direccion') }}</strong>
                          </div>
                          @endif
                        </div>
                        <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">attach_money</i>
                              </span>
                            </div>
                            <input type="email" name="email" class="form-control" placeholder="{{ __('Valor...') }}" value="{{ old('email') }}" required>
                          </div>
                          @if ($errors->has('email'))
                          <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                            <strong>{{ $errors->first('email') }}</strong>
                          </div>
                          @endif
                        </div>
                        <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">all_inbox</i>
                              </span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Cantidad inicial...') }}" required>
                          </div>
                          @if ($errors->has('password'))
                          <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                            <strong>{{ $errors->first('password') }}</strong>
                          </div>
                          @endif
                        </div>
                        <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">chrome_reader_mode</i>
                              </span>
                            </div>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Descripcion empaque...') }}" required>
                          </div>
                          @if ($errors->has('password_confirmation'))
                          <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                          </div>
                          @endif
                        </div>

                        <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">add_a_photo</i>
                              </span>
                            </div>
                            <input type="file" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Descripcion empaque...') }}" required>
                          </div>
                          @if ($errors->has('password_confirmation'))
                          <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                          </div>
                          @endif
                        </div>
 
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary">Guardar productos</button>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Country
                  </th>
                  <th>
                    City
                  </th>
                  <th>
                    Salary
                  </th>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      1
                    </td>
                    <td>
                      Dakota Rice
                    </td>
                    <td>
                      Niger
                    </td>
                    <td>
                      Oud-Turnhout
                    </td>
                    <td class="text-primary">
                      $36,738
                    </td>
                  </tr>
                  <tr>
                    <td>
                      2
                    </td>
                    <td>
                      Minerva Hooper
                    </td>
                    <td>
                      Curaçao
                    </td>
                    <td>
                      Sinaai-Waas
                    </td>
                    <td class="text-primary">
                      $23,789
                    </td>
                  </tr>
                  <tr>
                    <td>
                      3
                    </td>
                    <td>
                      Sage Rodriguez
                    </td>
                    <td>
                      Netherlands
                    </td>
                    <td>
                      Baileux
                    </td>
                    <td class="text-primary">
                      $56,142
                    </td>
                  </tr>
                  <tr>
                    <td>
                      4
                    </td>
                    <td>
                      Philip Chaney
                    </td>
                    <td>
                      Korea, South
                    </td>
                    <td>
                      Overland Park
                    </td>
                    <td class="text-primary">
                      $38,735
                    </td>
                  </tr>
                  <tr>
                    <td>
                      5
                    </td>
                    <td>
                      Doris Greene
                    </td>
                    <td>
                      Malawi
                    </td>
                    <td>
                      Feldkirchen in Kärnten
                    </td>
                    <td class="text-primary">
                      $63,542
                    </td>
                  </tr>
                  <tr>
                    <td>
                      6
                    </td>
                    <td>
                      Mason Porter
                    </td>
                    <td>
                      Chile
                    </td>
                    <td>
                      Gloucester
                    </td>
                    <td class="text-primary">
                      $78,615
                    </td>
                  </tr>
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