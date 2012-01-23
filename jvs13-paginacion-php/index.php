<?php
// ezSQL
require_once 'libs/ez_sql_core.php';
require_once 'libs/ez_sql_mysql.php';
// Zebra Pagination
require_once 'libs/Zebra_Pagination.php';

$conn = new ezSQL_mysql('root', '', 'jvs_tutoriales');

$total_paises = $conn->get_var('SELECT count(*) FROM paises');
$resultados   = 6;

$paginacion = new Zebra_Pagination();
$paginacion->records($total_paises);
$paginacion->records_per_page($resultados);
// Quitar ceros en numeros con 1 digito en paginacion
$paginacion->padding(false);

$paises = $conn->get_results('SELECT * FROM paises LIMIT ' . (($paginacion->get_page() - 1) * $resultados) . ', ' . $resultados);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>JV Software | Tutorial 13</title>
		<link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.4.0/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="hero-unit">
				<h1>Tutorial Paginaci&oacute;n en PHP</h1>
			</div>
			<div class="page-header">
				<h2>Lista de pa&iacute;ses</h2>
			</div>
			<table class="bordered-table zebra-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre Corto</th>
						<th>Nombre Largo</th>
						<th>Abreviaci&oacute;n</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($paises as $pais): ?>
					<tr>
						<td><?php echo $pais->country_id; ?></td>
						<td><?php echo $pais->short_name; ?></td>
						<td><?php echo $pais->long_name; ?></td>
						<td><?php echo $pais->iso2; ?></td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>

			<?php $paginacion->render(); ?>

			<footer>
				<p>
					 &copy; JV Software 2012
				</p>
			</footer>
		</div>
	</body>
</html>