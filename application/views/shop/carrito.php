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
    $(document).ready(function() {
        const url_base = "<?= base_url() ?>";

        function obtenerTotal() {
            // Seleccionar todos los inputs
            var inputs = $('input[name="precio"]');

            // Inicializar la variable de suma
            var suma = 0;

            // Iterar sobre los inputs
            inputs.each(function(index, input) {
                // Obtener el valor del input
                var valor3 = $(input).val();

                // Agregar el valor al total
                suma += parseFloat(valor3);
            });
            return suma;
        };

        //  ######### función para actualizar el precio a la hora de comprar un producto o servicio
        //dependiendo de la cantidad que se seleccione en el carrito ###########################
        // Seleccionar el input tipo numérico
        var cantidadCarrito = $(".cantidadCarrito");
        // Establecer el patrón para el input tipo numérico
        cantidadCarrito.attr("pattern", "^[0-9]\\d*$");

        // Agregar un evento `change` al input tipo numérico
        cantidadCarrito.on("change", function() {
            var id = $(this).data("id");
            var servicio = $(this).data("codigo");
            // Seleccionar la etiqueta h4
            var valor = $("#" + id);
            var valorServicio = $("#" + servicio);
            // Obtener el valor del input tipo numérico
            var cantidad_actual = $(this).val();


            // obtener el precio de la propiedad price
            var price = valor.data("price");
            // calcular total
            var total = price * cantidad_actual;
            // Establecer el valor de la etiqueta h4
            valor.html("$" + total.toFixed(2));
            valorServicio.val(total);

            suma = obtenerTotal();

            // Realizar una petición AJAX
            $.ajax({
                type: "POST",
                url: url_base + "carrito/updateProducto/",
                data: {
                    id,
                    cantidad_actual,
                    total,
                },

                // La función que se ejecuta cuando la petición se completa
                success: function(data) {
                    // Mostrar el total
                    $("#total").html("Total: $" + suma);
                },

                // La función que se ejecuta cuando la petición falla
                error: function() {
                    alert("La petición AJAX falló");
                }
            });

        });

        // ################################### eliminar producto del carrito ####################
        // Seleccionar todos los botones trash
        var button = $('.del-item-carrito');
        button.on("click", function() {
            var id = $(this).data("id");

            $.ajax({
                type: "POST",
                url: url_base + "carrito/deleteProducto/",
                data: {
                    id,
                },
                // La función que se ejecuta cuando la petición se completa
                success: function(data) {
                    // Eliminar el elemento del DOM
                    var del = $("#b" + id);
                    del.remove();

                    suma = obtenerTotal();
                    // Mostrar el total
                    $("#total").html("Total: $" + suma);
                },

                // La función que se ejecuta cuando la petición falla
                error: function() {
                    alert("La petición AJAX falló");
                }
            });

        });

    });
</script>