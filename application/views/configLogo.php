 <!-- Begin Page Content -->
 <div class="container-fluid">

     <?Php
        if ($this->session->flashdata('status')) :
        ?>

         <div class="alert alert-success">
             <?= $this->session->flashdata('status'); ?>


         </div>

     <?Php

            header('Refresh: 2');
        endif;
        ?>

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800"><?= lang('title-configContacto') ?></h1>


     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary"><?= lang('modifycontac') ?></h6>
         </div>
         <div class="card-body">
             <form action="#" method="post" enctype="multipart/form-data" id="frmModifylogo">
                 <div class="row">
                     <div class="col-md-8 mb-2">
                         <input type="hidden" id="configId" name="configId" class="form-control" value="<?= $config->configId ?>">
                         <label for="configValue" class="form-label"><?= lang('logo') ?> <span class="dimension"><?= lang('dimension-logo') ?></span></label>
                         <input type="file" name="configValue" id="configValue" class="form-control" accept="image/png, image/jpeg" required>
                         <input type="hidden" id="imagenVieja" name="imagenVieja" value="<?= $config->configValue ?>">
                     </div>
                     <div class="col-md-4 mt-4">
                         <div id="preview"><img src="<?= base_url('assets/img/') . $config->configValue ?>" class="img-fluid img-thumbnail" width="259" height="91"></div>
                     </div>
                 </div>
                 <div class="row mt-4">
                     <div class="col-md-12 text-center">
                         <button type="submit" class="btn btn-success"><?= lang("save") ?></button>
                     </div>
                 </div>
             </form>
             <div class="row mb-5 mt-3" id="mensaje" name="mensaje"></div>
         </div>
     </div>

 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->
 <script>
     $(document).ready(function() {
         /**
          * function en jquery para mostrar preview del archivo a subir
          * Descripción: función que al ejecutarle muestra un preview de la imagen a subir en el formulario
          * @author: Cesar Carrasco
          * @date: 09/11/2022
          *
          */
         function filePreview(input) {

             if (input.files && input.files[0]) {
                 var reader = new FileReader();
                 reader.readAsDataURL(input.files[0]);
                 reader.onload = function(e) {
                     $('#frmModifylogo + img').remove();
                     $('#preview').html(' <img src="' + e.target.result + '" class="img-fluid img-thumbnail" width="259" height="91" /> ');
                 }
             }
         };

         /**
          * function en jquery que dispara la función para mostrar el preview
          * Descripción: función que al cambiar el elemento con el indicador (#sliderImagen) ejecuta
          * la función que muestra un preview de la imagen a subir en el formulario
          * @author: Cesar Carrasco
          * @date: 09/11/2022
          *
          */
         $('#configValue').change(function() {
             filePreview(this);
         });


         var urlbase = "<?= base_url() ?>";


         /**
          * function en jquery que se dispara con el evento submit del formulario
          * Descripción: función Ajax que envía los datos del formulario en un objeto formData
          * para ser procesados en el controlador
          * @author: Cesar Carrasco
          * @return void r(Json)
          * @date: 09/11/2022
          *
          */
         $("#frmModifylogo").submit(function(event) {
             // Prevent the form from submitting
             event.preventDefault();

             var formData = new FormData($("#frmModifylogo")[0]);

             //creo variable con la url del ajax
             var urlajax = urlbase + "Admin/modificarLogo";
             // Run $.ajax() here
             // Using the core $.ajax() method
             $.ajax({

                 // Whether this is a POST or GET request
                 type: "POST",
                 // The URL for the request
                 url: urlajax,
                 // The data to send (will be converted to a query string)
                 data: formData,
                 cache: false,
                 processData: false,
                 contentType: false,
                 dataType: 'json',


                 beforeSend: function(objeto) {
                     $("#mensaje").html(" ");
                     $(".btn-success").attr('disabled', 'disabled');
                     var cargando = '<div class="alert alert-info" role="alert"><strong><?= lang("load") ?></strong><div class="spinner-border ms-auto text-primary text-end ml-5" role="status" aria-hidden="true"></div></div>';
                     $("#mensaje").html(cargando);
                 },
                 success: function(r) {
                     if (r === true) {
                         $("#mensaje").html('<div class="alert alert-success" role="alert"><strong><?= lang("update") ?></strong></div>');
                         setTimeout("location.reload(true);", 3000);

                     } else {
                         $("#mensaje").html('<div class="alert alert-danger" role="alert"><strong>' + r + '</strong></div>');
                         //  setTimeout("location.reload(true);", 3000);
                         $(".btn-success").removeAttr('disabled');


                     }
                 },
                 error: function(r) {
                     $("#mensaje").html('<div class="alert alert-danger" role="alert"><strong><?= lang("error") ?></strong></div>');
                     setTimeout("location.reload(true);", 3000);
                     $(".btn-success").removeAttr('disabled');

                 }
             })

         });

     });
 </script>