<?Php

?>
<div class="col-md-9 mt-0">
    <main class="container pt-4 bg-light justify-content-center min-vh-100">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('cliente/perfil/') . $idCliente ?>"><?= lang('Cliente') ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('facturas') ?></li>
                </ol>
            </nav>
        </div>

        <div class="row mt-5">
            <div class="container">
                <div class="row">
                    <div class="container-md bg-oscuro contenido">
                        <div class="row">
                            <h1>Facturas del Cliente</h1>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </main>
</div>