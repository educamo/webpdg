<?Php
$cliente = $nombre;
?>
<div class="col-md-9 mt-0">
    <main class="container pt-4 bg-light justify-content-center min-vh-100">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><?= lang('Cliente') ?></li>
                </ol>
            </nav>
        </div>

        <div class="row mt-5">
            <div class="container">
                <div class="row">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab1">Cuenta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab2">Cambiar Contraseña</a>
                        </li>
                    </ul>

                    <div class="tab-content bg-oscuro">
                        <div class="tab-pane active" id="tab1">
                            <div class="container-md">
                                <div class="row">
                                    <h1>Datos del Cliente</h1>
                                </div>
                                <div class="row">
                                    <form action="#" method="post" class="needs-validation" id="frm-updateCliente" novalidate>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="nombre" class="form-label">Nombres y Apellidos</label>
                                                <input type="text" name="nombre" id="nombre" class="form-control" disabled value="<?= $nombre ?>" required>
                                                <div class="invalid-feedback">
                                                    Por favor introduzca su nombre completo
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="dni" class="form-label">Cédula</label>
                                                <input type="text" name="dni" id="dni" class="form-control" required disabled value="<?= $idCliente ?>">
                                                <input type="hidden" name="idCliente" id="idCliente" class="form-control" required value="<?= $idCliente ?>">
                                                <div class="invalid-feedback">
                                                    Introduzca su Cédula de Identidad
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" name="email" id="email" class="form-control" disabled value="<?= $email ?>" required>
                                                <div class="invalid-feedback">
                                                    Agregue un email valido
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row text-center botonera mt-3 mb-3">
                                            <div class="col-md-6 text-end">
                                                <input type="submit" value="Guardar" class="btn btn-disabled" id="submitDatos" disabled>
                                            </div>
                                            <div class="col-md-6 text-start">
                                                <button id="cancelarUcliente" class="btn btn-disabled" disabled>Cancelar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="tab2">
                            <div class="container-md">
                                <div class="row">
                                    <h1>Cambio de Contraseña</h1>
                                </div>
                                <div class="row">
                                    <form action="#" method="post" class="needs-validation" id="frm-updatePassword" novalidate>
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="password" class="form-label">Nueva Contraseña</label>

                                                    <div class="input-group">
                                                        <input type="password" class="form-control" id="password" name="password" aria-label="password" aria-describedby="togglePassword" required>
                                                        <div class="input-group-append">
                                                            <i id="togglePassword" class="fa fa-eye input-group-text"></i>
                                                        </div>
                                                        <div class="invalid-feedback" id="feedback-password">
                                                            La Contraseña es requerida.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="confirmPasswd" class="form-label">Confirmar nueva contraseña</label>
                                                <input type="password" name="confirmPasswd" id="confirmPasswd" class="form-control" required>
                                                <div class="invalid-feedback" id="feedback-confirmPasswd">
                                                    La confirmación de la Contraseña es requerida.
                                                </div>
                                                <input type="hidden" name="idCliente" id="idCliente" class="form-control" required value="<?= $idCliente ?>">
                                            </div>
                                        </div>
                                        <div class="row text-center botonera mt-3 mb-3">
                                            <div class="col-md-6 text-end">
                                                <input type="submit" value="Guardar" class="btn btn-disabled" id="submitPassword" disabled>
                                            </div>
                                            <div class="col-md-6 text-start">
                                                <button id="cancelarUpasswrod" class="btn btn-disabled" disabled>Cancelar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
</div>