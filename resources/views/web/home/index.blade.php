@include('web.components.head', [
    'bodyClass' => 'body_search',
    'title' => 'Interview Expert - ' . __('messages.base_q_and_a'),
    'seoDescription' => __('seo.index_page'),
    'seoKeywords' => __('seo.keywords_index_page'),
    'page' => 'index'
])
@include('web.partials.qr', [
    'class' => 'qr-code__main'
])
@include('web.partials.navigation')

<form method="GET" action="/whole-search">
    <div>
        <div class="database-data">
            <div class="branch-icons">
                @foreach($branches as $branch)
                    <div {{ Popper::theme('light')->pop( $branch->name ) }} class="branch-item"><a
                            href="/questions/{{ $branch->slug }}"><img
                                alt="{{__('messages.alt_image_show')}} {{$branch->name}}"
                                src="{{ $branch->icon_path }}"></a></div>
                @endforeach
            </div>
            <h1 class="title">Interview Expert - {{ __('messages.base_q_and_a') }}</h1>
            <span id="static"><span id="typeline"></span></span>
        </div>
        <div id="search_wrapper">
            <div class="select-box">
                <div class="select-box__current">
                    <input class="select-box__input" type="radio" id="1" value="1" checked>
                    <input class="select-box__input-text" id="search" autocomplete="off" name="search" autofocus
                           placeholder="{{ __('messages.search_input') }}">
                    <div class="search-loader" id="loader">
                        <img alt="Loader" src="{{ asset('web/images/loader.gif') }}">
                    </div>
                </div>
                <ul class="select-box__list">
                </ul>
            </div>
            <button class="button button-search" id="button-search" type="submit">{{ __('messages.search') }}</button>
        </div>
{{--        <div style="text-align: center"><a href="/roadmap" class="links" style="font-weight: bold; font-size: 20px"><i--}}
{{--                    class="fa fa-link" aria-hidden="true"></i>{{ __('messages.choose_roadmap') }}</a></div>--}}
    </div>
</form>
<input type="hidden" id="current_localization" value="{{ LaravelLocalization::getCurrentLocale() }}">

@include('web.components.footer', [
    'isQuestionPage' => false,
    'typeWritter' => true,
    'isQuestionCreatePage' => false
])
