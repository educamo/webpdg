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
                                             $activo = '';
                                        }
                                   ?>
                                    <tr>
                                         <td><?= $red->socialName ?></td>
                                         <td><input type="text" id="socialId<?= $socialId ?>" name="socialUrl<?= $socialId ?>" value="<?= $red->socialUrl ?>"></td>
                                         <td class="text-center">
                                              <input type="checkbox" id="activo<?= $socialId ?>" name="activo<?= $socialId ?>" <?= $activo ?>>
                                         </td>
                                         <input type="hidden" id="socialId<?= $socialId ?>" name="socialId<?= $socialId ?>" value="<?= $red->socialId ?>">
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
 <!-- // FIXME: falta hacer que guarde los cambios  -->
 <script>
      $(document).ready(function() {
           // para agregar varias opciones con el mismo id de datatable
           table.destroy();

           var table = $('#dataTable').DataTable({
                columnDefs: [{
                     orderable: false,
                     targets: [1, 2],
                }, ],
           });


           $('.btn-primary').click(function() {
                var data = table.$('input').serialize();
                alert('The following data would have been submitted to the server: \n\n' + data.substr(0, 120) + '...');
                return false;
           });


      });
 </script>