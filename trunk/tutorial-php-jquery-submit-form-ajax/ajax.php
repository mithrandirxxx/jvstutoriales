<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
        && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){
?>
<h2>Gracias <?php echo $_POST['nombre']; ?>,</h2>
<div class="enviado">
    <p>Formulario enviado correctamente</p>
</div>
<?php
} else {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="css/style.css" />
        <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/form.js"></script>
        <title>JV Software | Tutorial 2</title>
    </head>
    <body>
        <div id="form-area">
            <h2>Gracias <?php echo $_POST['nombre']; ?>,</h2>
            <div class="enviado">
                <p>Formulario enviado correctamente</p>
            </div>
        </div>
    </body>
</html>

<?php
}