<style type="text/css">
    * {
        font-family: "dejavu serif", sans-serif;
    }
</style>

<a href="/profile"> Назад</a>

<ul>
    @foreach($ingredients as $ingredient => $grams)
        <li>
            @if($grams > 1000)
                <span>{{$ingredient}}</span>: <span>{{ $grams }}</span> кг
            @else
                <span>{{$ingredient}}</span>: <span>{{ $grams }}</span> грам
            @endif
        </li>
    @endforeach
</ul>

