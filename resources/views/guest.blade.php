<!DOCTYPE html>
<html>

<head>
    <title>Bloggi – A simple blogging platform</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ url('css/font.css') }}" />
</head>

<body>
    <div class="wrapper padding-bottom-bigger">
        <div class="container">
            <header class="header">
                <img class="logo" src="{{ url('img/logo.svg') }}" />

                <nav class="nav">
                    <a class="nav_item button -secondary -small" href="/posts">Your posts ›</a>
                </nav>
            </header>

            <div class="hero">
                <h1>Create your own blog in seconds</h1>

                <div class="container max-ten">
                    <p class="hero_description">
                        Focus on writing and not on dealing with complicated blogging software.
                        <br>
                        Publish on your own domain, in your own way, and own your work.
                    </p>
                </div>

                <a class="button margin-vertical-bigger" href="/signup">Create your blog for free</a>
            </div>
        </div>

        <div class="container max-eight">
            <p>
                Publishing text on the internet shouldn’t be so hard.
            </p>

            <p>
                There are many options out there, but most are either too complicated, too restrictive, too expensive or too free (which means an uncertain future for your blog).
            </p>

            <p>
                Bloggi aims to be a simple, flexible, affordable and reliable solution to let you share your ideas with the world.
            </p>

            <p>
                It has a simple focus. It lets you write without distractions:
            </p>
        </div>

        <div class="browser">
            <div class="browser_header">
                <div class="browser_buttons">
                    <span class="browser_button"></span>
                    <span class="browser_button"></span>
                    <span class="browser_button"></span>
                </div>
            </div>

            <div class="browser_page">
                <img src="/assets/editor-5e589d49c1013342d90e73d436d87eaf9e3d575900a1a6c814feaf77611c4911.png" />
            </div>
        </div>

        <div class="container max-eight">
            <p>
                And lets your readers read, without distractions:
            </p>
        </div>

        <div class="browser">
            <div class="browser_header">
                <div class="browser_buttons">
                    <span class="browser_button"></span>
                    <span class="browser_button"></span>
                    <span class="browser_button"></span>
                </div>
            </div>

            <div class="browser_page">
                <img src="/assets/post-e8efe4789401429dbb5b1973c3b04c810705c5254d41ed25da708345afb9f53a.png" />
            </div>
        </div>

        <footer class="container flex -justify text-tiny text-light margin-top-gigantic padding-top-big">
            <span class="text-right">
                powered by <a href="https://github.com/codetyphon/bloggi" class="text-decoration-none">bloggi</a>
            </span>
        </footer>
    </div>
</body>

</html>
