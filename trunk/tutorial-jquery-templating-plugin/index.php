<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="css/style.css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.tmpl.js"></script>
        <script type="text/javascript">

            $(function(){
                var arr = [
                    {Nombre: 'Luis', Apellido: 'Perez', Telefonos: [ '(123)256-4444', '(124)542-4521' ]},
                    {Nombre: 'Juan', Apellido: 'Martinez', Telefonos: [ '(457)584-4521', '(452)458-4567' ]},
                    {Nombre: 'Pedro', Apellido: 'Lopez'},
                ];

                $("#tmpl_usuarios").tmpl(arr).appendTo("#usuarios");
                /*var tlf = '';
                
                $.each(arr, function(index, value){
                    if (value.Telefonos)
                        tlf = ' <strong>Telefonos:</strong> ' + value.Telefonos;
                    else
                        tlf = '';
                    
                    $('#usuarios').append(
                        '<li>' +
                            '<strong>Nombre:</strong> ' + value.Nombre +
                            ' <strong>Apellido:</strong> ' + value.Apellido +
                            tlf +
                        '</li>'
                    );
                });*/
                
                
            });

        </script>
        <script id="tmpl_usuarios" type="text/x-jquery-tmpl">
            <li>
                <strong>Nombre:</strong> ${Nombre}
                <strong>Apellido:</strong> ${Apellido}
                {{if Telefonos}}
                <strong>Telefonos:</strong> ${Telefonos}
                {{/if}}
            </li>
        </script>
        <title>JV Software | Tutorial 4</title>
    </head>
    <body>
        <div id="contenedor">
            <ul id="usuarios"></ul>
        </div>  
    </body>
</html>
