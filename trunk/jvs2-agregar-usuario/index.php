<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="css/jquery-ui-1.8.4.custom.css" />
        <link type="text/css" rel="stylesheet" href="css/estilo.css" />
        <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
        <script type="text/javascript">
            $(function(){
                $('#buscar_usuario').autocomplete({
                   source : 'ajax.php?type=1',
                   select : function(event, ui){
                       $('#resultados').slideUp('slow', function(){
                            $('#resultados').html(
                                '<h2>Detalles de usuario</h2>' +
                                '<img src="' + ui.item.foto + '" />' +
                                '<strong>Nombre: </strong>' + ui.item.value + '<br/>' +
                                '<strong>Descripcion: </strong>' + ui.item.descripcion
                            );
                       });
                       $('#resultados').slideDown('slow');
                   }
                });

                $('#agregar_usuario').click(function(){
                    $('#resultados').slideUp('slow', function(){
                        $(this).load('ajax.php?type=2', '', function(){
                            $(this).slideDown('slow');
                        });
                    });
                    return false;
                });

                $('#submit').live('click', function(){
                    var data = 'type=3&nombre_usuarios=' + $('#nombre_usuarios').val() +
                               '&apellido_usuarios=' + $('#apellido_usuarios').val() +
                               '&descripcion_usuarios=' + $('#descripcion_usuarios').val() +
                               '&foto_usuarios=imagenes/user_male.png';
                    $.get('ajax.php', data, function(){
                        alert('Usuario agregado');
                    });
                });
            });
        </script>
        <title>JV Software | Tutorial 1</title>
    </head>
    <body>
        <div id="busqueda">
            <input type="text" id="buscar_usuario" name="buscar_usuario" />
            <a id="agregar_usuario" href="#">Agregar usuario</a>
        </div>
        <div id="resultados">

        </div>
    </body>
</html>
