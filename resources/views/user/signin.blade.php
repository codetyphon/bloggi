<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>signin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ url('css/font.css') }}" />
</head>
<body>
    <div class="wrapper">
        <div class="container max-six text-center margin-top-big">
            <a class="block margin-bottom-huge" href="/">
                <img class="logo -big" src="{{ url('img/logo.svg') }}" />
            </a>
            <h1>Welcome back</h1>
            <p id="label_alert">
                It’s good to see you again. Sign in below.
            </p>
        </div>
        <div class="container max-four margin-top-bigger padding-bottom-huge">

            <form action="/login" method="get">
                <input type="submit" id="commit" name="commit" value="使用github登陆" class="button wide margin-vertical-big" />
            </form>
        </div>
    </div>
</body>

</html>
