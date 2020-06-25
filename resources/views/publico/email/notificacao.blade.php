<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&amp;display=swap" rel="stylesheet">
    <style>
        .body-email {
            width: 100%;
            margin: 0 auto 0 0;
            padding: 10px;
            background: #fff;
            box-shadow: 5px 10px 10px #999;
            border-radius: 0 0 4px 4px;
        }
    </style>
</head>
<body style="font-family: 'Open Sans', Helvetica, Arial, cursive;
            background: #d8dfe6;
            font-size: 15px;
            ">
<div id="header" style="width: 100%;
            margin: 0 auto;
            background: #242a30;
            color: #ffffff;
            font-size: 20px;
              border-radius:4px 4px 0 0;

            padding: 10px;">
    <b>Mais Adv</b>
</div>
<div id="content" class="body-email">
    <h3 style="margin-left: 5px">{{ $assunto }}</h3>
    <p style="margin-left: 5px">
        {{ $texto }}
    </p>
    <hr style="border: none;
            border-bottom: 1px solid #eee;">
</div>
<div id="footer" style="text-align: center;
            width: 100%;
            margin: 20px auto;
            padding-bottom: 20px;
            font-size: 12px;
            color: #888;">
    Mais Adv {{date('Y')}}
</div>
</body>
</html>
