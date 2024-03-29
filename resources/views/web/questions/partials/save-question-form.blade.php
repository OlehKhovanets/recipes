<div class="question-form-wrapper {{ $class }}">
    <div class="captcha">
        <input id="captcha" type="text" class="captcha-input" placeholder="{{ __('messages.enter_captcha') }}" name="captcha">
        <span id="{{ $img }}">{!! captcha_img() !!}</span>
        <button id="{{ $captcha }}" type="button" class="reload-captcha">
            &#x21bb;
        </button>
    </div>
    <button class="publish-question" onclick="saveData()">{{ __('messages.publish') }}</button>
    <form method="GET" action="{{ route('index.recipes', [$slug]) }}">
        <button class="cancel-question">{{ __('messages.cancel') }}</button>
    </form>
    <div class="answear-language">
        <span>{{ __('messages.selected_language') }}</span>
        @if(\Illuminate\Support\Facades\App::getLocale() === 'en')
            <input type="hidden" id="lang" name="lang" value="en">
            <img {{ Popper::theme('light')->pop('English language') }} class="image_wrapper answear-language-img" alt="En icon"
                 src="/web/images/en.png">
        @elseif(\Illuminate\Support\Facades\App::getLocale() === 'ua')
            <input type="hidden" id="lang" name="lang" value="ua">
            <img {{ Popper::theme('light')->pop('Українська мова') }} class="image_wrapper answear-language-img" alt="UA icon"
                 src="/web/images/ua.png">
        @else
            <input type="hidden" id="lang" name="lang" value="ua">
            <img {{ Popper::theme('light')->pop('Українська мова') }} class="image_wrapper answear-language-img" alt="UA icon"
                 src="/web/images/ua.png">
        @endif
    </div>
    <div class="selected-category">
        <span>{{ __('messages.category') }}: ({{ $branch->name }})</span>
        <div><img class="answear-language-img" src="{{ $branch->icon_path }}"></div>
    </div>
</div>
