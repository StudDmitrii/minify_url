<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="app">
        <h1>URL MINIFIER</h1>
        <div>
            <form type="POST">
                <input name="long_uri" id="long_uri" placeholder="введите URI"/>
                <input id="send_long_uri" type="submit" value="submit"/>
            </form>
        </div>
        <div>
            <input id="short_uri" readonly/>
            <button id="copy_short_uri">&#128190;</button>
        </div>
    </div>
    <script src="main.js"></script>
</body>
</html>