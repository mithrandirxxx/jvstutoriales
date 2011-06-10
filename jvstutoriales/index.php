<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
        <script>
            $(function(){
               $.getJSON("http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20html%20where%20url%3D%22http%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DrWlHtvZHbZ8%26feature%3Dplayer_embedded%22%20and%0A%20%20%20%20%20%20xpath%3D'%2Fhtml%2Fbody%2Fdiv%2Fdiv%5B3%5D%2Fdiv%2Fdiv%2Fdiv%5B3%5D%2Fdiv%2Fdiv%2Fdiv%5B2%5D%2Fdiv%2Fspan%2Fstrong'&format=json&callback=", function(data){
                   $('#views').html(data.query['results'].strong);
               }); 
            });
        </script>
        <title>JV Software | Tutorial 9</title>
    </head>
    <body>
        <div id="contenedor">
            <h1>Video Youtube!</h1>
            <iframe width="400" height="330" src="http://www.youtube.com/embed/rWlHtvZHbZ8" frameborder="0" allowfullscreen></iframe>
            
            <div id="visto">
                <p>Visto <span id="views">0</span> veces.</p>
            </div>
        </div>
    </body>
</html>
