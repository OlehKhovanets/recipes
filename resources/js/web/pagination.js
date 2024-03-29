//pagination with search and branch
function loadMoreData(page) {
    var slug = $('script[data-slug]').data('slug');
    let searchValue = $('#search_value').val();
    let filteredBranch = $('#filtered_branch').val();
    let order = $('#order').val();

    let url = '/recipes/' + slug + '?page=' + page;

    if (filteredBranch != '') {
        url += '&branch=' + filteredBranch;
    }

    if (searchValue != '') {
        url += '&search=' + searchValue;
    }

    if (order != '') {
        url += '&order=' + order;
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

//function for Scroll Event
var page = 1;
$(window).scroll(function () {
    if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
        page++;
        loadMoreData(page);
    }
});
