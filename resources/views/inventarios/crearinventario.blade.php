<div class="modal fade" id="inventarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Inventario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form">
                    @csrf
                    <div class="card card-login card-hidden mb-3">
                        <div class="card-header card-header-info text-center">
                            <h4 class="card-title"><strong>{{ __('Agregar Inventario') }}</strong></h4>
                        </div>
                        <div class="card-body ">
                            <!-- <p class="card-description text-center">{{ __('Or Be Classical') }}</p> -->
                            <div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">local_library</i>
                                        </span>
                                    </div>
                                    <select class="form-control selectpicker" data-style="btn btn-link" id="FormControlSelectProducto">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="bmd-form-group{{ $errors->has('producto_id') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">local_library</i>
                                        </span>
                                    </div>
                                    <input type="text" name="producto_id" id="producto_id" class="form-control" placeholder="{{ __('Producto_ID...') }}" value="{{ old('producto_id') }}" required>
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
                                    <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="{{ __('Cantidad...') }}" value="{{ old('cantidad') }}" required>
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
                                    <input type="number" name="valor_unitario" id="valor_unitario" class="form-control" placeholder="{{ __('Valor Unitario...') }}" value="{{ old('valor_unitario') }}" required>
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
                                    <input type="number" name="provedor_id" id="provedor_id" class="form-control" placeholder="{{ __('Provedor_ID...') }}" value="{{ old('provedor_id') }}" required>
                                </div>
                                <div id="provedor_id-error" class="error text-danger pl-3" for="provedor_id" style="display: block;"></div>
                            </div>


                        </div>
                    </div>
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
                    <button type="submit" class="btn btn-primary" id="formSubmit">Guardar inventario</button>
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
                url: "{{ route('inventarios') }}",
                method: 'post',
                data: {
                    producto_id: $('#producto_id').val(),
                    cantidad: $('#cantidad').val(),
                    valor_unitario: $('#valor_unitario').val(),
                    provedor_id: $('#provedor_id').val(),
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
                        $('#inventarioModal').modal('hide');
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