<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="css/jquery-ui-1.8.5.custom.css" />
        <link type="text/css" rel="stylesheet" href="css/style.css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js"></script>
        <script type="text/javascript">
            $(function(){
                $('#acordeon').accordion();

                $('#acordeon').find('ul').find('li').draggable({
                    helper : 'clone',
                    appendTo : 'body'
                });

                $('#cart').find('ol').droppable({
                    activeClass : 'ui-state-default',
                    hoverClass : 'ui-state-hover',
                    drop : function(event, ui){
                        ui.draggable.find('.drag').remove();
                        $(this).find('.aqui').remove();

                        $(this).append('<li>' + ui.draggable.text() + 
                                       '<a href="#" class="eliminar">Eliminar</a></li>');
                    }
                });

                $('.eliminar').live('click', function(){
                    $(this).parent('li').remove();
                });
            });
        </script>
        <title>JV Software | Tutorial 3</title>
    </head>
    <body>
        <div id="contenedor">
            <div id="acordeon">
                <h3><a href="#">Franelas</a></h3>
                <div>
                    <ul>
                        <li>Franela Azul <span class="drag">Arrastrame!</span></li>
                        <li>Franela Verde <span class="drag">Arrastrame!</span></li>
                        <li>Franela Blanca <span class="drag">Arrastrame!</span></li>
                    </ul>
                </div>
                <h3><a href="#">Pantalones</a></h3>
                <div>
                    <ul>
                        <li>Pantalon Azul <span class="drag">Arrastrame!</span></li>
                        <li>Pantalon Verde <span class="drag">Arrastrame!</span></li>
                        <li>Pantalon Blanco <span class="drag">Arrastrame!</span></li>
                    </ul>
                </div>
                <h3><a href="#">Zapatos</a></h3>
                <div>
                    <ul>
                        <li>Zapatos Azules <span class="drag">Arrastrame!</span></li>
                        <li>Zapatos Verdes <span class="drag">Arrastrame!</span></li>
                        <li>Zapatos Blancos <span class="drag">Arrastrame!</span></li>
                    </ul>
                </div>
            </div>
            <div id="cart">
                <h3>Carrito de compras</h3>
                <ol>
                    <li class="aqui">Arrastrar aqui!</li>
                </ol>
            </div>
        </div>
    </body>
</html>
