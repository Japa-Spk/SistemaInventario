<div class="modal fade" id="provedorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear proveodr</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form">
                    @csrf
                    <div class="card card-login card-hidden mb-3">
                        <div class="card-header card-header-info text-center">
                            <h4 class="card-title"><strong>{{ __('Agregar un provedor') }}</strong></h4>
                        </div>
                        <div class="card-body ">
                            <!-- <p class="card-description text-center">{{ __('Or Be Classical') }}</p> -->
                            <div class="bmd-form-group{{ $errors->has('nombre') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">local_library</i>
                                        </span>
                                    </div>
                                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="{{ __('Nombre...') }}" value="{{ old('nombre') }}" required>
                                </div>
                                <div id="nombre-error" class="error text-danger pl-3" for="nombre" style="display: block;"></div>
                            </div>
                            <div class="bmd-form-group{{ $errors->has('direccion') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">explore</i>
                                        </span>
                                    </div>
                                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="{{ __('Direccion...') }}" value="{{ old('direccion') }}" required>
                                </div>
                                <div id="direccion-error" class="error text-danger pl-3" for="direccion" style="display: block;"></div>
                            </div>
                            <div class="bmd-form-group{{ $errors->has('telefono') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">contact_phone</i>
                                        </span>
                                    </div>
                                    <input type="number" name="telefono" id="telefono" class="form-control" placeholder="{{ __('Telefono...') }}" value="{{ old('telefono') }}" required>
                                </div>
                                <div id="telefono-error" class="error text-danger pl-3" for="telefono" style="display: block;"></div>
                            </div>
                            <div class="bmd-form-group{{ $errors->has('marca') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">business</i>
                                        </span>
                                    </div>
                                    <input type="text" name="marca" id="marca" class="form-control" placeholder="{{ __('Marca...') }}" value="{{ old('marca') }}" required>
                                </div>
                                <div id="marca-error" class="error text-danger pl-3" for="marca" style="display: block;"></div>
                            </div>


                        </div>
                    </div>
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
                    <button type="submit" class="btn btn-primary" id="formSubmit">Guardar provedor</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready(function() {
        $('#formSubmit').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('provedores') }}",
                method: 'post',
                data: {
                    nombre: $('#nombre').val(),
                    direccion: $('#direccion').val(),
                    telefono: $('#telefono').val(),
                    marca: $('#marca').val(),
                },
                success: function(result) {
                    console.log("Lega a function->", result);
                    if (result.errors) {
                        var errors = result;
                        $.each(result.errors, function(key, value) {
                            var ErrorID = '#' + key + '-error';
                            $(ErrorID).removeClass("d-none")
                            $(ErrorID).text(value);
                        });
                    } else {
                        $('#provedorModal').modal('hide');
                        location.reload();
                    }
                },
                error: function(result) {
                    console.log("Llego Error:", result);
                }
            });
        });
    });
</script>