<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ url('css/font.css') }}" />
    <style>
        .nice-dates{
            width:200px;
        }
    </style>
</head>

<body>

    <div data-react-class="Editor" data-react-props="{" data-react-cache-id="Editor-0">
        <div class="editor">
            <div class="editor_header"><a href="/pages" class="button -small -secondary">Back</a><span id="editor_status" class="editor_status">Saved</span><a id="publish" class="button -small">Publish</a>
                <div class="dropdown"><a id="settings" class="button -small -secondary -dropdown">Settings</a>
                    <div id="dropdown_content" class="dropdown_content">
                            <div class="field "><label for="slug">URL slug</label><input type="text" id="slug" name="slug" autocomplete="off" placeholder="slug" class="input -small" value="{{ $page->slug }}"><span class="field_help"></span></div>

                            <!-- <div class="field">
                                <label for="code_head">Code injection</label>
                                <textarea class="input -small" name="code_head" id="code_head" style="height: 66px; overflow-y: auto;"></textarea>
                                <span class="field_help">This will go in the <code>&lt;head&gt;</code> tag for this post.</span>
                            </div> -->
                            <!-- <button class="button -small margin-top-medium">Save</button> -->
                    </div>
                </div>
            </div>
            <div class="editor_content wrapper">
                <div class="editor_title max-eight container"><textarea id="title" name="title" placeholder="Title" autocomplete="off" rows="1" style="height: 36px;">{{ $page->title }}</textarea></div><textarea id="text" class="editor_text" name="text" placeholder="Start writing..." style="height: 522px;">{{ $page->text }}</textarea>
            </div>
        </div>
    </div>

    <script src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script>
        $("#settings").click(function() {
            if($("#settings").hasClass("-dropdown-open")){
                $("#settings").removeClass("-dropdown-open");
                $("#dropdown_content").removeClass("-active");
            }else{
                $("#settings").addClass("-dropdown-open");
                $("#dropdown_content").addClass("-active");
            }
        });
        $('#publish').click(function(){
            $('#editor_status').text('正在保存');
            $('#publish').attr('disabled', true);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $.ajax({
                url: '/pages',
                dataType: 'json',
                type: 'PUT',
                data: {
                    'sid':'{{ $page->sid }}',
                    'title': $('#title').val(),
                    'text': $('#text').val(),
                    'slug': $('#slug').val(),
                },
                success: function(data) {
                    console.log(data);
                    $('#publish').attr('disabled', false);
                    if (data.err) {
                        $('#editor_status').text(data.msg);
                    } else {
                        console.log('success');
                        $('#editor_status').text('已保存');
                        // window.location.href = '/';
                    }
                }.bind(this),
                error: function(xhr, status, err) {
                    console.error(null, status, err.toString());
                }.bind(this)
            });
            return false;
        });
    </script>
</body>

</html>
