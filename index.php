<?php
require_once 'lib/ez_sql_core.php';
require_once 'lib/ez_sql_mysql.php';

$db = new ezSQL_mysql('root', '', 'jvs_tutoriales');

$lista = $db->get_row("SELECT * FROM opciones WHERE id_opcion = '1'");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>
        <script>
            $(function(){
               $('#lista').sortable({
                   placeholder: 'placeholder',
                   update: function() {
                       $.post('ajax.php', $(this).sortable('serialize'));
                   }
               }); 
            });
        </script>
        <title>JV Software | Tutorial 10</title>
    </head>
    <body>
        <ul id="lista">
            <?php if (!$lista->menu): ?>
            <li id="item_1">Item 1</li>
            <li id="item_2">Item 2</li>
            <li id="item_3">Item 3</li>
            <li id="item_4">Item 4</li>
            <li id="item_5">Item 5</li>
            <li id="item_6">Item 6</li>
            <?php else: ?>
            <?php $orden = unserialize($lista->menu); ?>
            <?php foreach ($orden as $item) { ?>
            <li id="item_<?php echo $item; ?>">Item <?php echo $item; ?></li>
            <?php } ?>
            <?php endif; ?>
        </ul>
    </body>
</html>
