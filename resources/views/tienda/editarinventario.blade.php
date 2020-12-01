<div class="modal fade" id="editinventarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar provedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form">
                    @csrf
                    <div class="card card-login card-hidden mb-3">
                        <div class="card-header card-header-info text-center">
                            <h4 class="card-title"><strong>{{ __('Editar un inventario con ID') }} <input type="text" class="text-center" name="eid" id="eid" disabled></label></strong></h4>
                        </div>
                        <div class="card-body ">
                            <!-- <p class="card-description text-center">{{ __('Or Be Classical') }}</p> -->
                            <div class="bmd-form-group{{ $errors->has('producto_id') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">local_library</i>
                                        </span>
                                    </div>
                                    <input type="text" name="producto_id" id="eproducto_id" class="form-control" placeholder="{{ __('Producto_ID...') }}" value="{{ old('producto_id') }}" required>
                                </div>
                                <div id="producto_id-error" class="error text-danger pl-3" for="producto_id" style="display: block;"></div>
                            </div>
                            <div class="bmd-form-group{{ $errors->has('cantidad') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">explore</i>
                                        </span>
                                    </div>
                                    <input type="number" name="cantidad" id="ecantidad" class="form-control" placeholder="{{ __('Cantidad...') }}" value="{{ old('cantidad') }}" required>
                                </div>
                                <div id="direccion-error" class="error text-danger pl-3" for="cantidad" style="display: block;"></div>
                            </div>
                            <div class="bmd-form-group{{ $errors->has('valor_unitario') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">contact_phone</i>
                                        </span>
                                    </div>
                                    <input type="number" name="valor_unitario" id="evalor_unitario" class="form-control" placeholder="{{ __('Valor Unitario...') }}" value="{{ old('valor_unitario') }}" required>
                                </div>
                                <div id="valor_unitario-error" class="error text-danger pl-3" for="valor_unitario" style="display: block;"></div>
                            </div>
                            <div class="bmd-form-group{{ $errors->has('provedor_id') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">business</i>
                                        </span>
                                    </div>
                                    <input type="number" name="provedor_id" id="eprovedor_id" class="form-control" placeholder="{{ __('Provedor_ID...') }}" value="{{ old('provedor_id') }}" required>
                                </div>
                                <div id="provedor_id-error" class="error text-danger pl-3" for="provedor_id" style="display: block;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
                    <button type="submit" class="btn btn-primary" id="editformSubmit">Editar inventario</button>
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

        $('body').on('click', '#editInventario', function(event) {

            event.preventDefault();
            var id = $(this).data('id');
            console.log(id)
            $.get('inventarios/' + id + '/edit', function(data) {
                // console.log("datos traidos de el id->", data);
                $('#eid').val(data.inventario.id);
                $('#eproducto_id').val(data.inventario.producto_id);
                $('#ecantidad').val(data.inventario.cantidad);
                $('#evalor_unitario').val(data.inventario.valor_unitario);
                $('#eprovedor_id').val(data.inventario.provedor_id);
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
                url: "inventarios/" + id + "/edit",
                method: 'post',
                data: {
                    producto_id: $('#eproducto_id').val(),
                    cantidad: $('#ecantidad').val(),
                    valor_unitario: $('#evalor_unitario').val(),
                    provedor_id: $('#eprovedor_id').val(),
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
                        $('#editinventarioModal').modal('hide');
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