<?Php

$company        = $company->configValue;
$creador        = $author->configValue;

?>
</div>
    </div>

    <footer class="footer bg-body-tertiary position-relative-top">
        <div class="container">
            <ul class="social-icons">
                <?Php
                foreach ($social as $red) {
                ?>
                    <li><a href="<?= $red['socialUrl'] ?>" target="_blank"><i class="fa <?= $red['socialIcon'] ?>"></i></a></li>
                <?Php
                }
                ?>
            </ul>
            <p>Copyright &copy; <span id="fecha"> </span> <?= $company ?>. <?= lang('Design') ?> <?= $creador ?></p>
        </div>
    </footer>

</body>

<script>
    const url_base = "<?= base_url() ?>";
    var cliente = "<?= $idCliente ?>";
</script>


<script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script> -->
<script src="<?= base_url('assets/plantillas/shop/js') ?>/popper.min.js"></script>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->
<script src="<?= base_url('assets/plantillas/shop/js') ?>/bootstrap.min.js"></script>

<script src="<?= base_url('assets/alertifyjs/alertify.js') ?>"></script>

<script src="<?= base_url('assets/js/datatables.js') ?>"></script>

<script src="<?= base_url('assets/plantillas/shop/js/clientes.js') ?>"></script>

</html>