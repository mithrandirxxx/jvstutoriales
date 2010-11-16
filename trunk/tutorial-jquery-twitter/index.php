<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>
        <title>JV Software | Tutorial 5</title>
        <link type="text/css" rel="stylesheet" href="css/style.css" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
        <script type="text/javascript">
            $(function(){
                $.getJSON('http://twitter.com/status/user_timeline/jvsoftware.json?count=4&callback=?', function(data) {
                    $.each(data, function(i, item){
                        $('#tweets img').attr('src', item.user['profile_image_url']);
                        $('#tweets ul').append(
                            '<li>' +
                                '<a href="http://twitter.com/' + item.user['screen_name'] + '">' +
                                item.user['screen_name'] + '</a> > ' + item.text +
                            '</li>'
                        )
                    })
                });
            });
        </script>
    </head>
    <body>
        <div id="tweets">
            <img id="logo" />
            <ul></ul>
        </div>
    </body>
</html>
