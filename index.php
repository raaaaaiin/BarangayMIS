<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio Igiban</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        iframe {
            border: none;
            width: 100%;
            position: absolute;
        }

        #navbar {
            height: 90px;
            z-index: 10;
        }

        #content {
            top: 90px;
            height: calc(100% - 90px);
            overflow-y: scroll;
        }
    </style>
</head>
<body>
    <iframe id="navbar" name="navbar" src="FrontPage/nav.php"></iframe>
    <iframe id="content" name="content"  src="FrontPage/home.php"></iframe>
</body>
</html>
