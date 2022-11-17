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
     <h1 class="h3 mb-2 text-gray-800"><?= lang('title-service') ?></h1>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary"><?= lang('new-service') ?></h6>
         </div>
         <div class="card-body">
             <div class="container-fluid">
                 <form action="#" method="POST" enctype="multipart/form-data" id="frmNewservice" name="frmNewservice" class="needs-validation">
                     <div class="row">
                         <div class="col-md-2">
                             <label for="serviceId" class="form-label"><?= lang('serviceId') ?></label>
                             <input type="text" id="serviceId" name="serviceId" class="form-control" maxlength="10" required>
                         </div>
                         <div class="col-md-4">
                             <label for="serviceTitle" class="form-label"><?= lang('serviceTitle') ?></label>
                             <input type="text" id="serviceTitle" name="serviceTitle" class="form-control" maxlength="100" required>
                         </div>
                         <div class="col-md-4">
                             <label for="categoryId" class="form-label"><?= lang('categoryId') ?></label>
                             <select name="categoryId" id="categoryId" class="form-select" required>
                                 <option value=""><?= lang('select-category') ?></option>
                                 <?Php
                                    foreach ($categorys as $category) {
                                    ?>
                                     <option value="<?= $category->categoryId ?>"><?= $category->categoryName ?></option>
                                 <?Php
                                    }
                                    ?>
                             </select>
                         </div>
                         <div class="col-md-2">
                             <label for="servicePrice" class="form-label"><?= lang('servicePrice') ?></label>
                             <input type="number" name="servicePrice" id="servicePrice" class="form-control" step="0.01" min="0" minlength="1" maxlength="10" pattern="[0-9]+\.\d\S" required>
                             <div class="valid-feedback">
                                 Looks good!
                             </div>

                         </div>
                         <div class="col-md-4">
                             <label for="serviceDescription" class="form-label"><?= lang('serviceDescription') ?></label>
                             <textarea name="serviceDescription" id="serviceDescription" cols="30" rows="4" class="form-control" maxlength="150" required></textarea>
                         </div>
                         <div class="col-md-8 mt-4">
                             <label for="serviceImagen" class="form-label"><?= lang('serviceImagen') ?> <span class="dimension"><?= lang('dimension-service') ?></span></label>
                             <input type="file" name="serviceImagen" id="serviceImagen" class="form-control" accept="image/jpeg" required>
                         </div>
                         <div class="col-md-12 text-end">
                             <div id="preview"><img src="#" class="placeholder img-fluid img-thumbnail" width="200" height="125"></div>
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
                     $('#frmNewservice + img').remove();
                     $('#preview').html(' <img src="' + e.target.result + '" class="img-fluid img-thumbnail" width="200" height="125" /> ');
                 }
             }
         };

         /**
          * function en jquery que dispara la función para mostrar el preview
          * Descripción: función que al cambiar el elemento con el indicador (#serviceImagen) ejecuta
          * la función que muestra un preview de la imagen a subir en el formulario
          * @author: Cesar Carrasco
          * @date: 09/11/2022
          *
          */
         $('#serviceImagen').change(function() {
             filePreview(this);
         });

         // se crea la variable urlbase con el valor base_url() de codeigniter
         var urlbase = "<?= base_url() ?>";

         /**
          * function en jquery para cancelar insertar un nuevo service
          * Descripción: función que al hacer click en el elemento con la clase (.btn-danger)
          * cancela la operacion y redirecciona a la view service
          * @author: Cesar Carrasco
          * @date: 09/11/2022
          *
          */
         $('.btn-danger').click(function() {

             $('#preview').html(' <img src="#" class="placeholder img-fluid img-thumbnail" width="200" height="125" /> ');
             alertify.warning('<?= lang("cancel-operation") ?>')
             $("#mensaje").html(' ');
             setTimeout("location.reload(true);", 3000);
             location.href = urlbase + 'Admin/servicios';
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
         $(function() {

             jQuery.validator.addMethod("laxPrice", function(value, element) {
                 // allow any non-whitespace characters as the host part
                 var patron = /[0-9\S\d\.]$/
                 return this.optional(element) || patron.test(value);
             }, 'Solo se permiten dígitos sin espacios');

             // Initialize form validation on the registration form.

             // It has the name attribute "registration"

             $("form[name='frmNewservice']").validate({

                 // Specify validation rules

                 rules: {

                     // The key name on the left side is the name attribute

                     // of an input field. Validation rules are defined

                     // on the right side

                     serviceId: {
                         required: true,
                         maxlength: 10
                     },

                     serviceTitle: {
                         required: true,
                         maxlength: 100
                     },

                     categoryId: "required",

                     servicePrice: {
                         required: true,
                         number: true,
                         min: 0.01,
                         minlength: 1,
                         maxlength: 10,
                         laxPrice: true
                     },

                     serviceDescription: {
                         required: true,
                         maxlength: 150

                     },

                     serviceImagen: {
                         required: true,
                     }

                 },

                 // Specify validation error messages

                 messages: {

                     serviceId: {
                         required: "Introduzca un Código",
                         maxlength: "Su Código debe ser menos de 10 caracteres"
                     },

                     serviceTitle: {
                         required: "Introduzca un Valor como titulo del Servicio",
                         maxlength: "Su titulo debe ser menos de 100 caracteres"
                     },

                     categoryId: "Seleccione una Categoría",

                     servicePrice: {
                         required: "El precio es requerido",
                         number: "Solo permite Números",
                         min: "El precio debe ser mayor a 0",
                         minlength: "Debe tener al menos un numero",
                         maxlength: "no debe ser mas de 10 dígitos",
                     },

                     serviceDescription: {
                         required: "Proporcione una descripción",
                         maxlength: "Su descripción debe ser menos 150 caracteres."
                     },

                     serviceImagen: {
                         required: "Debe seleccionar una Imagen",
                     }

                 },

                 submitHandler: function(form) {
                     var formData = new FormData($("#frmNewservice")[0]);

                     //creo variable con la url del ajax
                     var urlajax = urlbase + "Admin/guardarService";
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
                                     location.href = urlbase + 'Admin/servicios';
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


                 }

             });

         });

     });
 </script>