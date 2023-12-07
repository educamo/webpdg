<?Php
$ordenId = $datos[0]['idOrden'];
$totalOrden = $datos[0]['total'];
$fechaOrden = $datos[0]["fecha"];

?>

<!DOCTYPE html>
<html lang="<?= lang('lang') ?>">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title> <?= lang('title') ?> </title>
	<meta name="title" content="<?= lang('title') ?>">


	<link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon.png" />
	<link rel="apple-touch-icon" href="apple-touch-icon.png">



	<meta name="generator" content="VS Code 1.71.0" />



	<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/fontAwesome.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/light-box.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/owl-carousel.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/templatemo-style.css">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

	<!-- CSS only -->
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/dist/css/bootstrap.css') ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw=" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



	<!-- Alertify -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/alertifyjs/css/alertify.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/alertifyjs/css//themes/bootstrap.css">

	<!-- Bootstrap 5.2.1 --->
	<link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/dist/css/bootstrap.css">

	<link href="<?= base_url() ?>assets/lib/DataTables/datatables.min.css" rel="stylesheet">


	<link href="<?= base_url() ?>assets/css/estilos.css" rel="stylesheet">

	<!-- css custom -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/estilos.css">

</head>

<body class="container">
	<div class="row mt-4 mb-5">
		<div class="col-md-12 text-center">
			<h1><?= lang('title-orden') ?></h1>
		</div>
		<div class="col-md-12 text-end">
			<h2 class=" mr-5">No. <?= $ordenId ?></h2>
		</div>
	</div>
	<div class="row text-star">
		<div class="col-md-6">
			<h3>Fecha Orden: <?= $fechaOrden ?></h3>
		</div>
		<div class="col-md-6 text-end">
			<a href="#" class="btn btn-outline-info py-2 px-5 fs-2" onclick="window.print()"><i class="fa fa-print"></i></a>
		</div>
	</div>
	<div class="row mt-5 mb-auto">
		<div class="col-md-12 text-center">
			<table id="example" class="display" style="width:80%">
				<thead>
					<tr>
						<th>Servicio</th>
						<th>Cantidad</th>
						<th>Precio</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<?Php
					foreach ($datos as $fila) {
					?>
						<tr>
							<td><?= $fila['serviceTitle'] ?></td>
							<td><?= $fila['cantidad'] ?></td>
							<td><?= $fila['precioUnitario'] ?></td>
							<td><?= $fila['precioTotal'] ?></td>
						</tr>
					<?Php
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th>Total: <?= $totalOrden ?></th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
	<div class="row">
		<footer class="footer mt-4 py-3 bg-white text-dark" style="line-height: 24px; font-size: 14px;">
			<div class="col-md-12 text-center">
				<hr>
			</div>
			<div class="col-md-12 text-center">
				<div>
					<?= lang('msg-footer') ?>
				</div>
			</div>
		</footer>
	</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/js/vendor/jquery-1.11.2.min.js"></script>'

<script src="<?= base_url() ?>assets/js/vendor/bootstrap.min.js"></script>

<script src="<?= base_url() ?>assets/js/plugins.js"></script>
<script src="<?= base_url() ?>assets/js/main.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

<script src="<?= base_url('assets/bootstrap/dist/js/bootstrap.bundle.js') ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/jquery/1.19.1/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/bootstrap/dist/js/bootstrap.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url() ?>assets/js/demo/chart-pie-demo.js"></script>

<script src="<?= base_url() ?>assets/lib/DataTables/datatables.min.js"></script>

</html>

<script>
	var url_lang = '';
	var lang = "<?= lang('lang') ?>"
	if (lang === 'es') {
		console.log(lang);
		url_lang = '<?= base_url() ?>assets/lib/DataTables/lang/es-ES.json'
	} else if (lang === 'en') {
		url_lang = '<?= base_url() ?>assets/lib/DataTables/lang/en-GB.json'
	}

	var table = new DataTable('#example', {
		language: {
			url: url_lang,
		},
	});
</script>