<div class="modal fade" id="imgproductoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Imagen producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" method="post" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-login card-hidden mb-3">
                        <div class="card-header card-header-info text-center">
                            <h4 class="card-title"><strong>{{ __('Imagen de producto con ID') }} <input type="text" class="text-center" name="iid" id="iid" disabled></label></strong></h4>
                        </div>
                    </div>

                    <input type="file" id="file" class="inputFileHidden">
                    <div class="card" id="preview" style="padding: 5px 5px 5px 5px;overflow:hidden;max-height:500px;"></div>
                    <button type="submit" class="btn btn-primary" id="imgformSubmit">Subir imagen de producto</button>
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

        $('body').on('click', '#imgProducto', function(event) {

            event.preventDefault();
            var idimg = $(this).data('id');
            $('#iid').val(idimg);
            $.get('productos/' + idimg + '/img', function(data) {
                console.log("datos img->", data);
                var image = new Image();
                var src = data.imagen; //Esta es la variable que contiene la url de una imagen ejemplo, luego puedes poner la que quieras
                image.src = src;
                $('#preview').append(image);
            });

        });

        $("#imgformSubmit").on('click', function() {
            var id = $("#iid").val();
            var formData = new FormData();
            var files = $('#file')[0].files[0];
            formData.append('file', files);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "productos/" + id + "/img",
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                }
            });
            return false;
        });

        document.getElementById("file").onchange = function(e) {
            // Creamos el objeto de la clase FileReader
            let reader = new FileReader();

            // Leemos el archivo subido y se lo pasamos a nuestro fileReader
            reader.readAsDataURL(e.target.files[0]);

            // Le decimos que cuando este listo ejecute el código interno
            reader.onload = function() {
                let preview = document.getElementById('preview'),
                    image = document.createElement('img');

                image.src = reader.result;

                preview.innerHTML = '';
                preview.append(image);
            };
        }
    });
</script>