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
                            <h1><?= lang('titleTableFacturas') ?></h1>
                        </div>
                        <div class="row p-2">

                            <table id="facturas" class="table table-striped table-bordered table-dark" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?Php
                                    foreach ($facturas as $factura) {

                                    ?>
                                        <tr>
                                            <td><?= $factura['id'] ?></td>
                                            <td><?= $factura['fecha'] ?></td>
                                            <td>$<?= $factura['total'] ?></td>
                                            <td>
                                                <a href="#" class="btn btn-success"><i class="fa fa-money"></a></i>
                                                <a href="<?= base_url('cliente/factura/') . $factura['id'] ?>" target="_blank" class="btn btn-warning"><i class="fa fa-search"></a></i>
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
        </div>

    </main>
</div>