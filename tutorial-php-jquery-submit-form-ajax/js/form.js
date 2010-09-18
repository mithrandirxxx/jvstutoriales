$(function(){
    $('#form-contacto').submit(function(){
        var data = $(this).serialize();

        $.post('ajax.php', data, function(respuesta){
            $('#form-area').find('dl').slideUp('normal', function(){
                $('#form-area').html(respuesta);
            })
        });
        
        return false;
    });
});
