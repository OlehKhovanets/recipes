@foreach($recipes as $recipe)
{{--    <a class="questions-link" href="{{ route('index.answer', [ 'questionIn' => $questionAndAnswer->slug]) }}">--}}
{{--    <a class="questions-link" href="{{ route('index.answer', [ 'questionIn' => $recipe->slug]) }}">--}}
{{--    <a class="questions-link">--}}
{{--        <li class="question-box"  style="; margin-top: 100px">--}}
{{--            <div class="mark"></div>--}}
{{--            <div class="question-box__content">--}}
{{--                <div>--}}
{{--                    <h2 class="question-box__question">--}}
{{--                        {{ $recipe->title }}--}}
{{--                    </h2>--}}
{{--                </div>--}}
{{--                @if(auth()->check())--}}
{{--                    <select name="" id="select{{ $recipe->id }}"  onchange="saveDay(this, {{ $recipe->id }})">--}}
{{--                        <option disabled selected hidden>Виберіть день</option>--}}
{{--                        <option value="1">Понеділок</option>--}}
{{--                        <option value="2">Вівторок</option>--}}
{{--                        <option value="3">Середа</option>--}}
{{--                        <option value="4">Четвер</option>--}}
{{--                        <option value="5">Пятниця</option>--}}
{{--                        <option value="6">Субота</option>--}}
{{--                        <option value="7">Неділя</option>--}}
{{--                    </select>--}}

{{--                    <div id="added_{{ $recipe->id }}">--}}
{{--                        @if(isset($recipe->userRecipeSortedByDay))--}}
{{--                            @if($recipe->userRecipeSortedByDay->author_id === auth()->user()->id)--}}
{{--                                Добавлено на: {{ $days[$recipe->userRecipeSortedByDay->day_id] }}--}}
{{--                            @endif--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                @else--}}
{{--                    Потрібна авторизуватися щоб добавити рецепт--}}
{{--                @endif--}}
{{--            </div>--}}

{{--        </li>--}}
{{--    </a>--}}

<div class="food-box">
    <img class="food__img" src="{{ $recipe->image_path }}" alt="їжа">
    <div class="food__details">
        <a href="{{ route('index.answer', [ 'questionIn' => $recipe->slug]) }}" style="text-decoration: none"><h2 class="food__title">{{ $recipe->title }} Кл/на порцію: {{ $recipe->calories / $recipe->number_of_servings }}</h2></a>
        <span class="food__title">Тип прийому: </span><span><b>{{ config('recipes.type_of_meal')[$recipe->type_of_meal] }}</b></span>
        <select name="" id="select{{ $recipe->id }}"  onchange="saveDay(this, {{ $recipe->id }})">
            <option disabled selected hidden>Виберіть день</option>
            <option value="1">Понеділок</option>
            <option value="2">Вівторок</option>
            <option value="3">Середа</option>
            <option value="4">Четвер</option>
            <option value="5">Пятниця</option>
            <option value="6">Субота</option>
            <option value="7">Неділя</option>
        </select>

        <div id="added_{{ $recipe->id }}">
            @if(isset($recipe->userRecipeSortedByDay))
                @if($recipe->userRecipeSortedByDay->author_id === auth()->user()->id)
                    Добавлено на: {{ $days[$recipe->userRecipeSortedByDay->day_id] }}
                @endif
            @endif
        </div>
        <ul class="food__list">
            @foreach($recipe->ingredients as $ingredient)
                <li class="food__item">
                    <b>{{ $ingredient->name }}</b>
                </li>
            @endforeach
        </ul>

    </div>

</div>
@endforeach

<script>

    function saveDay(selectElement, recipeId) {
        var selectedOption = selectElement.value;
        let url = '/api/recipes/' + recipeId;

        $.ajax({
            url: url,
            type: 'post',
            data: {
                day_id: selectedOption,
            },
            beforeSend: function () {
                $(".ajax-load").show();
            }
        })
            .done(function (data) {
                // $('#added_' + recipeId).empty();
                $('#added_' + recipeId).append('  |   Добавлено на: ' + data.data.dayName);
            })
            // Call back function
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log("Server not responding.....");
            });
    }
</script>
