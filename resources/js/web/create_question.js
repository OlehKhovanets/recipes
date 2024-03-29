
var selectedLanguage = $('#lang').val();

var placeholders = {
    'uk': 'Використовуйте Shift + Enter для переходу на новий рядок. Використовуйте Enter для створення нового блоку',
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
        let language = $('#lang').val();

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
