<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ url('css/font.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('bower_components/jquery-confirm2/dist/jquery-confirm.min.css') }}" />
    <style>
        .jconfirm-holder {
            width: 90%;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <header class="header">
                <a href="/posts">
                    <img class="logo" src="{{ url('img/logo.svg') }}" />
                </a>
                <nav class="nav">
                    <a class="nav_item" href="/posts">Posts</a>
                    <a class="nav_item" href="/pages">Pages</a>
                    <a class="nav_item -active" aria-current="page" href="/settings">Settings</a>
                    <a class="nav_item" target="_blank" href="/{{ $blog_name }}">Your blog ›</a>
                    <a class="nav_item" target="_blank" href="/logout">logout</a>
                </nav>
            </header>

            <div class="container max-eight padding-bottom-gigantic">
                <h1>Settings</h1>

                <nav class="tabs margin-bottom-bigger">
                    <!-- <a class="tab -active" aria-current="page" href="/settings">Site</a>
                    <a class="tab" href="/settings/account">Account</a> -->
                </nav>

                <div class="field">
                    <label for="site_name">Name</label>
                    <input class="input" disabled required="required" type="text" value="{{ $blog_name }}" name="blog_name" id="site_name" />
                </div>

                <div class="field">
                    <label for="email">Email</label>
                    <input class="input" disabled required="required" type="text" value="{{ $setting->email }}" name="email" id="email" />
                </div>

                <div class="field">
                    <label for="site_description">Description</label>
                    <textarea class="input" name="blog_bio" id="blog_bio">{{ $setting->blog_bio }}</textarea>
                </div>

                <div>
                    <button type="button" id="commit" value="Save" class="button margin-top-bigger">Save</button>
                </div>

            </div>
            <footer class="text-center text-tiny text-light padding-top-huge padding-bottom-bigger">
            </footer>
        </div>
    </div>
    <script src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('bower_components/js-md5/build/md5.min.js') }}"></script>
    <script src="{{ url('bower_components/jquery-confirm2/dist/jquery-confirm.min.js') }}"></script>
    <script>
        $('#commit').click(function() {
            save();
        });

        function save() {
            $('#commit').attr('disabled', true);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $.ajax({
                url: '/settings',
                dataType: 'json',
                type: 'PUT',
                data: {
                    'blog_bio': $('#blog_bio').val()
                },
                success: function(data) {
                    console.log(data);
                    $('#commit').attr('disabled', false);
                    if (data.err) {
                        $.confirm({
                            title: 'What is up?',
                            content: 'Here goes a Error content',
                            type: 'red',
                            buttons: {
                                ok: {
                                    text: "ok!",
                                    btnClass: 'btn-primary',
                                    keys: ['enter'],
                                    action: function() {
                                        console.log('the user clicked confirm');
                                    }
                                },

                            }
                        });
                    } else {
                        console.log('success');
                        $.confirm({
                            title: 'update success',
                            content: 'ok',
                            type: 'green',
                            buttons: {
                                ok: {
                                    text: "ok!",
                                    btnClass: 'btn-primary',
                                    keys: ['enter'],
                                    action: function() {
                                        console.log('the user clicked confirm');
                                    }
                                },

                            }
                        });
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
