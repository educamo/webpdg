 <!-- Begin Page Content -->
 <div class="container-fluid">

  <?Php
        if ($this->session->flashdata('status')) :
    ?>

    <div class="alert alert-success">
        <?=$this->session->flashdata('status');?>


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
  <div class="card-body">
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
                    }else {
                      $activo = 'No';
                    }
            ?> 
          <tr>
            <td><?=$rol->rolId?></td>
            <td><?=$rol->rolName?></td>
            <td><?= $activo ?></td>
            <td class="text-center">
                <a href="<?= base_url() ?>Admin/actualizarRol/<?=$rol->rolId?>" class="btn btn-warning text-ligth"> <i class="fa fa-edit"></i></a>
                <a href="<?= base_url() ?>Admin/borrarRol/<?=$rol->rolId?>" class="btn btn-danger text-ligth"> <i class="fa fa-trash"></i></a>
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