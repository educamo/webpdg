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
                <div class="table-responsive">
                     <table class="table table-bordered" id="tableRedes" width="100%" cellspacing="0">
                          <thead>
                               <tr>
                                    <th><?= lang('socialName') ?></th>
                                    <th><?= lang('socialurl') ?></th>
                                    <th><?= lang('visible') ?></th>
                                    <th><?= lang('modify') ?></th>
                               </tr>
                          </thead>

                          <tbody>
                               <?Php
                                   foreach ($redes as $red) {

                                        if ($red->activo == 1) {
                                             $activo = 'checked';
                                        } else {
                                             $activo = 0;
                                        }
                                   ?>
                                    <tr>
                                         <td><?= $red->socialName ?></td>
                                         <td><input type="text" id="socialUrl" name="socialUrl" value="<?= $red->socialUrl ?>"></td>
                                         <td class="text-center"><input type="checkbox" id="activo" name="activo" checked="<?= $activo ?>"></td>
                                         <td class="text-center">
                                              <a href="<?= base_url() ?>Administracion/actualizarUsuario/<?= $red->socialId ?>" class="btn btn-warning text-ligth"> <i class="fa fa-edit"></i></a>
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
           $('#tableRedes').DataTable();

           $('button').click(function() {
                var data = table.$('input').serialize();
                alert('The following data would have been submitted to the server: \n\n' + data.substr(0, 120) + '...');
                return false;
           });
      });
 </script>