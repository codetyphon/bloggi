<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>reset password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ url('css/font.css') }}" />
</head>

<body>

    <div class="wrapper">
        <div class="container max-six text-center margin-top-big">
            <a class="block margin-bottom-huge" href="/">
                <img class="logo -big" src="{{ url('img/logo.svg') }}" />
            </a>


            <h2>It happens</h2>

            <p>
                Enter your email below to receive a magic link to reset your password.
            </p>

        </div>

        <div class="container max-four margin-top-bigger padding-bottom-huge">

            <form class="new_user" id="new_user" action="/password" accept-charset="UTF-8" method="post"><input type="hidden" name="authenticity_token" value="7qnqFDJUzFWQN8tHj7+aHqXMY/Vt7OXsP0dDu/q74a0UCpfKGlhJAfaJ010eCqrCb6N/y9sRK3LUc3SZtOMF3A==" />
                <div class="field">
                    <label for="user_email">Email</label><br />
                    <input class="input" autofocus="autofocus" autocomplete="email" required="required" type="email" value="" name="user[email]" id="user_email" />
                </div>

                <input type="submit" name="commit" value="Send reset link" class="button wide margin-vertical-big" data-disable-with="Send reset link" />

                <p class="text-smaller text-center">
                    <a href="/signin">Return to sign in</a>
                </p>
            </form>

        </div>
    </div>
    <script async src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script>
    </script>
</body>

</html>
