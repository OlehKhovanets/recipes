@include('web.components.head', [
    'bodyClass' => 'body_question_and_answer',
    'title' => __('seo.create_question_title'),
    'seoDescription' => __('seo.create_question_description'),
    'page' => 'answer',
    'seoKeywords' => __('seo.create_question_keywords')
])
<section class="answear">
    <div class="container container-question">
        <div class="answear-content">
            @include('web.partials.breadcrumbs', [
            'items' => [
                'home',
                'slug_answer',
                'add_question'
            ]
        ])
            <div class="question-form flex-wrapper">
                @include('web.questions.partials.save-question-form', [
                    'class' => 'create-question-web',
                    'img' => 'captcha-img',
                    'captcha' => 'refreshCaptcha'
                ])
                <div class="create-question-title-wrapper">
                    <div class="answear-theme">
                        <h4 class="answear-theme__title">{{ __('messages.create_new_topic') }}</h4>
                    </div>
                    <div class="qustion-name-input">
                        <input id="question" class="question-input"
                               placeholder="{{ __('messages.enter_question_name') }}">
                    </div>
                    <div id="editorjs"></div>
                </div>
            </div>
{{--            @include('web.recipes.partials.save-question-form', [--}}
{{--                    'class' => 'create-question-mobile',--}}
{{--                    'img' => 'captcha-img_mobile',--}}
{{--                    'captcha' => 'refreshCaptchaMobile'--}}
{{--                ])--}}
        </div>
    </div>
    <input type="hidden" name="lang" id="lang_hidden" value="{{ \Illuminate\Support\Facades\App::getLocale() }}">
    <input type="hidden" name="branch" id="branch" value="{{ $slug }}">
</section>
@include('web.components.footer', [
    'isQuestionPage' => false,
    'isQuestionCreatePage' => true
])
<!-- Initialization -->
<script>

    var selectedLanguage = $('#lang_hidden').val();

    var placeholders = {
        'ua': 'Використовуйте Shift + Enter для переходу на новий рядок. Використовуйте Enter для створення нового блоку',
        'en': 'Use Shift + Enter to move to a new line. Use Enter to create a new block',
        // Додайте інші мови за потреби
    };

    var editor = new EditorJS({
        readOnly: false,
        placeholder: placeholders[selectedLanguage],
        holder: 'editorjs',
        tools: {
            list: {
                class: List,
                inlineToolbar: true,
                shortcut: 'CMD+SHIFT+L'
            },
            code: {
                class: CodeTool,
                shortcut: 'CMD+SHIFT+C'
            },
        },
        data: {},
        onReady: function () {
            // saveButton.click();
        },
        onChange: function (api, event) {
            console.log('something changed', event);
        }
    });

    const saveButton = document.getElementById('saveButton');

    function saveData() {
        editor.save().then((outputData) => {
            let question = $("#question").val();
            let captcha = $("#captcha").val();
            let branch = $("#branch").val();
            let language = $('#lang_hidden').val();

            outputData['branch'] = branch;
            outputData['lang'] = language;
            outputData['question'] = question;
            outputData['captcha'] = captcha;

            var jsonData = JSON.stringify(outputData);

            $.ajax({
                url: '/api/question',
                type: 'POST',
                data: jsonData,
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                success: function (response) {
                    console.log('Дані успішно відправлено на сервер:', response);
                    window.location.href = "/profile";
                },
                error: function (error) {
                    // error.responseJSON.message
                    $('#notification-description').text(error.responseJSON.message);
                    $('.notification').css('display', 'block');
                    setTimeout(function () {
                        $('.notification').css('display', 'none');
                    }, 2000);
                    // console.error('Помилка під час відправлення даних:', error);
                }
            });
        }).catch((error) => {
            console.error('Помилка збереження:', error);
        });
    }

</script>
