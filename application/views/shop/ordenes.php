<?Php
$admin = $this->session->rolId;
$plantilla = $this->session->plantilla;
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= lang('title-ordenes') ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><?= lang('list-ordenes') ?></h6>
	</div>
	<div class="row">
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th style="width: 100px;"><?= lang('no-orden') ?></th>
							<th><?= lang('id-cliente') ?></th>
							<th style="width: 200px;"><?= lang('status-orden') ?></th>
							<th style="width: 90px;"><?= lang('action') ?></th>
						</tr>
					</thead>

					<tbody>
						<?Php
						foreach ($ordenes as $orden) {

							if ($orden->estado == 1) {
								$activo = 'activa';
							} else {
								$activo = 'procesada';
							}
						?>
							<tr>
								<td><?= $orden->idOrden ?></td>
								<td><?= $orden->idCliente ?></td>
								<td><?= $activo ?></td>
								<td class="text-center">
									<a href="<?= base_url() ?>Admin/actualizarService/<?= $orden->idOrden ?>" class="btn btn-warning text-ligth"> <i class="fa fa-edit"></i></a>
									<button type="button" class="btn btn-danger text-light delete" name="delete" data-id="<?= $orden->idOrden ?>"><i class="fa fa-trash"></i></button>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
	$(document).ready(function() {
		var urlbase = "<?= base_url() ?>"

		$('.delete').click(function(e) {
			//se evita el evento default del botón
			e.preventDefault();

			//se asigna el valor del atributo data-id del botón eliminar a la variable id
			var id = $(this).attr('data-id');

			// se establecen las opciones de la ventana de confirmación con alertifyjs
			alertify.defaults.transition = "fade";
			alertify.defaults.theme.ok = "btn btn-primary";
			alertify.defaults.theme.cancel = "btn btn-secondary";
			alertify.defaults.theme.input = "form-control"; //esto si existe algún input en el mensaje de confirmación, en este caso no existe
			alertify.defaults.glossary.title = "<?= lang('confirm') ?>";
			alertify.defaults.glossary.ok = '<?= lang('yes') ?>';
			alertify.defaults.glossary.cancel = '<?= lang('no') ?>';
			//aquí se genera el dialogo de confirmación con alertifyjs
			alertify.confirm('<?= lang('confirm-message') ?>',
				function() {
					//creo variable con la url del ajax
					var urlajax = urlbase + "Admin/borrarService";
					// Run $.ajax() here
					// Using the core $.ajax() method
					$.ajax({

						// The URL for the request
						url: urlajax,

						// The data to send (will be converted to a query string)
						data: {
							serviceId: id
						},

						// Whether this is a POST or GET request
						method: "POST",

						dataType: "json",

						success: function(r) {
							alertify.success('<?= lang('delete') ?>');
							setTimeout("location.reload(true);", 4000);
						},
						error: function(r) {
							alertify.error('<?= lang('error-del') ?>');
							setTimeout("location.reload(true);", 3000);
						}
					})

				},
				function() {
					alertify.message('<?= lang('cancel-operation') ?>');
				}).setting('modal', true);
		});

	});
</script>