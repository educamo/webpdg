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
                                                <?Php
                                                if ($factura['estado'] <> 3) {
                                                ?>
                                                    <a href="#" class="btn btn-success mx-2 pagar" data-bs-toggle="modal" data-bs-target="#pagoFactura" data-id="<?= $factura['id'] ?>" data-total="<?= $factura['total'] ?>"><i class="fa fa-money"></a></i>
                                                <?Php

                                                }
                                                ?>
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


<!-- Modal -->
<div class="modal fade" id="pagoFactura" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pagoFacturaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="pagoFacturaLabel"><?= lang('Modaltitle-Pago') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="#" method="POST" id="frm-registrarPago">

                        <div class="form-group">
                            <label for="id_factura" hidden>ID de factura</label>
                            <input type="hidden" class="form-control" name="id_factura" id="id_factura">
                            <input type="hidden" class="form-control" name="totalFactura" id="totalFactura">
                        </div>

                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" name="fecha" id="fecha">
                        </div>

                        <div class="form-group">
                            <label for="monto">Monto</label>
                            <input type="number" class="form-control" step="0.01" name="monto" id="monto">
                        </div>

                        <div class="form-group">
                            <label for="tipo_pago">Tipo de pago</label>
                            <select class="form-select" name="tipo_pago" id="tipo_pago">
                                <option value="1">Efectivo</option>
                                <option value="2">Transferencia</option>
                                <option value="3">Pago móvil</option>
                            </select>
                        </div>

                        <div class="form-group" style="display: none;" id="referencia-group">
                            <label for="referencia">Referencia</label>
                            <input type="text" class="form-control" name="referencia" id="referencia">
                        </div>


                        <div class="botonera">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= lang('btn-CacelarPago') ?></button>
                            <input type="submit" class="btn btn-primary" value="<?= lang('btn-registrarPago') ?>">
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>