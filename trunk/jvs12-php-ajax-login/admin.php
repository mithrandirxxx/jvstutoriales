<?php
session_start();

if (!$_SESSION['usuario_logeado']) {
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.4.0/bootstrap.min.css">
		<title>JV Software | Tutorial 12</title>
		<style>
			.hero-unit {
				margin-top: 40px
			}
			.sidebar {
				background: #eee;
			}
			form, .actions {
				margin-bottom: 0
			}
			.error {
				color: red
			}
		</style>
	</head>
	<body>
		<div class="topbar">
	      <div class="topbar-inner">
	        <div class="container">
	          <a class="brand" href="index.php">JV Software</a>
	          <ul class="nav">
	            <li><a href="admin.php">Admin</a></li>
	          </ul>
	        </div>
	      </div>
	    </div>
		<div class="container">
			<div class="hero-unit">
				<h1>Tutorial Login AJAX</h1>
			</div>
			<div class="row">
				<div class="sidebar span5">
					<h3>Hola, <?php echo $_SESSION['usuario_logeado']->nombre . ' ' . $_SESSION['usuario_logeado']->apellido ?>!</h3>
					<p>
						<a href="logout.php">Logout</a>
					</p>
				</div>
				<div class="content span11">
					<h2>Admin</h2>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
				</div>
			</div>
			<footer>
				<p>
					 &copy; JV Software 2011
				</p>
			</footer>
		</div>
	</body>
</html>