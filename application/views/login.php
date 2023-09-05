<!DOCTYPE html>
<html lang="<?= lang('lang') ?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= lang('title') ?></title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/fontAwesome.css') ?>">
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/signin.css') ?>" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto p-4">
        <form method="POST" action="<?= base_url('Admin/inciarSesion') ?>" name="frmsignin" id="frmsignin">
            <div class="mb-4 text-lg-center text-bg-info"><i class="fa fa-user icon"></i></div>
            <h1 class="h3 mb-3 fw-normal text-light"><?= lang('title') ?></h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="user" name="user" placeholder="<?= lang('mail') ?>" required>
                <label for="user"><?= lang('user') ?></label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="<?= lang('password') ?>" required>
                <label for="password"><?= lang('password') ?></label>
            </div>

            <div class="mb-3">
                <a href="#" class="olvido"><?= lang('olvido') ?></a> <?php  // TODO: falta hacer el modulo de recuperación de contraseña ?>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" id="submit" name="submit"><?= lang('title-boton') ?></button>
            <p class="mt-5 mb-3 text-muted">&copy; <span id="year"></span></p>
        </form>
        <?Php
        if ($this->session->flashdata('status')) {
        ?>

            <div class="alert alert-info" id="mensaje">
                <?= $this->session->flashdata('status'); ?>
            </div>

        <?Php

            header('Refresh: 2');
        };
        ?>
    </main>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


    <script>
        jQuery(document).ready(function($) {

            var year = (new Date).getFullYear();
            $('#year').html(year);

        });
    </script>
</body>

</html>