/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/web/pagination.js ***!
  \****************************************/
//pagination with search and branch
function loadMoreData(page) {
  var slug = $('script[data-slug]').data('slug');
  var searchValue = $('#search_value').val();
  var filteredBranch = $('#filtered_branch').val();
  var order = $('#order').val();
  var url = '/recipes/' + slug + '?page=' + page;
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
    beforeSend: function beforeSend() {
      $(".ajax-load").show();
    }
  }).done(function (data) {
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
/******/ })()
;