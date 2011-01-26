<?php
include_once 'lib/ez_sql_core.php';
include_once 'lib/ez_sql_mysql.php';

$db = new ezSQL_mysql('root', '', 'jvs_tutoriales', 'localhost');

$productos = $db->get_results("SELECT * FROM products WHERE productName LIKE '%" . $_POST['query'] . "%'");

echo json_encode($productos);