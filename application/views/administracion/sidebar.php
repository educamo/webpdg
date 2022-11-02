<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion text-capitalize" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Admin') ?>">
        <div class="sidebar-brand-text mx-3">PDG-Web</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Admin') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span><?= lang('dashboard') ?></span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - contenidos Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContents" aria-expanded="true" aria-controls="collapseContents">
          <i class="fas fa-fw fa-address-card"></i>
          <span><?= lang('contents') ?></span>
        </a>
        <div id="collapseContents" class="collapse" aria-labelledby="headingContents" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?= lang('modules') ?></h6>
            <a class="collapse-item" href="<?= base_url('Admin/slider') ?>"><?= lang('slider') ?></a>
            <a class="collapse-item" href="<?= base_url('Admin/proyectos') ?>"><?= lang('projects') ?></a>
            <a class="collapse-item" href="<?= base_url('Admin/categorias') ?>"><?= lang('category') ?></a>
            <a class="collapse-item" href="<?= base_url('Admin/servicios') ?>"><?= lang('services') ?></a>
          </div>
        </div>
      </li>      

      <?Php
 // de aqui en adelante se muetran los menu si tienes permisos de administrador 
      $admin = $this->session->rolId;
      if ($admin == 1) {
      ?>
       <!-- Nav Item - Datos de la Empresa Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSocial" aria-expanded="true" aria-controls="collapseSocial">
          <i class="fas fa-fw fa-building"></i>
          <span><?= lang('company') ?></span>
        </a>
        <div id="collapseSocial" class="collapse" aria-labelledby="headingSocial" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?= lang('about') ?></h6>
            <a class="collapse-item" href="<?= base_url('Admin/nosotros') ?>"><?= lang('modify') ?></a>
            <a class="collapse-item" href="<?= base_url('Admin/configContacto') ?>"><?= lang('configContact') ?></a>
            <h6 class="collapse-header"><?= lang('social') ?></h6>
            <a class="collapse-item" href="<?= base_url('Admin/listSocial') ?>"><?= lang('configSocial') ?></a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Administracion Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-lock"></i>
            <span><?= lang('admin') ?></span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header"><?= lang('admin-user') ?></h6>
              <a class="collapse-item" href="<?= base_url('Admin/listRols') ?>"><?= lang('reg-rols') ?></a>
              <a class="collapse-item" href="<?= base_url('Admin/listUsuarios') ?>"><?= lang('reg-user') ?></a>
              <a class="collapse-item" href="<?= base_url('Admin/nuevoUsuario') ?>"><?= lang('new-user') ?></a>
              <h6 class="collapse-header"><?= lang('config') ?></h6>
              <a class="collapse-item" href="<?= base_url('Admin/listconfig') ?>"><?= lang('admin-config') ?></a>
            </div>
          </div>
        </li>

<!-- Nav Item - Modulos Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsemodulos" aria-expanded="true" aria-controls="collapsemodulos">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span><?= lang('modules') ?></span>
          </a>
          <div id="collapsemodulos" class="collapse" aria-labelledby="headingmodulos" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Administrar:</h6>
              <a class="collapse-item" href="<?= base_url('Admin/listModulos') ?>"><?= lang('listModules') ?></a>
              <a class="collapse-item" href="<?= base_url('Admin/modificarModulo') ?>"><?= lang('modifyModules') ?></a>
            </div>
          </div>
        </li>

      <?Php
      }
      ?>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->