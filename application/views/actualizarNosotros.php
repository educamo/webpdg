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
     <h1 class="h3 mb-2 text-gray-800"><?= lang('title-nosotros') ?></h1>


     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary"><?= lang('mod-nosotros') ?></h6>
         </div>
         <div class="card-body">
             <form action="#" method="post" id="frmModnosotros">
                 <div class="row">
                     <div class="col-md-4 mb-2">
                         <label for="aboutId" class="form-label"><?= lang('aboutId') ?></label>
                         <input type="text" id="aboutId" name="aboutId" class="form-control" maxlength="10" value="<?= $aboutId ?>" required autofocus>
                         <input type="hidden" id="Id" name="Id" class="form-control" maxlength="10" value="<?= $aboutId ?>" required autofocus>
                     </div>
                     <div class="col-md-4 mb-2">
                         <label for="aboutTitle" class="form-label"><?= lang('aboutTitle') ?></label>
                         <input type="text" id="aboutTitle" name="aboutTitle" class="form-control" maxlength="100" value="<?= $aboutTitle ?>" required>
                     </div>
                     <div class="col-md-4 mb-2">
                         <label for="aboutDescription" class="form-label"><?= lang('aboutDescription') ?></label>
                         <textarea type="text" id="aboutDescription" name="aboutDescription" class="form-control" maxlength="250" required><?= $aboutDescription ?></textarea>
                     </div>
                     <div class="col-md-4 mt-2">
                         <label for="aboutModal" class="form-label"><?= lang('aboutModal') ?></label>
                         <select name="aboutModal" id="aboutModal" class="form-select">
                             <option value="1" <?Php if ($aboutModal == "1") {
                                                    echo "selected";
                                                } ?>><?= lang('yes') ?></option>
                             <option value="0" <?Php if ($aboutModal == "0") {
                                                    echo "selected";
                                                } ?>><?= lang('no') ?></option>
                         </select>
                     </div>
                     <div class="col-md-4 mt-2">
                         <label for="activo" class="form-label"><?= lang('activo') ?></label>
                         <select name="activo" id="activo" class="form-select">
                             <option value="1" <?Php if ($activo == "1") {
                                                    echo "selected";
                                                } ?>><?= lang('yes') ?></option>
                             <option value="0" <?Php if ($activo == "0") {
                                                    echo "selected";
                                                } ?>><?= lang('no') ?></option>
                         </select>
                     </div>
                 </div>
                 <div class="row mt-4">
                     <div class="col-md-6 text-end">
                         <button type="submit" class="btn btn-success"><?= lang("save") ?></button>
                     </div>
                     <div class="col-md-6">
                         <button type="reset" class="btn btn-danger"><?= lang("cancel") ?></button>
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

         $('.btn-danger').click(function() {
             alertify.warning('<?= lang("cancel-operation") ?>')
             $("#mensaje").html(' ');
             setTimeout("location.reload(true);", 3000);
             location.href = urlbase + 'Admin/nosotros';
         });

         $("#frmModnosotros").submit(function(event) {
             // Prevent the form from submitting
             event.preventDefault();


             //creo variable con la url del ajax
             var urlajax = urlbase + "Admin/updateAbout";
             // Run $.ajax() here
             // Using the core $.ajax() method
             $.ajax({

                 // The URL for the request
                 url: urlajax,

                 // The data to send (will be converted to a query string)
                 data: $("#frmModnosotros").serializeArray(),

                 // Whether this is a POST or GET request
                 type: "POST",


                 beforeSend: function(objeto) {
                     $("#mensaje").html(" ");
                     $(".btn-success").attr('disabled', 'disabled');
                     var cargando = '<div class="alert alert-info" role="alert"><strong><?= lang("load") ?></strong><div class="spinner-border ms-auto text-primary text-end ml-5" role="status" aria-hidden="true"></div></div>';
                     $("#mensaje").html(cargando);
                 },
                 success: function(r) {
                     $("#mensaje").html('<div class="alert alert-success" role="alert"><strong><?= lang("new") ?></strong></div>');
                     setTimeout("location.reload(true);", 3000);
                     location.href = urlbase + 'Admin/nosotros';
                 },
                 error: function(r) {
                     $("#mensaje").html('<div class="alert alert-danger" role="alert"><strong><?= lang("errorSave") ?></strong></div>');
                     setTimeout("location.reload(true);", 3000);
                 }
             })

         });

     });
 </script>