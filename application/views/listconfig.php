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
     <h1 class="h3 mb-2 text-gray-800"><?= lang('title-config') ?></h1>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary"><?= lang('list-config') ?></h6>
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
                                 <th style="max-width: 200px;"><?= lang('configDescription') ?></th>
                                 <th><?= lang('configValue') ?></th>
                                 <th style="max-width: 60px;"><?= lang('action') ?></th>
                             </tr>
                         </thead>

                         <tbody>
                             <?Php
                                foreach ($configs as $config) {
                                ?>
                                 <tr>
                                     <td><?= $config->configDescription ?></td>
                                     <td class="text-truncate" style="max-width: 300px;"><?= $config->configValue ?></td>
                                     <td class="text-center">
                                         <a href="<?= base_url() ?>Admin/actualizarConfig/<?= $config->configId ?>" class="btn btn-warning text-ligth"> <i class="fa fa-edit"></i></a>
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
                             <h1 class="modal-title fs-5 font-weight-bold text-primary" id="exampleModalLabel"><?= lang('new-config') ?></h1>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                             <div class="container-fluid">
                                 <div class="row">

                                     <form action="#" method="post" id="frmNewconfig" name="frmNewconfig" class="g-3 needs-validation" novalidate>
                                         <div class="row">

                                             <div class="col-md-6">
                                                 <label for="configId" class="form-label"><?= lang('configId') ?></label>
                                                 <input type="text" class="form-control" id="configId" name="configId" minlength="1" maxlength="10" required>
                                                 <div class="invalid-feedback">
                                                     Please choose a Config Id.
                                                 </div>
                                             </div>
                                             <div class="col-md-6">
                                                 <label for="configValue" class="form-label"><?= lang('configValue') ?></label>
                                                 <textarea class="form-control" name="configValue" id="configValue" required></textarea>
                                                 <div class="invalid-feedback">
                                                     Please choose a Config.
                                                 </div>
                                             </div>
                                             <div class="col-md-12 mt-4">
                                                 <label for="configDescription" class="form-label"><?= lang('configDescription') ?></label>
                                                 <input type="text" class="form-control" id="configDescription" name="configDescription" maxlength="100" required>
                                                 <div class="invalid-feedback">
                                                     Please choose a Description Config.
                                                 </div>
                                             </div>

                                         </div>
                                         <div class="row">
                                             <div class="col-md-6">
                                                 <button type="submit" class="btn btn-success submit" id="saveNewconfig"><?= lang('save') ?></button>

                                             </div>
                                             <div class="col-md-6">
                                                 <button type="button" class="btn btn-danger" id="cancelNewconfig" data-bs-dismiss="modal"><?= lang('cancel') ?></button>

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

 <script>
     $(document).ready(function() {



         var urlbase = "<?= base_url() ?>";


         $(function() {

             // Initialize form validation on the registration form.

             // It has the name attribute "registration"

             $("form[name='frmNewconfig']").validate({

                 // Specify validation rules

                 rules: {

                     // The key name on the left side is the name attribute

                     // of an input field. Validation rules are defined

                     // on the right side

                     configId: {
                         required: true,
                         minlength: 1,
                         maxlength: 10
                     },

                     configValue: "required",

                     configDescription: {
                         required: true,
                         maxlength: 100

                     },

                 },

                 // Specify validation error messages

                 messages: {

                     configId: {

                         required: "Por favor, introduzca un Código",
                         minlength: "Su Código debe tener al menos 1 carácter",
                         maxlength: "Su Código debe ser menos de 10 caracteres"
                     },

                     configValue: "Por favor, introduzca un Valor para la Configuración",

                     configDescription: {

                         required: "Por favor proporcione una descripción",

                         maxlength: "Su descripción debe ser menos 100 caracteres."

                     },

                 },

                 submitHandler: function(form) {

                     //creo variable con la url del ajax
                     var urlajax = urlbase + "Admin/insertConfig";
                     // Run $.ajax() here
                     // Using the core $.ajax() method
                     $.ajax({

                         // The URL for the request
                         url: urlajax,

                         // The data to send (will be converted to a query string)
                         data: $('#frmNewconfig').serializeArray(),

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
                             location.href = urlbase + 'Admin/listconfig';

                         },
                         error: function(r) {

                             $("#mensaje").html('<div class="alert alert-danger" role="alert"><strong><?= lang("errorSave") ?></strong></div>');
                             setTimeout("location.reload(true);", 3000);
                         }
                     })

                 }

             });

         });

         $('#cancelNewconfig').click(function() {
             alertify.message('<?= lang('cancel-operation') ?>');
         });


     });
 </script>

 </div>
 <!-- End of Main Content -->