<?php
session_start();

require_once 'libs/ez_sql_core.php';
require_once 'libs/ez_sql_mysql.php';

$conn = new ezSQL_mysql('root', '', 'jvs_tutoriales');

$usuario = $conn->get_row("SELECT id_usuario, nombre, apellido FROM usuarios WHERE login = '" . $_POST['login']  . "' AND password = '" . sha1($_POST['pwd'])  . "'");

if ($usuario) {
	$_SESSION['usuario_logeado'] = $usuario;
	echo json_encode($usuario);
} else {
	echo json_encode(array('error' => true));
}
