<body><?Php
$altLogo        = $logo->configName;
$logo           = $logo->configValue;
$idCliente      = "/" . $idCliente;

?>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="bg-light col-auto col-md-3 min-vh-100">
                <div class="bg-light p-2">
                    <a href="<?= base_url() ?>" class="d-flex text-decoration-none mt-1 align-items-center text-dark">
                        <span class="fs-4 d-none d-sm-inline"><img src="<?= base_url('assets/img/') . $logo ?>" class="img-thumbnail" alt="..."></span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mt-4">
                        <li class="nav-item">
                            <a class="nav-link text-dark" aria-current="page" href="<?= base_url() ?>">
                                <i class="fs-6 fa fa-house"></i><span class="fs-5 ms-3 d-none d-sm-inline"><?= lang('Home') ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" aria-current="page" href="<?= base_url('cliente/perfil').$idCliente ?>">
                                <i class="fs-6 fa fa-users"></i><span class="fs-5 ms-3 d-none d-sm-inline"><?= lang('Cliente') ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" aria-current="page" href="<?= base_url('cliente/facturas').$idCliente ?>">
                                <i class="fs-6 fa fa-table-list"></i><span class="fs-5 ms-3 d-none d-sm-inline"><?= lang('Factura') ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>