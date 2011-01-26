<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
        <script src="js/jquery.tmpl.js"></script>
        <script>
            $(function(){
                $('#query').live('keyup', function(){
                    var data = 'query=' + $(this).val();

                    $.post('ajax.php', data, function(resp){
                        $('#productos').empty();
                        $('#tmpl_productos').tmpl(resp).appendTo('#productos');
                    }, 'json');
                });
            });
        </script>
        <script id="tmpl_productos" type="text/x-jquery-tmpl">
            <tr>
                {{if productCode}}
                <td>${productCode}</td>
                <td>${productName}</td>
                {{else}}
                <td colspan="2">No existen resultados</td>
                {{/if}}
            </tr>
        </script>
        <title>JV Software | Tutorial 8</title>
    </head>
    <body>
        <div id="main">
            <h1>Buscar productos</h1>
            <input type="text" name="query" id="query">

            <table>
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                </thead>
                <tbody id="productos">
                    <tr>
                        <td colspan="2">Resultados</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
