<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ url('css/font.css') }}" />
</head>

<body>

    <div class="wrapper">
        <div class="container max-six text-center margin-top-big">
            <a class="block margin-bottom-huge" href="/">
                <img class="logo -big" src="{{ url('img/logo.svg') }}" />
            </a>


            <h1>Create your blog</h1>

            <p id="label_alert">
                You’re almost there. Sign up below to create your blog.
            </p>

        </div>

        <div class="container max-four margin-top-bigger padding-bottom-huge">

            <form action="/signup" accept-charset="UTF-8" method="post" onsubmit="return reg()">
                <div class="field">
                    <label id="label_blog_name" for="signup_site_name">Your blog’s name</label>
                    <input class="input" required="required" type="text" name="blog_name" id="blog_name" />
                </div>

                <div class="field">
                    <label id="label_email" for="signup_user_email">Your email</label>
                    <input class="input" required="required" autocomplete="email" type="email" name="email" id="email" />
                </div>

                <div class="field">
                    <label for="signup_user_password">Pick a password</label>
                    <input class="input" required="required" minlength="6" type="password" name="password" id="password" />
                </div>

                <input type="submit" id="commit" name="commit" value="Create your blog" class="button wide margin-vertical-big" data-disable-with="Create your blog" />

                <p class="text-smaller text-center">
                    Already have one? <a href="/signin">Sign in</a>
                </p>
            </form>
        </div>
    </div>
    <script src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('bower_components/js-md5/build/md5.min.js') }}"></script>

    <script>
        function reg() {
            console.log("login");
            $('#commit').attr('disabled', true);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $.ajax({
                url: '/signup',
                dataType: 'json',
                type: 'POST',
                data: {
                    'blog_name': $('#blog_name').val(),
                    'email': $('#email').val(),
                    'md5_passwd': md5($('#password').val())
                },
                success: function(data) {
                    console.log(data);
                    $('#commit').attr('disabled', false);
                    if (data.err) {
                        data.errs.forEach(element => {
                            $('#label_' + element.err_type).text(element.err_msg);
                        });
                    } else {
                        console.log('success');
                        window.location.href = '/';
                    }
                }.bind(this),
                error: function(xhr, status, err) {
                    console.error(null, status, err.toString());
                }.bind(this)
            });
            return false;
        }
    </script>
</body>

</html>
