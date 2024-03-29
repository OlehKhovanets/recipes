@include('admin.partials.header')
@include('admin.partials.left-menu', [
    'type' => 'recipes'
])

{{--<style>--}}
{{--    .ingredient-div {--}}
{{--        display: flex; gap: 22px;--}}
{{--    }--}}
{{--</style>--}}

{{--<style>--}}
{{--    /* Height fix for select2 */--}}
{{--    .select2-container .select2-selection--single, .select2-container--default .select2-selection--single .select2-selection__rendered, .select2-container--default .select2-selection--single .select2-selection__arrow {--}}
{{--        height: 40px;--}}
{{--    }--}}

{{--    .select2-container--default .select2-selection--single .select2-selection__rendered {--}}
{{--        line-height: 40px;--}}
{{--    }--}}
{{--</style>--}}

<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('admin.partials.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h5>Створити рецепт</h5>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <div class="align-items-center justify-content-center mb-0"></div>

                                <div class="ce-example__content _ce-example__content--small">
                                    <label>Назва: </label>
                                    <div style="display: flex; justify-content: center">
                                        <input type="text" placeholder="Введіть назву рецепту" style="max-width: 650px" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="title" id="title">
                                    </div>
                                    <label>Кількість порцій: </label>
                                    <div style="display: flex; justify-content: center">
                                        <input type="number" style="max-width: 100px" placeholder="кількість" class="form-control number_of_servings" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="number_of_servings" name="number_of_servings">
                                    </div>
                                    <label>Тип прийому: </label>
                                    <div style="display: flex; justify-content: center">
                                        <select class="type_of_meal" name="type_of_meal" id="type_of_meal">
                                            <option value="1">Сніданок</option>
                                            <option value="2">Перекус</option>
                                            <option value="3">Обід</option>
                                            <option value="4">Перекус перед вечерею</option>
                                            <option value="5">Вечеря</option>
                                        </select>
                                    </div>
                                    <label>Інгредієнти: </label>
                                    <div style="display: flex; justify-content: center; gap: 20px">
{{--                                        <div style="justify-content: center">--}}
{{--                                            <input type="text" placeholder="Введіть інгредієнт" style="max-width: 650px" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="title" id="title">--}}
{{--                                        </div>--}}
                                        <div id="container">
                                            <div class="ingredient-div form-group" style="display: flex; gap: 22px;">
                                                <select class="find-ingredients" name="ingredient">
                                                    @foreach($ingredients as $ingredient)
                                                        <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="number" style="max-width: 100px" placeholder="маса/гр" class="form-control mass" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="mass">
                                            </div>
                                        </div>
                                        <div id="addIngredient"><img style="cursor: pointer" src="/admin/assets/img/plus.png" alt=""></div>
                                    </div>


{{--                                    <label>Добавити інгредієнти: </label>--}}
{{--                                    <div style="display: flex; justify-content: center">--}}
{{--                                        <select id="branches" class="js-example-basic-multiple" multiple style="width: 650px">--}}
{{--                                            @foreach($ingredients as $ingredient)--}}
{{--                                                <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
                                    <label>Опис: </label>
                                    <div id="editorjs"></div>

                                    <div class="ce-example__button" id="saveButton">
                                        <button onclick="saveData()" class="btn btn-dark btn-sm">Зберегти дані</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.partials.footer')
    </div>
</main>

@include('admin.partials.footer-js')
@include('admin.partials.questions.editor')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>

    document.getElementById("addIngredient").addEventListener("click", function() {
        var container = document.getElementById("container");
        var newDiv = document.createElement("div");
        newDiv.className = "ingredient-div";
        newDiv.style = 'display: flex; gap: 22px; margin-bottom:20px';
        newDiv.innerHTML = `
        <select class="find-ingredients" name="ingredient">
            @foreach($ingredients as $ingredient)
        <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
            @endforeach
        </select>
        <input type="number"  style="max-width: 100px" placeholder="Введіть масу в грамах" class="form-control mass" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="mass">
    `;
        container.appendChild(newDiv);

        $('.find-ingredients').select2({
            width: 'resolve' // need to override the changed default
        });
    });

    $(document).ready(function() {
        $('.find-ingredients').select2({
            width: 'resolve' // need to override the changed default

        });
    });
</script>
