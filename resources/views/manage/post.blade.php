<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>post</title>
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
            <div class="editor_header"><a href="/posts" class="button -small -secondary">Back</a><span id="editor_status" class="editor_status">Saved</span><a id="publish" class="button -small">Publish</a>
                <div class="dropdown"><a id="settings" class="button -small -secondary -dropdown">Settings</a>
                    <div id="dropdown_content" class="dropdown_content">
                            <div class="field "><label for="slug">URL slug</label><input type="text" id="slug" name="slug" autocomplete="off" placeholder="slug" class="input -small" value="{{ $post->slug }}"><span class="field_help"></span></div>
                            <div class="field">
                                <div class="max-two"><label for="plublishedAt">Publishing date</label>
                                    <div class="nice-dates"><input class="input -small" name="plublishedAt" id="time" autocomplete="off" placeholder="yyyy-mm-dd HH:MM:SS" type="text" value="{{ $post->time }}">
                                        <div class="nice-dates-popover">
                                            <div>
                                                <div class="nice-dates-navigation"><a class="nice-dates-navigation_previous"></a><span class="nice-dates-navigation_current">May</span><a class="nice-dates-navigation_next"></a></div>
                                                <div class="nice-dates-week-header"><span class="nice-dates-week-header_day">Mon</span><span class="nice-dates-week-header_day">Tue</span><span class="nice-dates-week-header_day">Wed</span><span class="nice-dates-week-header_day">Thu</span><span class="nice-dates-week-header_day">Fri</span><span class="nice-dates-week-header_day">Sat</span><span class="nice-dates-week-header_day">Sun</span></div>
                                                <div class="nice-dates-grid" style="height: 336px;">
                                                    <div class="nice-dates-grid_container -origin-top" style="transform: translate3d(0px, 0px, 0px); transition-duration: 500ms;"><span class="nice-dates-day -outside" style="height: 56px;"><span class="nice-dates-day_date">27</span></span><span class="nice-dates-day -outside" style="height: 56px;"><span class="nice-dates-day_date">28</span></span><span class="nice-dates-day -outside" style="height: 56px;"><span class="nice-dates-day_date">29</span></span><span class="nice-dates-day -outside" style="height: 56px;"><span class="nice-dates-day_date">30</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_month">May</span><span class="nice-dates-day_date">1</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">2</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">3</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">4</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">5</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">6</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">7</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">8</span></span><span class="nice-dates-day -today" style="height: 56px;"><span class="nice-dates-day_date">9</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">10</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">11</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">12</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">13</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">14</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">15</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">16</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">17</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">18</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">19</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">20</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">21</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">22</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">23</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">24</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">25</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">26</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">27</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">28</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">29</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">30</span></span><span class="nice-dates-day" style="height: 56px;"><span class="nice-dates-day_date">31</span></span><span class="nice-dates-day -outside" style="height: 56px;"><span class="nice-dates-day_month">Jun</span><span class="nice-dates-day_date">1</span></span><span class="nice-dates-day -outside" style="height: 56px;"><span class="nice-dates-day_date">2</span></span><span class="nice-dates-day -outside" style="height: 56px;"><span class="nice-dates-day_date">3</span></span><span class="nice-dates-day -outside" style="height: 56px;"><span class="nice-dates-day_date">4</span></span><span class="nice-dates-day -outside" style="height: 56px;"><span class="nice-dates-day_date">5</span></span><span class="nice-dates-day -outside" style="height: 56px;"><span class="nice-dates-day_date">6</span></span><span class="nice-dates-day -outside" style="height: 56px;"><span class="nice-dates-day_date">7</span></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                <div class="editor_title max-eight container"><textarea id="title" name="title" placeholder="Title" autocomplete="off" rows="1" style="height: 36px;">{{ $post->title }}</textarea></div><textarea id="text" class="editor_text" name="text" placeholder="Start writing..." style="height: 522px;">{{ $post->text }}</textarea>
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
                url: '/posts',
                dataType: 'json',
                type: 'PUT',
                data: {
                    'sid':'{{ $post->sid }}',
                    'title': $('#title').val(),
                    'text': $('#text').val(),
                    'slug': $('#slug').val(),
                    'time': $('#time').val()
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
