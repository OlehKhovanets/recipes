<h1 class="question-box__question">{{ __('messages.search') }}: {{ request()->input('search') }}</h1>

<div style="display: flex">
    @foreach($branches as $branch)
        <div><a
                href="/questions/{{ $branch->slug }}"><img {{ Popper::theme('light')->pop( $branch->name ) }}
                                                           alt="{{__('messages.alt_image_show')}} {{$branch->name}}"
                                                           src="{{ $branch->icon_path }}"></a></div>
    @endforeach
</div>

@foreach($questionsAndAnswers->where('is_road_map', false) as $questionAndAnswer)
    <a class="questions-link" href="{{ route('index.answer', [ 'questionIn' => $questionAndAnswer->slug]) }}">
        <li class="question-box">
            <div class="mark"></div>
            <div class="question-box__content">
                <div>
                    <h2 class="question-box__question">
                        {{ $questionAndAnswer->question }}
                    </h2>
                </div>
                <div class="date">
                    {{ $questionAndAnswer->created_at->diffForHumans() }}
                </div>
                <div class="tooltip-wrapper">
                    <div class="tooltip-container">
                        <div class="views" {{ Popper::theme('light')->pop(__('popup.views_count')) }}>
                            <svg aria-label="{{ __('messages.views') }}" width="15" height="15" viewBox="0 0 24 24"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 9.00462C14.2091 9.00462 16 10.7955 16 13.0046C16 15.2138 14.2091 17.0046 12 17.0046C9.79086 17.0046 8 15.2138 8 13.0046C8 10.7955 9.79086 9.00462 12 9.00462ZM12 10.5046C10.6193 10.5046 9.5 11.6239 9.5 13.0046C9.5 14.3853 10.6193 15.5046 12 15.5046C13.3807 15.5046 14.5 14.3853 14.5 13.0046C14.5 11.6239 13.3807 10.5046 12 10.5046ZM12 5.5C16.6135 5.5 20.5961 8.65001 21.7011 13.0644C21.8017 13.4662 21.5575 13.8735 21.1557 13.9741C20.7539 14.0746 20.3466 13.8305 20.246 13.4286C19.3071 9.67796 15.9214 7 12 7C8.07693 7 4.69009 9.68026 3.75285 13.4332C3.65249 13.835 3.24535 14.0794 2.84348 13.9791C2.44161 13.8787 2.19719 13.4716 2.29755 13.0697C3.40064 8.65272 7.38448 5.5 12 5.5Z"
                                    fill="#666666"/>
                            </svg>

                            <span>{{ $questionAndAnswer->views->count() }}</span>
                        </div>
                        {{--                        <div class="tooltip">{{ __('messages.count_of_views') }}</div>--}}
                    </div>
                    <div class="stars" {{ Popper::theme('light')->pop(__('popup.rate')) }}><img class="img-height"
                                                                                                alt='{{ __('messages.stars_count') }}'
                                                                                                src="/web/images/star.png">
                    </div>
                    <span class="stars-count">{{ $questionAndAnswer->stars_count }}</span>
                </div>
            </div>
        </li>
    </a>
@endforeach

@foreach($questionsAndAnswers->where('is_road_map', true) as $questionAndAnswer)
    <div class="question__wrapper" style="display: flex; flex-direction: column">
        <div style="padding-bottom: 60px; color: #666666">
            <div class="blog-image-container">
                <a href="/roadmap/{{ $questionAndAnswer->slug }}">
                    <img class="blog-image__img" style="width: 100%" src="{{ $questionAndAnswer->image_path }}" alt="">
                </a>
            </div>
            <div style="display: flex; justify-content: space-between;padding: 10px;">
                <p style="font-size: 20px; font-weight: bold"><i>{{ $questionAndAnswer->question }}</i></p>
                <a href="/roadmap/{{ $questionAndAnswer->slug }}" class="links"><i class="fa fa-link"
                                                                                   aria-hidden="true"></i><i>{{ __('messages.learn_more') }}</i></a>
            </div>
            <div style="display: flex;justify-content: space-between">
                <div></div>
                <div style="padding-right: 10px"><i>{{ __('messages.created') }}
                        : {{ $questionAndAnswer->created_at->diffForHumans() }}</i></div>
            </div>
        </div>
    </div>
@endforeach

<ul class="blog-list">
    @foreach($articles as $article)
        <li class="blog-item">
            <article>
                @if($article->type === \App\Models\Article::BLOG)
                    @if($article->image_path === '')
                        <img src="http://dummyimage.com/376x250/99cccc.gif"/>
                    @else
                        <div class="blog-image-container">
                            <a href="/articles/{{ $article->slug }}">
                                <img class="blog-image__img"
                                     alt="{{ __('messages.image_on_topic') }} {{ $article->title }}"
                                     src="{{ $article->image_path }}"/>
                            </a>
                        </div>
                    @endif
                @endif
                <div class="blog-card">
                    <div class="blog-card__box">
                        <span class="blog-card__text">
                            <a class="links" href="/">interviewexpert.info</a>
                        </span>
                        <span class="blog-card__date">
                            {{ $article->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <h3 class="blog-card__title">
                        {{ $article->title }}
                    </h3>
                    <div class="blog-card__meta">
                        <div class="blog-card__views">
                            <svg aria-label="{{ __('messages.views') }}" width="15" height="15" viewBox="0 0 24 24"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 9.00462C14.2091 9.00462 16 10.7955 16 13.0046C16 15.2138 14.2091 17.0046 12 17.0046C9.79086 17.0046 8 15.2138 8 13.0046C8 10.7955 9.79086 9.00462 12 9.00462ZM12 10.5046C10.6193 10.5046 9.5 11.6239 9.5 13.0046C9.5 14.3853 10.6193 15.5046 12 15.5046C13.3807 15.5046 14.5 14.3853 14.5 13.0046C14.5 11.6239 13.3807 10.5046 12 10.5046ZM12 5.5C16.6135 5.5 20.5961 8.65001 21.7011 13.0644C21.8017 13.4662 21.5575 13.8735 21.1557 13.9741C20.7539 14.0746 20.3466 13.8305 20.246 13.4286C19.3071 9.67796 15.9214 7 12 7C8.07693 7 4.69009 9.68026 3.75285 13.4332C3.65249 13.835 3.24535 14.0794 2.84348 13.9791C2.44161 13.8787 2.19719 13.4716 2.29755 13.0697C3.40064 8.65272 7.38448 5.5 12 5.5Z"
                                    fill="#212121"/>
                            </svg>
                            <span>{{ $article->views->count() }}</span>
                        </div>
                        @if($article->type === \App\Models\Article::BLOG)
                            <a class="blog-card__link links" href="/articles/{{ $article->slug }}"><i class="fa fa-link"
                                                                                                      aria-hidden="true"></i><i>{{ __('messages.learn_more') }}</i></a>
                        @elseif($article->type === \App\Models\Article::CLUE)
                            <a class="blog-card__link links" href="/clues/{{ $article->slug }}"><i class="fa fa-link"
                                                                                                   aria-hidden="true"></i><i>{{ __('messages.learn_more') }}</i></a>
                        @endif
                    </div>
                    <div>
                        @foreach($article->tags as $tag)
                            @if($article->type === \App\Models\Article::BLOG)
                                <a class="links" href="/articles?tag={{$tag->slug}}">#{{$tag->name}}</a>
                            @elseif($article->type === \App\Models\Article::CLUE)
                                <a class="links" href="/clues?tag={{$tag->slug}}">#{{$tag->name}}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </article>
        </li>
    @endforeach
</ul>
