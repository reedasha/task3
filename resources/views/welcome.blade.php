<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background: url('http://www.newhdwallpapers.in/wp-content/uploads/2015/01/Minimalist-Crystals-Desktop-Background-Wallpaper.jpg') no-repeat;
                background-size: cover;
                color: white;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

        </style>
    </head>
    <body>
        <div class="container"><!--  -->
            <div class="content">
                <div class="title">Practice 2</div>
                <h2>DOWNLOAD VIDEOS FROM YOUTUBE</h2>
                <form method="post" action="sendmail">
                {{ csrf_field() }}

                <label>Link: <input type="text" placeholder="Paste link here" name="link"></label>
                <label>Email: <input type="text" placeholder="Your email" name="email"></label>
                <input type="submit" value="DOWNLOAD">
               
                </form>
            </div>
        </div>
    </body>
</html>
