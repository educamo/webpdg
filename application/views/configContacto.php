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
             <form action="#" method="post" id="frmModifycontact">
                 <div class="row">
                     <div class="col-md-4 mb-2">
                         <input type="hidden" id="configId" name="configId" class="form-control" value="<?= $config->configId ?>">
                     </div>
                     <div class="col-md-4 mb-2">
                         <label for="configValue" class="form-label"><?= lang('mailCotact') ?></label>
                         <input type="text" id="configValue" name="configValue" class="form-control" value="<?= $config->configValue ?>" required>
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
         var urlbase = "<?= base_url() ?>";

         $("#frmModifycontact").submit(function(event) {
             // Prevent the form from submitting
             event.preventDefault();

             //creo variable con la url del ajax
             var urlajax = urlbase + "Admin/guardarContacto";
             // Run $.ajax() here
             // Using the core $.ajax() method
             $.ajax({

                 // The URL for the request
                 url: urlajax,

                 // The data to send (will be converted to a query string)
                 data: $("#frmModifycontact").serializeArray(),

                 // Whether this is a POST or GET request
                 type: "POST",


                 beforeSend: function(objeto) {
                     $("#mensaje").html(" ");
                     $(".btn-success").attr('disabled', 'disabled');
                     var cargando = '<div class="alert alert-info" role="alert"><strong><?= lang("process") ?></strong><div class="spinner-border ms-auto text-primary text-end ml-5" role="status" aria-hidden="true"></div></div>';
                     $("#mensaje").html(cargando);
                 },
                 success: function(r) {
                     $("#mensaje").html('<div class="alert alert-success" role="alert"><strong><?= lang("new") ?></strong></div>');
                     setTimeout("location.reload(true);", 3000);
                 },
                 error: function(r) {
                     $("#mensaje").html('<div class="alert alert-danger" role="alert"><strong><?= lang("errorSave") ?></strong></div>');
                     setTimeout("location.reload(true);", 3000);
                 }
             })
         });

     });
 </script>