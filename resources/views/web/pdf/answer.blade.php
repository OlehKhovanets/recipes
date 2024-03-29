<style type="text/css">
    * {
        font-family: "dejavu serif", sans-serif;
    }
</style>

<h3>{{ $title }}</h3>
<br>

@foreach(json_decode($answer) as $answer)
    @if($answer->type === 'paragraph')
        <p class="answear__text">
            {!! preg_replace('/<code>(.*?)<\/code>/', "<span style='font-size: 0.875em;color: #d63384;word-wrap: break-word;'>$1</span>", $answer->data->text) !!}
        </p>
    @endif

    @if($answer->type === 'list')
        @foreach($answer->data->items as $item)
            <p class="answear__text" style="padding-left: 60px;">
                * {!! $item !!}
            </p>

        @endforeach
    @endif

    @if($answer->type === 'code')
        <pre style="display: grid;place-items: center;">
                        <code>
{{$answer->data->code}}
                        </code>
                    </pre>
    @endif

@endforeach
