<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script><!-- Header -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/image@2.3.0"></script><!-- Image -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/delimiter@latest"></script><!-- Delimiter -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script><!-- List -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script><!-- Checklist -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script><!-- Quote -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script><!-- Code -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script><!-- Embed -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script><!-- Table -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/link@latest"></script><!-- Link -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/warning@latest"></script><!-- Warning -->

<script src="https://cdn.jsdelivr.net/npm/@editorjs/marker@latest"></script><!-- Marker -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/inline-code@latest"></script><!-- Inline Code -->

<!-- Load Editor.js's Core -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>

<!-- Initialization -->
<script>
    var editor = new EditorJS({
        readOnly: false,
        placeholder: 'Напишіть опис рецепту',

        holder: 'editorjs',

        tools: {
            image: {
                class: ImageTool,
                config: {
                    endpoints: {
                        byFile: '/api/upload/image', // Your backend file uploader endpoint
                        // byUrl: 'http://localhost:8008/fetchUrl', // Your endpoint that provides uploading by Url
                    }
                }
            },

            list: {
                class: EditorjsList,
                inlineToolbar: true,
                shortcut: 'CMD+SHIFT+L'
            },

            // code: {
            //     class: CodeTool,
            //     shortcut: 'CMD+SHIFT+C'
            // },

        },

        data: {},
        onReady: function(){
            saveButton.click();
        },
        onChange: function(api, event) {
            console.log('something changed', event);
        }
    });

    /**
     * Saving button
     */
    const saveButton = document.getElementById('saveButton');

    function saveData() {

        let title = $("#title").val();
        let numberOfServings = $("#number_of_servings").val();
        let typeOfMeal = $("#type_of_meal").val();

        editor.save().then((outputData) => {

            var formData = [];

            var selects = document.querySelectorAll('.find-ingredients');
            selects.forEach(function(select) {
                var ingredient = select.value;
                var mass = select.parentNode.querySelector('input[name="mass"]').value; // Use a specific selector to target the input field
                formData.push({ingredient: ingredient, mass: mass});
            });

            console.log(formData);

            outputData['title'] = title;
            outputData['ingredients'] = formData;
            outputData['numberOfServings'] = numberOfServings;
            outputData['typeOfMeal'] = typeOfMeal;

            var jsonData = JSON.stringify(outputData);

            $.ajax({
                url: '/admin/api/recipes',
                type: 'POST',
                data: jsonData,
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                success: function (response) {
                    console.log('Дані успішно відправлено на сервер:', response);
                    window.location.href = "/admin/recipe-builder";
                },
                error: function (error) {
                    // Swal.fire(error.responseJSON.message);
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: error.responseJSON.message + '!',
                        footer: '<a href="/">Recipe app</a>',
                    });
                }
            });
        }).catch((error) => {
            console.error('Помилка збереження:', error);
        });
    }
</script>
