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
             <h6 class="m-0 font-weight-bold text-primary"><?= lang('modify-rols') ?></h6>
         </div>
         <div class="card-body">
             <form action="#" method="post" id="frmModificar">
                 <div class="row">
                     <div class="col-md-6">
                         <label for="rolId" class="form-label"><?= lang('rolId') ?></label>
                         <input type="text" class="form-control" name="id" id="id" value="<?= $rolId ?>" disabled>
                         <input type="hidden" class="form-control" name="rolId" id="rolId" value="<?= $rolId ?>">

                     </div>
                     <div class="col-md-6">
                         <label for="rolName" class="form-label"><?= lang('rolName') ?></label>
                         <input type="text" class="form-control" name="rolName" id="rolName" value="<?= $rolName ?>">
                     </div>
                     <div class="col-md-12 mt-4">
                         <label for="rolDescription" class="form-label"><?= lang('rolDescription') ?></label>
                         <textarea class="form-control" name="rolDescription" id="rolDescription"><?= $rolDescription ?></textarea>
                     </div>
                     <div class="col-md-12 mt-4">
                         <label for="activo" class="form-label">Activo</label>
                         <select name="activo" id="activo" class="form-select">
                             <option value="1" <?Php if ($activo == "1") {
                                                    echo "selected";
                                                } ?>>Si</option>
                             <option value="0" <?Php if ($activo == "0") {
                                                    echo "selected";
                                                } ?>>No</option>
                         </select>
                     </div>
                 </div>
                 <div class="row mt-4">
                     <div class="col-md-6 text-end">
                         <button type="submit" class="btn btn-success"><?= lang("save") ?></button>
                     </div>
                     <div class="col-md-6">
                         <button type="button" class="btn btn-danger"><?= lang("cancel") ?></button>
                     </div>

                 </div>
             </form>

             <div id="modificar"></div>

         </div>
     </div>

 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->

 <script>
     $(document).ready(function() {

         var urlbase = "<?= base_url() ?>";

         $(".btn-danger").click(function() {
             location.href = urlbase + 'Admin/listRols';
             alertify.message('<?= lang('cancel-operation') ?>')
         })


         $("#frmModificar").submit(function(event) {
             // Prevent the form from submitting
             event.preventDefault();


             //creo variable con la url del ajax
             var urlajax = urlbase + "Admin/updateRol";
             // Run $.ajax() here
             // Using the core $.ajax() method
             $.ajax({

                 // The URL for the request
                 url: urlajax,

                 // The data to send (will be converted to a query string)
                 data: $(this).serializeArray(),

                 // Whether this is a POST or GET request
                 method: "POST",

                 dataType: "json",


                 beforeSend: function(objeto) {
                     var cargando = '<div class="alert alert-info" role="alert"><strong><?= lang("process") ?></strong><div class="spinner-border ms-auto text-primary text-end ml-5" role="status" aria-hidden="true"></div></div>';
                     $("#modificar").html(cargando);
                 },
                 success: function(r) {
                     $("#modificar").html('<div class="alert alert-success" role="alert"><strong><?= lang("update") ?></strong></div>');
                     setTimeout("location.reload(true);", 4000);
                     location.href = urlbase + 'Admin/listRols';
                 },
                 error: function(r) {
                     $("#modificar").html('<div class="alert alert-danger" role="alert"><strong><?= lang("error") ?></strong></div>');
                     setTimeout("location.reload(true);", 3000);
                 }
             })

         });


     });
 </script>