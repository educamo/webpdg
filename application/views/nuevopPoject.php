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
     <h1 class="h3 mb-2 text-gray-800"><?= lang('title-project') ?></h1>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary"><?= lang('new-project') ?></h6>
         </div>
         <div class="card-body">
             <div class="container-fluid">
                 <form action="#" method="POST" enctype="multipart/form-data" id="frmNewproject">
                     <div class="row">
                         <div class="col-md-4">
                             <label for="projectId" class="form-label"><?= lang('projectId') ?></label>
                             <input type="text" id="projectId" name="projectId" class="form-control" maxlength="10" required>
                         </div>
                         <div class="col-md-4">
                             <label for="projectTitle" class="form-label"><?= lang('projectTitle') ?></label>
                             <input type="text" id="projectTitle" name="projectTitle" class="form-control" maxlength="100" required>
                         </div>
                         <div class="col-md-4">
                             <label for="projectDescription" class="form-label"><?= lang('projectDescription') ?></label>
                             <textarea name="projectDescription" id="projectDescription" cols="30" rows="4" class="form-control" maxlength="250" required></textarea>
                         </div>
                         <div class="col-md-8 mt-4">
                             <label for="projectImagen" class="form-label"><?= lang('projectImagen') ?> <span class="dimension"><?= lang('dimension-project') ?></span></label>
                             <input type="file" name="projectImagen" id="projectImagen" class="form-control" accept="image/jpeg, image/png" required>
                         </div>
                         <div class="col-md-4 mt-4">
                             <div id="preview"><img src="#" class="placeholder img-fluid img-thumbnail" width="306" height="360"></div>
                         </div>
                     </div>
                     <div class="row mt-5">
                         <div class="col-md-6 text-end">
                             <button type="submit" class="btn btn-success"><?= lang("save") ?></button>
                         </div>
                         <div class="col-md-6">
                             <button type="reset" class="btn btn-danger"><?= lang("cancel") ?></button>
                         </div>
                     </div>
                 </form>

                 <div class="row mt-5">
                     <div class="col-md-12" id="mensaje"></div>
                 </div>


             </div>

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
                     $('#frmNewproject + img').remove();
                     $('#preview').html(' <img src="' + e.target.result + '" class="img-fluid img-thumbnail" width="200" height="125" /> ');
                 }
             }
         };

         /**
          * function en jquery que dispara la función para mostrar el preview
          * Descripción: función que al cambiar el elemento con el indicador (#projectImagen) ejecuta
          * la función que muestra un preview de la imagen a subir en el formulario
          * @author: Cesar Carrasco
          * @date: 09/11/2022
          *
          */
         $('#projectImagen').change(function() {
             filePreview(this);
         });

         // se crea la variable urlbase con el valor base_url() de codeigniter
         var urlbase = "<?= base_url() ?>";

         /**
          * function en jquery para cancelar insertar un nuevo project
          * Descripción: función que al hacer click en el elemento con la clase (.btn-danger)
          * cancela la operacion y redirecciona a la view project
          * @author: Cesar Carrasco
          * @date: 09/11/2022
          *
          */
         $('.btn-danger').click(function() {

             $('#preview').html(' <img src="#" class="placeholder img-fluid img-thumbnail" width="200" height="125" /> ');
             alertify.warning('<?= lang("cancel-operation") ?>')
             $("#mensaje").html(' ');
             setTimeout("location.reload(true);", 3000);
             location.href = urlbase + 'Admin/proyectos';
         });

/**
          * function en jquery que se dispara con el evento submit del formulario
          * Descripción: función Ajax que envia los datos del formulario en un objeto formData
          * para ser procesados en el controlador
          * @author: Cesar Carrasco
          * @return void r(Json)
          * @date: 09/11/2022
          *
          */
         $("#frmNewproject").submit(function(event) {
             // Prevent the form from submitting
             event.preventDefault();

             var formData = new FormData($("#frmNewproject")[0]);

             //creo variable con la url del ajax
             var urlajax = urlbase + "Admin/guardarproject";
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
                         $("#mensaje").html('<div class="alert alert-success" role="alert"><strong><?= lang("new") ?></strong></div>');
                         setTimeout(function() {
                             location.href = urlbase + 'Admin/proyectos';
                         }, 3000);

                     } else {
                         $("#mensaje").html('<div class="alert alert-danger" role="alert"><strong>' + r + '</strong></div>');
                         //  setTimeout("location.reload(true);", 3000);
                         $(".btn-success").removeAttr('disabled');


                     }
                 },
                 error: function(r) {
                     $("#mensaje").html('<div class="alert alert-danger" role="alert"><strong><?= lang("errorSave") ?></strong></div>');
                     setTimeout("location.reload(true);", 3000);
                     $(".btn-success").removeAttr('disabled');

                 }
             })

         });
     });
 </script>