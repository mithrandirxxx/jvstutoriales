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
            <h2>Formulario de registro</h2>
            <form action="ajax.php" method="post" id="form-contacto">
                <dl>
                    <dt><label for="nombre">Nombre</label></dt>
                    <dd><input type="text" name="nombre" id="nombre" /></dd>

                    <dt><label for="apellido">Apellido</label></dt>
                    <dd><input type="text" name="apellido" id="apellido" /></dd>

                    <dt><label for="email">Email</label></dt>
                    <dd><input type="text" name="email" id="email" /></dd>

                    <dt><label for="contacto">Contacto</label></dt>
                    <dd>
                        <select name="contacto" id="contacto">
                            <option value="0">Seleccione..</option>
                            <option value="1">Jose Gomez</option>
                            <option value="2">Luis Perez</option>
                            <option value="3">Maria Garcia</option>
                        </select>
                    </dd>

                    <dt><label for="administrador">¿Administrador?</label></dt>
                    <dd>
                        <input type="radio" name="administrador" id="administrador" value="1" /> Si
                        <input type="radio" name="administrador" id="administrador" value="2" /> No
                    </dd>

                    <dt class="center">
                        <input type="submit" name="submit" id="submit" value="Enviar" />
                    </dt>
                </dl>
            </form>
        </div>
    </body>
</html>
