<div class="breadcrumbs">
    <div class="breadcrumbs__list">
        @foreach($items as $item)
            @if($item === 'home')
                <div class="breadcrumbs__item">
                    <a class="breadcrumbs__link" href="/">
                        {{ __('messages.home') }}
                    </a>
                </div>
            @endif
            @if($item === 'slug_answer')
                @if(session('slug'))
                    <div class="breadcrumbs__item">
                        <div class="flex-wrapper">
                            <a href="{{ route('index.recipes', [session('slug')]) }}">
                                <img class="category-icon"
                                     alt="{{ __('messages.alt_image_show') }} {{ $branch->name }}"
                                     src="{{  $branch->icon_path }}">
                            </a>
                            <a class="breadcrumbs__link links breadcrumbs_text" href="{{ route('index.recipes', [session('slug')]) }}">
                                {{session('slug')}}
                            </a>
                        </div>
                    </div>
                @endif
            @endif
            @if($item === 'slug_questions')
                @if(session('slug'))
                    <div class="breadcrumbs__item">
                        <div class="flex-wrapper">
                            <a href="{{ route('index.recipes', [session('slug')]) }}">
                                <img class="category-icon"
                                     alt="{{ __('messages.alt_image_show') }} {{ $mainBranch->name }}"
                                     src="{{  $mainBranch->icon_path }}">
                            </a>
                            <a class="breadcrumbs__link links breadcrumbs_text" href="{{ route('index.recipes', [session('slug')]) }}">
                                {{session('slug')}}
                            </a>
                        </div>
                    </div>
                @endif
            @endif
            @if($item === 'add_question')
                <div class="breadcrumbs__item">
                    <a class="breadcrumbs__link" href="#">
                        {{ __('messages.add_question') }}
                    </a>
                </div>
            @endif
            @if($item === 'answer')
                <div class="breadcrumbs__item">
                    <a class="breadcrumbs__link" href="#">
                        {{ $answer->question }}
                    </a>
                </div>
            @endif
            @if($item === 'blog')
                <div class="breadcrumbs__item">
                    <div class="blog-section-breadcrumbs">
                        <a href="/articles">
                            <img alt="{{ __('messages.articles') }}" class="blog-section-breadcrumbs-img" src="{{ asset('web/images/blog.png') }}">
                        </a>
                        <a class="breadcrumbs__link links breadcrumbs_text" href="/articles">
                            {{ __('messages.blog') }}
                        </a>
                    </div>
                </div>
            @endif
                @if($item === 'clue')
                    <div class="breadcrumbs__item">
                        <div class="blog-section-breadcrumbs">
                            <a href="/clues">
                                <img alt="{{ __('messages.hints') }}" class="blog-section-breadcrumbs-img" src="{{ asset('web/images/hint.png') }}">
                            </a>
                            <a class="breadcrumbs__link links breadcrumbs_text" href="/clues">
                                {{ __('messages.clue') }}
                            </a>
                        </div>
                    </div>
                @endif
            @if($item === 'article')
                <div class="breadcrumbs__item">
                    <a class="breadcrumbs__link" href="#">
                        {{ $article->title }}
                    </a>
                </div>
            @endif
            @if($item === 'pwa')
                <div class="breadcrumbs__item">
                    <a class="breadcrumbs__link" href="">
                        Progressive web app
                    </a>
                </div>
            @endif
                @if($item === 'cookies')
                    <div class="breadcrumbs__item">
                        <div class="blog-section-breadcrumbs">
                            <a href="/pages/cookies">
                                <img alt="cookies" class="blog-section-breadcrumbs-img" src="{{ asset('web/images/cookies.png') }}">
                            </a>
                            <a class="breadcrumbs__link" href="">
                                Cookies
                            </a>
                        </div>
                    </div>
                @endif
                @if($item === 'roadmap')
                    <div class="breadcrumbs__item">
                        <div class="blog-section-breadcrumbs">
                            <a href="/roadmap">
                                <img alt="{{ __('messages.roadmap') }}" class="blog-section-breadcrumbs-img" src="{{ asset('web/images/roadmap.png') }}">
                            </a>
                            <a class="breadcrumbs__link" href="/roadmap">
                                {{ __('messages.roadmap') }}
                            </a>
                        </div>
                    </div>
                @endif
                @if($item === 'cv_templates')
                    <div class="breadcrumbs__item">
                        <div class="blog-section-breadcrumbs">
                            <a href="/cv/templates">
                                <img alt="{{ __('messages.cv_templates') }}" class="blog-section-breadcrumbs-img" src="{{ asset('web/images/template.png') }}">
                            </a>
                            <a class="breadcrumbs__link" href="/cv/templates">
                                {{ __('messages.cv_templates') }}
                            </a>
                        </div>
                    </div>
                @endif
        @endforeach
    </div>
</div>
