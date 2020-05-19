<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ $blog_name }}</title>
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
                <a href="/{{ $blog_name }}">
                    {{ $blog_name }}
                </a>
                <nav class="nav">
                    <div class="flash -notice">
                        Signed in successfully.
                    </div>

                    <nav class="nav">
                        @foreach($pages as $page)
                        <a class="nav_item" aria-current="page" href="/{{ $blog_name }}/page/{{ $page->slug }}">{{ $page->title }}</a>
                        @endforeach

                        @if((session()->get('blog_name')!==null))
                        <a class="nav_item" target="_blank" href="/">manage</a>
                        <a class="nav_item" target="_blank" href="/logout">logout</a>
                        @else
                        <a class="nav_item" target="_blank" href="/signin">signin</a>
                        <a class="nav_item" target="_blank" href="/signup">signup</a>
                        @endif
                    </nav>
            </header>

            <div class="container max-eight padding-bottom-gigantic">

                <ul class="list">
                    @foreach($posts as $post)
                    <li class="list_item">
                        <a href="/{{ $post->blog_name }}/post/{{ $post->slug }}" class="list_link">
                            @if($post->title==NULL)
                            <span class="list_title text-light">
                                Untitled
                            </span>
                            @else
                            <span class="list_title ">
                                {{ $post->title }}
                            </span>
                            @endif

                            @if($blog_name!==$post->blog_name)
                            <span class="list_subtitle">
                            {{ $post->time }} {{ $post->blog_name }}
                            </span>
                            @else
                            <span class="list_subtitle">
                                {{ $post->time }}
                            </span>
                            @endif
                        </a>

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
</body>

</html>
