<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>posts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ url('css/font.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('bower_components/jquery-confirm2/dist/jquery-confirm.min.css') }}" />
    <style>
        .page-item {
            list-style: none;
            display: inline-block;
            padding: 10px;
        }

        a {
            text-decoration: none;
        }

        .jconfirm .jconfirm-holder {
            max-height: 100%;
            padding: 50px 0;
            width: 500px;
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
                    <div class="flash -notice">
                        Signed in successfully.
                    </div>

                    <nav class="nav">
                        <a class="nav_item -active" aria-current="page" href="/posts">Posts</a>
                        <a class="nav_item" href="/pages">Pages</a>
                        <a class="nav_item" href="/settings">Settings</a>
                        <a class="nav_item" target="_blank" href="/{{ $blog_name }}">{{ $blog_name }}'s blog ›</a>
                        <a class="nav_item" href="/logout">logout</a>
                    </nav>
            </header>

            <div class="container max-eight padding-bottom-gigantic">
                <div class="flex -justify -middle">
                    <h1>Posts</h1>
                    <a class="button" href="/posts/new">New post</a>
                </div>

                <ul class="list">
                    @foreach($posts as $post)
                    <li class="list_item">
                        <a href="/posts/{{ $post->sid }}" class="list_link">
                            @if($post->title==NULL)
                            <span class="list_title text-light">
                                Untitled
                            </span>
                            @else
                            <span class="list_title ">
                                {{ $post->title }}
                            </span>
                            @endif
                            <span class="list_subtitle">
                                {{ $post->time }}
                            </span>
                        </a>

                        <a data-confirm="Are you sure?" class="button -smaller -destructive" rel="nofollow" data-method="delete" onclick="del('{{ $post->sid }}')">Delete</a>
                    </li>
                    @endforeach
                </ul>

                {!! $posts->links() !!}

            </div>

            <footer class="text-center text-tiny text-light padding-top-huge padding-bottom-bigger">
                powered by <a href="https://github.com/codetyphon/bloggi" class="text-decoration-none">bloggi</a>
            </footer>
        </div>
    </div>


    <script src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('bower_components/jquery-confirm2/dist/jquery-confirm.min.js') }}"></script>
    <script>
        function del($sid) {
            $.confirm({
                columnClass: 'small',
                title: '确定删除？',
                content: '你确定要删除吗？',
                type: 'red',
                buttons: {
                    ok: {
                        text: "删除",
                        btnClass: 'btn-primary',
                        keys: ['enter'],
                        action: function() {
                            truedel($sid);
                            console.log('the user clicked confirm : ' + $sid);

                        }
                    },
                    cancel: function() {
                        console.log('the user clicked cancel');
                    }
                },
                boxWidth: '50%'
            });
        }

        function truedel($sid) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $.ajax({
                url: '/posts',
                dataType: 'json',
                type: 'DELETE',
                data: {
                    'sid': $sid,
                },
                success: function(data) {
                    console.log(data);
                    if (data.err) {
                        console.log(data.err);
                    } else {
                        window.location.href = '/posts';
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
