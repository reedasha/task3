<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Mailer Demo</title>
<style>
            h2{
                color: black;
            }
            p {
                color: black;
                font-size:20px;
            }
</style>
</head>
 
<body>
    <h2>Dear {{ $email }},</h2>

    <p>
        You requested to download audio version of the video. Below you will find a link to the download. <br>
        Thanks for using our services!
        <a href='{{ $file }}'><h2>Click</h2></a>
    <p>
Best Regards
</body>
</html>