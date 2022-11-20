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
   <h1 class="h3 mb-2 text-gray-800"><?= lang('title-rols') ?></h1>

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
     <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary"><?= lang('list-rols') ?></h6>
     </div>
     <div class="row">
       <div class="col-md-12 text-end mr-5 pr-4">
         <!-- Button trigger modal -->
         <button type="button" class="btn btn-default btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
           Nuevo <i class="fa fa-plus-circle"></i>
         </button>
       </div>
     </div>
     <div class="card-body">
       <div class="container-fluid">
         <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead>
               <tr>
                 <th><?= lang('rolId') ?></th>
                 <th><?= lang('rolName') ?></th>
                 <th><?= lang('activo') ?></th>
                 <th><?= lang('action') ?></th>
               </tr>
             </thead>

             <tbody>
               <?Php
                foreach ($rols as $rol) {

                  if ($rol->activo == 1) {
                    $activo = 'Si';
                  } else {
                    $activo = 'No';
                  }
                ?>
                 <tr>
                   <td><?= $rol->rolId ?></td>
                   <td><?= $rol->rolName ?></td>
                   <td><?= $activo ?></td>
                   <td class="text-center">
                     <a href="<?= base_url() ?>Admin/actualizarRol/<?= $rol->rolId ?>" class="btn btn-warning text-ligth"> <i class="fa fa-edit"></i></a>
                     <button type="button" class="btn btn-danger text-light delete" name="delete" data-id="<?= $rol->rolId ?>"><i class="fa fa-trash"></i></button>
                   </td>
                 </tr>
               <?Php
                }
                ?>
             </tbody>
           </table>
         </div>
       </div>


       <!-- Modal -->
       <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <h1 class="modal-title fs-5 font-weight-bold text-primary" id="exampleModalLabel"><?= lang('new-rol') ?></h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
               <div class="container-fluid">
                 <div class="row">

                   <form action="#" method="post" id="frmNewrol" name="frmNewrol">
                     <div class="row">

                       <div class="col-md-6">
                         <label for="rolId" class="form-label"><?= lang('rolId') ?></label>
                         <input type="text" class="form-control" id="rolId" name="rolId" minlength="1" maxlength="10" required>
                       </div>
                       <div class="col-md-6">
                         <label for="rolName" class="form-label"><?= lang('rolName') ?></label>
                         <input type="text" class="form-control" id="rolName" name="rolName" maxlength="100" required>
                       </div>
                       <div class="col-md-12 mt-4">
                         <label for="rolDescription" class="form-label"><?= lang('rolDescription') ?></label>
                         <textarea class="form-control" name="rolDescription" id="rolDescription" required></textarea>
                       </div>

                     </div>
                     <div class="row mt-5">
                       <div class="col-md-12 text-end">
                         <button type="submit" class="btn btn-success submit" id="saveNewrol"><?= lang('save') ?></button>

                         <button type="button" class="btn btn-danger" id="cancelNewrol" data-bs-dismiss="modal"><?= lang('cancel') ?></button>
                       </div>
                     </div>
                   </form>

                 </div>
               </div>
             </div>
             <div class="modal-footer">
               <div class="row mt-5">
                 <div id="mensaje"></div>
               </div>
             </div>
           </div>
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
     var urlbase = "<?= base_url() ?>";



     $(function() {

       // Initialize form validation on the registration form.

       // It has the name attribute "registration"

       $("form[name='frmNewrol']").validate({

         // Specify validation rules

         rules: {

           // The key name on the left side is the name attribute

           // of an input field. Validation rules are defined

           // on the right side

           rolId: {
             required: true,
             minlength: 1,
             maxlength: 10
           },

           rolName: "required",

           rolDescription: {
             required: true,
             maxlength: 250

           },

         },

         // Specify validation error messages

         messages: {

           rolId: {

             required: "Por favor, introduzca un Código",
             minlength: "Su Código debe tener al menos 1 carácter",
             maxlength: "Su Código debe ser menos de 10 caracteres"
           },

           rolName: "Por favor, introduzca un Nombre para el Rol",

           rolDescription: {

             required: "Por favor, proporcione una descripción",

             maxlength: "Su descripción debe ser menos 250 caracteres."

           },

         },

         submitHandler: function(form) {

           //creo variable con la url del ajax
           var urlajax = urlbase + "Admin/insertRol";
           // Run $.ajax() here
           // Using the core $.ajax() method
           $.ajax({

             // The URL for the request
             url: urlajax,

             // The data to send (will be converted to a query string)
             data: $('#frmNewrol').serializeArray(),

             // Whether this is a POST or GET request
             method: "POST",

             dataType: "json",


             beforeSend: function(objeto) {
               var cargando = '<div class="alert alert-info" role="alert"><strong><?= lang("process") ?></strong><div class="spinner-border ms-auto text-primary text-end ml-5" role="status" aria-hidden="true"></div></div>';
               $("#mensaje").html(cargando);
             },
             success: function(r) {
               $("#mensaje").html('<div class="alert alert-success" role="alert"><strong><?= lang("new") ?></strong></div>');
               setTimeout("location.reload(true);", 4000);
               location.href = urlbase + 'Admin/listRols';
             },
             error: function(r) {
               $("#mensaje").html('<div class="alert alert-danger" role="alert"><strong><?= lang("errorSave") ?></strong></div>');
               setTimeout("location.reload(true);", 3000);
             }
           })

         }

       });

     });


     $('#cancelNewrol').click(function() {
       alertify.message('<?= lang('cancel-operation') ?>');
     });


     /**
      * funtion en jquery para borrar registros
      * Descripción: esta función usa un mensaje de confirmación con la librería alertifyjs
      * si se confirma (ok) procede a eliminar el registro seleccionado por el id para borrar
      * si se cancela (cancel) solo informa que la operación fue cancelada mediante un mensaje
      * @author: Cesar Carrasco
      * @date: 04/11/2022
      *
      */
     $('.delete').click(function(e) {
       //se evita el evento default del botón
       e.preventDefault();

       //se asigna el valor del atributo data-id del botón eliminar a la variable id
       var id = $(this).attr('data-id');

       // se establecen las opciones de la ventana de confirmación con alertifyjs
       alertify.defaults.transition = "fade";
       alertify.defaults.theme.ok = "btn btn-primary";
       alertify.defaults.theme.cancel = "btn btn-secondary";
       alertify.defaults.theme.input = "form-control"; //esto si existe algún input en el mensaje de confirmación, en este caso no existe
       alertify.defaults.glossary.title = "<?= lang('confirm') ?>";
       alertify.defaults.glossary.ok = '<?= lang('yes') ?>';
       alertify.defaults.glossary.cancel = '<?= lang('no') ?>';
       //aquí se genera el dialogo de confirmación con alertifyjs
       alertify.confirm('<?= lang('confirm-message') ?>',
         function() {
           //creo variable con la url del ajax
           var urlajax = urlbase + "Admin/borrarRol";
           // Run $.ajax() here
           // Using the core $.ajax() method
           $.ajax({

             // The URL for the request
             url: urlajax,

             // The data to send (will be converted to a query string)
             data: {
               rolId: id
             },

             // Whether this is a POST or GET request
             method: "POST",

             dataType: "json",

             success: function(r) {
               alertify.success('<?= lang('delete') ?>');
               setTimeout("location.reload(true);", 4000);
             },
             error: function(r) {
               alertify.error('<?= lang('error-del') ?>');
               setTimeout("location.reload(true);", 3000);
             }
           })

         },
         function() {
           alertify.message('<?= lang('cancel-operation') ?>');
         }).setting('modal', true);
     });

   });
 </script>