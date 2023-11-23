<?Php
$admin = $this->session->rolId;
$plantilla = $this->session->plantilla;
?>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
		<a href="<?= base_url('admin/listadoClientes') ?>" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Lista Clientes</a>
	</div>

	<!-- Content Row -->
	<div class="row">

		<?Php
		if ($plantilla == 'shop') {
		?>
			<!-- Earnings (Monthly) Card Example -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Cantidad de Clientes</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $clientes ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-id-card fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Earnings (Monthly) Card Example -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Ordenes de Trabajo</div>
								<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $totalOrdenes ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-calendar fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?Php
			if ($admin == 1 || $admin == 2) {
			?>
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total deuda por cobrar</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $deuda ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?Php
			};
			?>

		<?Php
		};
		?>

		<!-- Earnings (Monthly) Card Example -->
		<?Php
		if ($admin == 2 || $admin == 1) {
		?>
			<!-- Earnings (Monthly) Card Example -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Usuarios Registrados</div>
								<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $usuarios ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-user fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?Php
		};
		?>
		<!-- Content Row -->

		<div class="row">


		</div>

	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->