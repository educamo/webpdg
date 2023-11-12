$(document).ready(function () {

	function obtenerTotal() {
		// Seleccionar todos los inputs
		var inputs = $('input[name="precio"]');

		// Inicializar la variable de suma
		var suma = 0;

		// Iterar sobre los inputs
		inputs.each(function (index, input) {
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
	cantidadCarrito.on("change", function () {
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
			success: function (data) {
				// Mostrar el total
				$("#total").html("Total: $" + suma);
			},

			// La función que se ejecuta cuando la petición falla
			error: function () {
				alert("La petición AJAX falló");
			}
		});

	});

	// ################################### eliminar producto del carrito ####################
	// Seleccionar todos los botones trash
	var button = $('.del-item-carrito');
	button.on("click", function () {
		var id = $(this).data("id");

		$.ajax({
			type: "POST",
			url: url_base + "carrito/deleteProducto/",
			data: {
				id,
			},
			// La función que se ejecuta cuando la petición se completa
			success: function (data) {
				// Eliminar el elemento del DOM
				var del = $("#b" + id);
				del.remove();

				suma = obtenerTotal();
				// Mostrar el total
				const total = $("#total");
				total.html("Total: " + suma);
				if (suma === 0) {
					$.ajax({
						type: "POST",

						url: url_base + "carrito/viewContenido/",
						data: {
							cliente
						},

						// La función que se ejecuta cuando la petición se completa
						success: function (data) {


							// Agregar los elementos del carrito al DOM
							$("#contenido-carrito").html(data);


						},

						// La función que se ejecuta cuando la petición falla
						error: function () {
							alert("La petición AJAX falló");
						}
					});

				}
			},

			// La función que se ejecuta cuando la petición falla
			error: function () {
				alert("La petición AJAX falló");
			}
		});

	});

});