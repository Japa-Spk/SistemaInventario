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
                <form class="form">
                @csrf
                    <div class="card card-login card-hidden mb-3">
                        <div class="card-header card-header-info text-center">
                            <h4 class="card-title"><strong>{{ __('Agregar un producto') }}</strong></h4>
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
                            <div class="bmd-form-group{{ $errors->has('unidad_medida') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">ad_units</i>
                                        </span>
                                    </div>
                                    <input type="text" name="unidad_medida" id="unidad_medida" class="form-control" placeholder="{{ __('Unidad de medida...') }}" value="{{ old('unidad_medida') }}" required>
                                </div>
                                <div id="unidad_medida-error" class="error text-danger pl-3" for="unidad_medida" style="display: block;"></div>
                            </div>
                            <div class="bmd-form-group{{ $errors->has('valor_medida') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">attach_money</i>
                                        </span>
                                    </div>
                                    <input type="number" name="valor_medida" id="valor_medida" class="form-control" placeholder="{{ __('Valor por unidad de medida...') }}" value="{{ old('valor_medida') }}" required>
                                </div>
                                <div id="valor_medida-error" class="error text-danger pl-3" for="valor_medida" style="display: block;"></div>
                            </div>

                            <div class="bmd-form-group{{ $errors->has('descripcion') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">chrome_reader_mode</i>
                                        </span>
                                    </div>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="{{ __('Descripcion de producto...') }}"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
                    <button type="submit" class="btn btn-primary" id="formSubmit">Guardar producto</button>
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
                url: "{{ route('productos') }}",
                method: 'post',
                data: {
                    nombre: $('#nombre').val(),
                    unidad_medida: $('#unidad_medida').val(),
                    valor_medida: $('#valor_medida').val(),
                    descripcion: $('#descripcion').val(),
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
                        $('#productoModal').modal('hide');
                        location.reload();
                    }
                },
                error: function(result){
                    console.log("Llego Error:",result);
                }
            });
        });
    });
</script>