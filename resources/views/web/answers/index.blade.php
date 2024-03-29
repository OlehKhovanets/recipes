@include('web.components.head', [
    'bodyClass' => 'body_question_and_answer',
    'title' => 'Interview Expert - ' . $answer->question,
    'seoDescription' => $answer->seo_description,
    'seoKeywords' => $answer->seo_keywords,
    'page' => 'answer'
])
@include('web.partials.qr', [
    'class' => 'qr-code__answer'
])
<section class="answear">
    <div class="container">

        @include('web.partials.breadcrumbs', [
            'items' => [
                'home',
                'slug_answer',
                'answer'
            ]
        ])
        <div>
            <img src="/{{$answer->image_path}}" alt="">
        </div>
        <div class="answear-top">
            <div class="container-inner">
                <div class="related-branches">
                    <h4>Інгрідієнти &nbsp;</h4>
                    @foreach($answer->ingredients as $ingredient)
                        Назва: {{ $ingredient->name }}
                        Вага: {{ $ingredient->pivot->grams }}
                        </br>
                    @endforeach

                    Кількість калорій в рецепті: {{ $callories }}
                </div>
                <h1 class="answear-top__title">{{ $answer->title }}</h1>
            </div>
        </div>
        <div class="answear-content">
            <div class="container-content">
                @foreach(json_decode($answer->description) as $answer)
                    @if($answer->type === 'paragraph')
                        <p class="answear__text">
                            {!! preg_replace('/<code>(.*?)<\/code>/', "<span style='font-size: 0.875em;color: #d63384;word-wrap: break-word;'>$1</span>", $answer->data->text) !!}
                        </p>
                    @endif

                        @if($answer->type === 'image')
                            <img src="{{ $answer->data->file->url }}" alt="{{ $answer->data->caption }}">
                        @endif

                    @if($answer->type === 'list')
                        @foreach($answer->data->items as $item)
                            <p class="answear__text">
                                <li>{!! $item !!}</li>
                            </p>

                        @endforeach
                    @endif

                    @if($answer->type === 'code')
                        <div class="code-parser"><pre>
                        <code class="language-javascript">
{{$answer->data->code}}
                        </code>
                    </pre></div>
                    @endif

                @endforeach
            </div>
        </div>
    </div>
</section>
@include('web.components.footer', [
    'isQuestionPage' => false,
    'isQuestionCreatePage' => false
])
