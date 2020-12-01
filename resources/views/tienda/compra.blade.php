<div class="modal fade" id="compraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form">
                    @csrf
                    <div class="card card-login card-hidden mb-3">
                        <div class="card-body ">
                            <!-- <p class="card-description text-center">{{ __('Or Be Classical') }}</p> -->
                            <img src="https://quimicaactiva.com/wp-content/uploads/2017/08/no-disponible.png" alt="" class="img-raised img-circle" width="150" height="150">

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

                            <div class="bmd-form-group{{ $errors->has('cantidad') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">format_list_numbered</i>
                                        </span>
                                    </div>
                                    <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="{{ __('Cantidad...') }}" value="{{ old('cantidad') }}" required>
                                </div>
                                <div id="direccion-error" class="error text-danger pl-3" for="cantidad" style="display: block;"></div>
                            </div>
                            <h2>Total:</h2>
                            <div class="bmd-form-group{{ $errors->has('descripcion') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">chrome_reader_mode</i>
                                        </span>
                                    </div>
                                    <textarea class="form-control" name="Empaque" id="descripcion" rows="3" placeholder="{{ __('Descripcion de Empaque...') }}"></textarea>
                                </div>
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

</script>