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
      <h1 class="h3 mb-2 text-gray-800"><?= lang('title-listSocial') ?></h1>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
           <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= lang('configSocial') ?></h6>
           </div>
           <div class="card-body">
                <div class="row mb-2">
                     <div class="col">
                          <button class="btn btn-primary"><?= lang('saveModify') ?></button>
                     </div>
                </div>
                <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                               <tr>
                                    <th><?= lang('socialName') ?></th>
                                    <th><?= lang('socialurl') ?></th>
                                    <th><?= lang('visible') ?></th>
                               </tr>
                          </thead>

                          <tbody>
                               <?Php
                                   foreach ($redes as $red) {
                                        $socialId = $red->socialId;

                                        if ($red->activo === "1") {
                                             $activo = 'checked';
                                        } else {
                                             $activo = ' ';
                                        }
                                   ?>
                                    <tr>
                                         <td><?= $red->socialName ?></td>
                                         <td><input type="url" id="socialId" name="socialUrl" class="form-control" value="<?= $red->socialUrl ?>"></td>
                                         <input type="hidden" id="socialId" name="socialId" class="form-control" value="<?= $red->socialId ?>">
                                         <input type="hidden" id="activo" name="activo" class="form-control" data-codigo="<?= $red->socialId ?>" value="<?= $red->activo ?>">
                                         <td class="text-center">
                                              <input type="checkbox" name="active" value="<?= $red->activo ?>" data-codigo="<?= $red->socialId ?>" class="active" <?= $activo ?>>
                                         </td>
                                    </tr>
                               <?Php
                                   }
                                   ?>
                          </tbody>
                     </table>
                </div>
           </div>
      </div>

 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->

 <script>
      $(document).ready(function() {

           $('.active').click(function() {
                var valor = $(this).val();
                var codigo = $(this).attr('data-codigo');

                if (valor == 1) {
                     valor = 0;
                } else {
                     valor = 1;
                };

                $(this).val(valor);

                $('#activo[data-codigo="' + codigo + '"]').val(valor);
           });

           var urlbase = '<?= base_url() ?>'

           var table = $('#dataTable').DataTable({
                columnDefs: [{
                     orderable: false,
                     targets: [1, 2],
                }, ],
           });


           $('.btn-primary').click(function() {
                var data = table.$('input.form-control').serialize();

                //creo variable con la url del ajax
                var urlajax = urlbase + "Admin/actualizarRed";
                // Run $.ajax() here
                // Using the core $.ajax() method
                $.ajax({

                     // The URL for the request
                     url: urlajax,

                     // The data to send (will be converted to a query string)
                     data: {
                          data: data
                     },

                     // Whether this is a POST or GET request
                     method: "POST",

                     dataType: "json",

                     success: function(r) {
                          alertify.success('<?= lang("update") ?>');
                          setTimeout("location.reload(true);", 3000);

                     },
                     error: function(r) {
                          alertify.error('<?= lang("errorSave") ?>');
                          setTimeout("location.reload(true);", 3000);
                     }
                });

                return false;
           });

           // para agregar varias opciones con el mismo id de datatable
           table.destroy();


      });
 </script>