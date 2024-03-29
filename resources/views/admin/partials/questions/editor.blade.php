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
    /**
     * To initialize the Editor, create a new instance with configuration object
     * @see docs/installation.md for mode details
     */
    var editor = new EditorJS({
        /**
         * Enable/Disable the read only mode
         */
        readOnly: false,
        placeholder: 'Напишіть опис рецепту',

        /**
         * Wrapper of Editor
         */
        holder: 'editorjs',

        /**
         * Common Inline Toolbar settings
         * - if true (or not specified), the order from 'tool' property will be used
         * - if an array of tool names, this order will be used
         */
        // inlineToolbar: ['link', 'marker', 'bold', 'italic'],
        // inlineToolbar: true,

        /**
         * Tools list
         */
        tools: {
            /**
             * Each Tool is a Plugin. Pass them via 'class' option with necessary settings {@link docs/tools.md}
             */
            // header: {
            //     class: Header,
            //     inlineToolbar: ['marker', 'link'],
            //     config: {
            //         placeholder: 'Header'
            //     },
            //     shortcut: 'CMD+SHIFT+H'
            // },

            /**
             * Or pass class directly without any configuration
             */
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
                class: List,
                inlineToolbar: true,
                shortcut: 'CMD+SHIFT+L'
            },

            // checklist: {
            //     class: Checklist,
            //     inlineToolbar: true,
            // },

            // quote: {
            //     class: Quote,
            //     inlineToolbar: true,
            //     config: {
            //         quotePlaceholder: 'Enter a quote',
            //         captionPlaceholder: 'Quote\'s author',
            //     },
            //     shortcut: 'CMD+SHIFT+O'
            // },

            // warning: Warning,

            // marker: {
            //     class: Marker,
            //     shortcut: 'CMD+SHIFT+M'
            // },

            code: {
                class: CodeTool,
                shortcut: 'CMD+SHIFT+C'
            },

            // delimiter: Delimiter,

            // inlineCode: {
            //     class: InlineCode,
            //     shortcut: 'CMD+SHIFT+C'
            // },
            //
            // linkTool: LinkTool,

            // embed: Embed,
            //
            // table: {
            //     class: Table,
            //     inlineToolbar: true,
            //     shortcut: 'CMD+ALT+T'
            // },

        },

        /**
         * This Tool will be used as default
         */
        // defaultBlock: 'paragraph',

        /**
         * Initial Editor data
         */
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

            // outputData['branches'] = branches;
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
                    // console.error('Помилка під час відправлення даних:', error.responseJSON.message);
                }
            });
        }).catch((error) => {
            console.error('Помилка збереження:', error);
        });
    }
</script>
