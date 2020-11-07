<div class="modal fade" id="editproductoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form">
                    @csrf
                    <div class="card card-login card-hidden mb-3">
                        <div class="card-header card-header-info text-center">
                            <h4 class="card-title"><strong>{{ __('Editar un producto con ID') }} <input type="text" class="text-center" name="eid" id="eid" disabled></label></strong></h4>
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
                                    <input type="text" name="nombre" id="enombre" class="form-control" placeholder="{{ __('Nombre...') }}" value="{{ old('nombre') }}" required>
                                </div>
                                <div id="enombre-error" class="error text-danger pl-3" for="nombre" style="display: block;"></div>
                            </div>
                            <div class="bmd-form-group{{ $errors->has('unidad_medida') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">ad_units</i>
                                        </span>
                                    </div>
                                    <input type="text" name="unidad_medida" id="eunidad_medida" class="form-control" placeholder="{{ __('Unidad de medida...') }}" value="{{ old('unidad_medida') }}" required>
                                </div>
                                <div id="eunidad_medida-error" class="error text-danger pl-3" for="unidad_medida" style="display: block;"></div>
                            </div>
                            <div class="bmd-form-group{{ $errors->has('valor_medida') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">attach_money</i>
                                        </span>
                                    </div>
                                    <input type="number" name="valor_medida" id="evalor_medida" class="form-control" placeholder="{{ __('Valor por unidad de medida...') }}" value="{{ old('valor_medida') }}" required>
                                </div>
                                <div id="evalor_medida-error" class="error text-danger pl-3" for="valor_medida" style="display: block;"></div>
                            </div>

                            <div class="bmd-form-group{{ $errors->has('descripcion') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">chrome_reader_mode</i>
                                        </span>
                                    </div>
                                    <textarea class="form-control" name="descripcion" id="edescripcion" rows="3" placeholder="{{ __('Descripcion de producto...') }}"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
                    <button type="submit" class="btn btn-primary" id="editformSubmit">Editar producto</button>
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

        $('body').on('click', '#editProducto', function(event) {

            event.preventDefault();
            var id = $(this).data('id');
            console.log(id)
            $.get('productos/' + id + '/edit', function(data) {
                console.log("datos traidos de el id->", data);
                $('#eid').val(data.producto.id);
                $('#enombre').val(data.producto.nombre);
                $('#eunidad_medida').val(data.producto.unidad_medida);
                $('#evalor_medida').val(data.producto.valor_umedida);
                $('#edescripcion').val(data.producto.descripcion);
            })
        });


        $('#editformSubmit').click(function(e) {
            e.preventDefault();
            var id = $("#eid").val();
            console.log(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "productos/"+id+"/edit",
                method: 'post',
                data: {
                    nombre: $('#enombre').val(),
                    unidad_medida: $('#eunidad_medida').val(),
                    valor_medida: $('#evalor_medida').val(),
                    descripcion: $('#edescripcion').val(),
                },
                success: function(result) {
                    console.log("Lega a function->", result);
                    if (result.errors) {
                        var errors = result;
                        $.each(result.errors, function(key, value) {
                            var ErrorID = '#e' + key + '-error';
                            $(ErrorID).removeClass("d-none")
                            $(ErrorID).text(value);
                        });
                    } else {
                        $('#editproductoModal').modal('hide');
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