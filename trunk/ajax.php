<?php
require_once 'lib/ez_sql_core.php';
require_once 'lib/ez_sql_mysql.php';

$data = serialize($_POST['item']);

$db = new ezSQL_mysql('root', '', 'jvs_tutoriales');

$db->query("UPDATE opciones SET menu = '$data' WHERE id_opcion = '1'");
