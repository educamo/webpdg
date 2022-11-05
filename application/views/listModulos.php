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
      <h1 class="h3 mb-2 text-gray-800"><?= lang('title-listModulos') ?></h1>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
           <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= lang('viewModule') ?></h6>
           </div>
           <div class="card-body">
                <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                               <tr>
                                    <th><?= lang('moduleName') ?></th>
                                    <th><?= lang('moduleDescription') ?></th>
                                    <th><?= lang('visible') ?></th>
                               </tr>
                          </thead>

                          <tbody>
                               <?Php
                                   foreach ($modulos as $modulo) {
                                        $moduleId = $modulo->moduleId;

                                        if ($modulo->activo === "1") {
                                             $activo = 'checked';
                                        } else {
                                             $activo = '';
                                        }
                                   ?>
                                    <tr>
                                         <td><?= $modulo->moduleName ?></td>
                                         <td><?= $modulo->moduleDescription ?></td>
                                         <td class="text-center">
                                              <input type="checkbox" id="activo<?= $moduleId ?>" name="activo<?= $moduleId ?>" <?= $activo ?>>
                                         </td>
                                         <input type="hidden" id="moduleId<?= $moduleId ?>" name="moduleId<?= $moduleId ?>" value="<?= $modulo->moduleId ?>">
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

           $('checkbox').click()

      });
 </script>