@php
    $сaloriesPerWeek = 0;
@endphp

@foreach($userRecipeSortedByDays as $key => $recipes)

    <div style="padding: 10px; text-align: center; background-color: #8FBC8F; color: white; margin-top: 10px; margin-bottom: 10px">
        <b>День: {{$days[$key]}}</b>
    </div>
    @php
        $сaloriesPerDay = 0;
    @endphp
    @foreach($recipes as $recipe)
        @php
            $caloriesPerDish = $recipe->recipe->calories / $recipe->recipe->number_of_servings;
            $сaloriesPerDay += $caloriesPerDish;
        @endphp

        <div class="food-box">
{{--            <div>--}}
                <form action="/day/{{$recipe->id}}" method="POST" id="remove_dish_from_day_{{$recipe->id}}">
                    {{csrf_field()}}
                    <span style="cursor:pointer; color: white; font-size: 20px; padding-left: 5px; padding-right: 5px; margin-bottom: 14px; background-color: #8FBC8F" onclick="document.getElementById('remove_dish_from_day_{{$recipe->id}}').submit()">x</span>
                </form>
                <img class="food__img" src="{{ $recipe->recipe->image_path }}" alt="їжа">
{{--            </div>--}}
            <div class="food__details">
                <a href="/recipe/{{$recipe->recipe->slug}}" style="text-decoration: none"><h2 class="food__title">{{ $recipe->recipe->title }}</h2></a>
                <div>
                    <span class="food__title"> Кл/на порцію: </span><span><b>{{ $caloriesPerDish }}</b></span>
                </div>
                <span class="food__title">Тип прийому: </span><span><b>{{ config('recipes.type_of_meal')[$recipe->recipe->type_of_meal] }}</b></span>
                <ul class="food__list">
                    @foreach($recipe->recipe->ingredients as $ingredient)
                        <li class="food__item">
                            <b>{{ $ingredient->name }}</b>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>


{{--            <a class="questions-link" href="{{ route('index.answer', [ 'questionIn' => $questionAndAnswer->slug]) }}">--}}
{{--            <a class="questions-link">--}}
{{--                <li class="question-box">--}}
{{--                    {{ $recipe->recipe->title }}--}}

{{--                        @if(auth()->check())--}}
{{--                            <select name="" id="select{{ $recipe->id }}"  onchange="saveDay(this, {{ $recipe->id }})">--}}
{{--                                <option disabled selected hidden>Виберіть день</option>--}}
{{--                                <option value="1">Понеділок</option>--}}
{{--                                <option value="2">Вівторок</option>--}}
{{--                                <option value="3">Середа</option>--}}
{{--                                <option value="4">Четвер</option>--}}
{{--                                <option value="5">Пятниця</option>--}}
{{--                                <option value="6">Субота</option>--}}
{{--                                <option value="7">Неділя</option>--}}
{{--                            </select>--}}

{{--                            <div id="added_{{ $recipe->id }}">--}}
{{--                                @if(isset($recipe->userRecipeSortedByDay))--}}
{{--                                    @if($recipe->userRecipeSortedByDay->author_id === auth()->user()->id)--}}
{{--                                        Добавлено на: {{ $days[$recipe->userRecipeSortedByDay->day_id] }}--}}
{{--                                    @endif--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        @else--}}
{{--                            Потрібна авторизуватися щоб добавити рецепт--}}
{{--                        @endif--}}

{{--                </li>--}}
{{--            </a>--}}
    @endforeach

    @php
        $сaloriesPerWeek += $сaloriesPerDay;
    @endphp

    <div style="display: flex; justify-content: space-between">
        <h3>Загальні калорії за день</h3>
        <h3><i>{{ $сaloriesPerDay }}</i></h3>
    </div>
@endforeach

<div style="display: flex; justify-content: space-between; padding:20px; background-color: #8FBC8F; color: black; margin-top: 30px; margin-bottom: 60px">
        <h3>Загальні калорії за тиждень</h3>
        <h3><i>{{ $сaloriesPerWeek }}</i></h3>
</div>
