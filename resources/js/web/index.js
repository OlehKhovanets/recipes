//search in main page
$(document).ready(function() {

    //hide spinner
    setTimeout(function() {
        // Приховуємо спіннер за допомогою jQuery
        $("#spinner-container").hide();
        $(".question-content").show();
    }, 10);
    //hide spinner

    var isHidden = localStorage.getItem('isHidden');

    if (isHidden !== 'true') {
        $('.banner').css('display', 'flex');
    }

var inputDelay = 500;
var currentInput = "";

$(".select-box__input-text").on("input", function() {
    var inputText = $(this).val();
    var search = $('#search').val();

    var cleanedText = inputText.replace(/\s/g, '').toLowerCase();

    if (cleanedText.length % 2 === 0 && cleanedText !== currentInput) {
        $(".select-box__list").empty();
        $('.select-box__list').css('display', 'block');
        $('#loader').css('display', 'block');
        console.log('here');
        currentInput = cleanedText;
        setTimeout(function() {

            $.ajax({
                url: "/search/branch?search=" + search,
                type: "GET",
                data: { input: currentInput },
                success: function(response, status, xhr) {
                    $(".select-box__list").empty();
                    $('#loader').css('display', 'none');
                    if (xhr.status === 200) {
                        if (response.data.length !== 0) {
                            for (let i = 0; i < response.data.length; i++) {
                                // $('.loader').css('display', 'none');
                                if (response.data[i].type === 'branch') {
                                    $(".select-box__list").prepend("<li class='li_search'><a href=\"" + response.data[i].url + "\"  style='text-decoration: none; color: black'><label class=\"select-box__option\"><img src='" + response.data[i].icon_path + "' style='float: left;width: 21px;'>" + response.data[i].name + "</label></a></li>");
                                }

                                if (response.data[i].type === 'question') {
                                    $(".select-box__list").prepend("<li class='li_search'><a href=\"" + response.data[i].url + "\"  style='text-decoration: none; color: black'><label class=\"select-box__option\"><img src='/web/images/question.png' style='float: left;width: 21px;'>" + response.data[i].name + "</label></a></li>");
                                }

                                if (response.data[i].type === 'roadmap') {
                                    $(".select-box__list").prepend("<li class='li_search'><a href=\"" + response.data[i].url + "\"  style='text-decoration: none; color: black'><label class=\"select-box__option\"><img src='/web/images/roadmap.png' style='float: left;width: 21px;'>" + response.data[i].name + "</label></a></li>");
                                }

                                if (response.data[i].type === 'article') {
                                    $(".select-box__list").prepend("<li class='li_search'><a href=\"" + response.data[i].url + "\"  style='text-decoration: none; color: black'><label class=\"select-box__option\"><img src='/web/images/blog.png' style='float: left;width: 21px;'>" + response.data[i].name + "</label></a></li>");
                                }

                                if (response.data[i].type === 'clue') {
                                    $(".select-box__list").prepend("<li class='li_search'><a href=\"" + response.data[i].url + "\"  style='text-decoration: none; color: black'><label class=\"select-box__option\"><img src='/web/images/hint.png' style='float: left;width: 21px;'>" + response.data[i].name + "</label></a></li>");
                                }

                                if (response.data[i].type === 'cv') {
                                    $(".select-box__list").prepend("<li class='li_search'><a href=\"" + response.data[i].url + "\"  style='text-decoration: none; color: black'><label class=\"select-box__option\"><img src='/web/images/template.png' style='float: left;width: 21px;'>" + response.data[i].name + "</label></a></li>");
                                }
                            }
                        } else {
                            $('#loader').css('display', 'none');
                            // $('.loader').css('display', 'none');
                        }
                    } else {
                        $(".select-box__list").empty();
                    }
                },
                error: function(error) {
                    $(".select-box__list").empty();
                }
            });
        }, inputDelay);
    }
});

//redirect to main page
$('#logo').on('click', function () {
    window.location.href = "/";
});
});

//sweetAlert show popup on click
$('#need_to_auth_button').on('click', function () {

    // Отримайте переклади з сервера
    $.get('/translations', function(translations) {
        Swal.fire(translations.login_please);
    });
});

$('#help-service').on('click', function () {

    $('#swal-form').css('display', 'block');
    // Отримайте переклади з сервера
    $.get('/translations', function(translations) {
        Swal.fire({
            title: translations.any_question,
            html: `
                <div id="swal-form" style="display: block;">
                    <input type="text" id="email" class="support-input" placeholder="Email">
                    <textarea id="message" class="support-textarea" placeholder="Message"></textarea>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: translations.send,
            cancelButtonText: translations.cancel,
            preConfirm: () => {
                const email = document.getElementById('email').value;
                const message = document.getElementById('message').value;

                // Ваш AJAX-запит
                return fetch('/api/support/send', {
                    method: 'POST', // Метод вашого запиту (POST, GET, тощо)
                    body: JSON.stringify({ email, message }),
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                })
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error(translations.error_when_sent);
                        }
                        return response.json();
                    })
                    .then((data) => {
                        // Обробка успішної відповіді
                        Swal.fire(translations.thanks_for_answer + '', '', 'success');
                    })
                    .catch((error) => {
                        // Обробка помилки
                        Swal.fire(translations.error, error.message, 'error');
                    });
            },
        });
    });
});

//logout
$('#svg_profile_icon').on('click', function () {
    $('#svg_profile_icon_form').submit();
});

//banner

$('.banner_remove').on('click', function(){
    $('.banner').css('display', 'none');
    localStorage.setItem('isHidden', true);
});

//captcha
function refreshCaptcha()
{
    $('#refreshCaptcha').click(function() {
        $.ajax({
            type: 'GET',
            url: '/refresh-captcha', // Роут, який повертає новий URL капчі
            success: function(data) {
                $('#captcha-img').empty().append('<img src="' + data + '" alt="Captcha">');
                // $('#captchaImage').attr('src', data); // Оновлення зображення капчі
            }
        });
    });
}

//refresh captcha
$(document).ready(function() {
    refreshCaptcha();
});
