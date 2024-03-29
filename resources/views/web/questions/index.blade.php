{{--@foreach($recipes as $recipe)--}}
{{--    <a href="/recipe/{{$recipe->id}}">--}}
{{--        {{$recipe->title}}--}}
{{--    </a>--}}
{{--    </br>--}}
{{--@endforeach--}}

<html>
<head>
    <title>My Title</title>
    @laravelPWA
</head>
<body>
<div>
    <a href="/profile">PROFILE</a>
</div>
<div>
    <input type="text" id="search" name="search">
</div>
<ul class="question-list" style="padding: 60px">
</ul>
...
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function loadMoreData(page, search) {
        let url = '/recipes?page=' + page;

        if (search != '') {
            url += '&search=' + search;
        }

        $.ajax({
            url: url,
            type: 'get',
            beforeSend: function () {
                $(".ajax-load").show();
            }
        })
            .done(function (data) {
                if (data.html == "") {
                    $('.ajax-load').html("No more Posts Found!");
                    return;
                }
                $('.ajax-load').hide();
                $(".question-list").append(data.html);
            })
            // Call back function
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log("Server not responding.....");
            });

    }
    var page = 1;
    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            loadMoreData(page, $('#search').val());
        }
    });

    $(document).ready(function () {
        loadMoreData(1, $('#search').val());
    });

    var timeout = null;
    $('#search').keyup(function() {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            $(".question-list").empty();
            // console.log('achived');
            // page++;
            page = 1;
            loadMoreData(page, $('#search').val());
        }, 300);
    });
</script>
