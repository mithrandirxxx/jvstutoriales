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
                                '<input type="hidden" id="id_usuario" value="'+ ui.item.id + '" />' +
                                '<img src="' + ui.item.foto + '" />' +
                                '<strong>Nombre: </strong><span>' + ui.item.value +
                                ' <a href="#" class="editar">Editar</a></span>' +
                                '<span class="oculto"><input type="text" id="nombre" value="' + ui.item.value + '"/>' +
                                ' <a href="#" class="grd_info">Ok</a> ' +
                                '<a href="#" class="cancel">Cancelar</a></span><br/>' +
                                '<strong>Descripcion: </strong><span>' + ui.item.descripcion +
                                ' <a href="#" class="editar">Editar</a></span>' +
                                '<span class="oculto"><input type="text" id="descripcion" value="' + ui.item.descripcion + '"/>' +
                                ' <a href="#" class="grd_info">Ok</a> ' +
                                '<a href="#" class="cancel">Cancelar</a></span><br/>'
                            );
                       });
                       $('#resultados').slideDown('slow');
                   }
                });

                $('.editar').live('click', function(){
                    $(this).closest('span').hide('slow', function(){
                        $(this).closest('span').next('span').show('fast');
                    });
                    return false;
                });

                $('.cancel').live('click', function(){
                    $(this).closest('span').hide('slow', function(){
                        $(this).closest('span').prev('span').show('fast');
                    });
                    return false;
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

                $('.grd_info').live('click', function(){
                    var data;
                    var id_usuario = $('#id_usuario').val();
                    var info_usuario = $(this).siblings('input').val();
                    var elemento = $(this);
                    if ($(this).siblings('input').attr('id') == 'nombre'){
                        var usuario = info_usuario.split(" ");
                        data = 'type=4&nombre_usuarios=' + usuario[0] + '&apellido_usuarios=' + usuario[1] +
                               '&id_usuario=' + id_usuario;
                        $.get('ajax.php', data, function(){
                            elemento.closest('span').hide('slow', function(){
                                $(this).closest('span').hide('slow', function(){
                                    $(this).closest('span').prev('span').html(
                                        usuario[0] + ' ' + usuario[1] + ' <a href="#" class="editar">Editar</a>'
                                    );
                                    $(this).closest('span').prev('span').show('fast');
                                });
                            });
                        });
                    } else if ($(this).siblings('input').attr('id') == 'descripcion'){
                        data = 'type=4&descripcion_usuarios=' + info_usuario + '&id_usuario=' + id_usuario;
                        $.get('ajax.php', data, function(){
                            elemento.closest('span').hide('slow', function(){
                                $(this).closest('span').hide('slow', function(){
                                    $(this).closest('span').prev('span').html(
                                        info_usuario + ' <a href="#" class="editar">Editar</a>'
                                    );
                                    $(this).closest('span').prev('span').show('fast');
                                });
                            });
                        });
                    }
                    return false;
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
