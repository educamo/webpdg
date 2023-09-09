<?Php
$total = 0;

if (isset($empty)) {
    echo "<h2 class='text-center'>" . lang('carritoEmpty') . "</h2>";
    echo "<p class='text-center text-secondary '>" . lang('addProductos') . "</p>";
} else {
?>
    <div class="shopping-cart row">
        <ul class="items container">

            <?Php
            foreach ($productosCarrito as $item) {
                $total = $total + $item->precio_total;
            ?>
                <li class="item row" id="b<?= $item->id ?>">
                    <div class="col-md-6 text-center">
                        <img src="<?= base_url('assets/img/' . $item->serviceImagen)  ?>" alt="Producto <?= $item->serviceTitle ?>">
                        <h2><?= $item->serviceTitle ?></h2>
                        <input type="number" class="cantidadCarrito" data-id="<?= $item->id ?>" data-codigo="c<?= $item->serviceId ?>" value="<?= $item->cantidad ?>">
                    </div>
                    <div class="col-md-1 text-end">
                        <button type="button" name="button" class="btn btn-default del-item-carrito" data-id="<?= $item->id ?>"><i class="fa fa-trash"></i></button>
                    </div>
                    <div class="col-md-4 text-end">
                        <p id="<?= $item->id ?>" data-price="<?= $item->servicePrice ?>">$ <?= $item->precio_total ?></p>
                        <input id="c<?= $item->serviceId ?>" type="hidden" name="precio" class="elementos" value="<?= $item->precio_total ?>">
                    </div>
                    <div class="row">
                        <hr class="separador-carrito" />
                    </div>
                </li>
            <?php
                $carrito = $item->carrito_id;
            }
            ?>

        </ul>
    </div>

    <div class="row">
        <hr class="separador-carrito" />
    </div>


    <div class="total row">
        <div class="col-md-12">
            <h3 id="total">Total: $<?= $total ?></h3>
        </div>
        <div class="col-md-6">
            <a href="<?= base_url('carrito/comprar/' . $carrito) ?>">Continuar con la compra</a>
        </div>
        <div class="col-md-6">
            <a href="#" class="seguir" data-bs-dismiss="offcanvas">Seguir comprando</a>
            <div>
            </div>
        </div>

    </div>
<?Php
}
?>

<script>
    const url_base = "<?= base_url() ?>";
</script>

<script src="<?= base_url('assets/plantillas/shop/js/carrito.js') ?>"></script>