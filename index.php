<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
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
            height: 60px;
            z-index: 10;
        }

        #content {
            top: 60px;
            height: calc(100% - 60px);
            overflow-y: scroll;
        }
    </style>
</head>
<body>
    <iframe id="navbar" name="navbar" src="FrontPage/nav.php"></iframe>
    <iframe id="content" name="content"  src="FrontPage/home.php"></iframe>
</body>
</html>
