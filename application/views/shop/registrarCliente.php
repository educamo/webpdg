<?Php
$title = 'Registrar Nuevo Cliente';
?>
<!DOCTYPE html>
<html lang="<?= lang('lang') ?>" />

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title> <?= $title ?> </title>
    <meta name="title" content="<?= $title ?>" />


    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon.png" />
    <link rel="apple-touch-icon" href="apple-touch-icon.png" />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link href="<?= base_url('assets/plantillas/shop') ?>/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= base_url('assets/plantillas/shop') ?>/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/fontAwesome.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet" />


    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plantillas/shop/css/style.css" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="container-sm">
                <div class="row tituloRc">
                    <h1 class="text-center"><?= $title ?></h1>
                </div>
                <form action="#" method="post" class="frm-registroCliente needs-validation" id="frm-registroCliente" novalidate>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nombre" class="form-label">Nombres y Apellidos</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                            <div class="invalid-feedback">
                                Por favor introduzca su nombre completo
                            </div>
                        </div>
                        <div class="col-mdd-12">
                            <label for="dni" class="form-label">Cedula</label>
                            <input type="text" name="dni" id="dni" class="form-control" required>
                            <div class="invalid-feedback">
                                Introduzca su Cédula de Identidad
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                            <div class="invalid-feedback">
                                Agregue un email valido
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password" class="form-label">Contraseña</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" aria-label="password" aria-describedby="togglePassword" required>
                                    <div class="input-group-append">
                                        <i id="togglePassword" class="fa fa-eye input-group-text"></i>
                                    </div>
                                </div>
                                <div class="invalid-feedback" id="feedback-password">
                                    La Contraseña es requerida.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="confirmPasswd" class="form-label">Confirmar contraseña</label>
                            <input type="text" name="confirmPasswd" id="confirmPasswd" class="form-control" required>
                            <div class="invalid-feedback" id="feedback-confirmPasswd">
                                La confirmación de la Contraseña es requerida.
                            </div>
                        </div>
                    </div>
                    <div class="row text-center botonera">
                        <div class="col-md-6">
                            <input type="submit" value="Registrar" class="btn btn-success">
                        </div>
                        <div class="col-md-6">
                            <button id="cancelarRcliente" class="btn btn-danger">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script> -->
<script src="<?= base_url('assets/plantillas/shop/js') ?>/popper.min.js"></script>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->
<script src="<?= base_url('assets/plantillas/shop/js') ?>/bootstrap.min.js"></script>

<script>
    const url_base = "<?= base_url() ?>";
</script>

<script src="<?= base_url('assets/plantillas/shop/js/clientes.js') ?>"></script>

</html>