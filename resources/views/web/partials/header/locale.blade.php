<ul class="lang">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li class="lang-item">
            <a rel="alternate" class="lang-link" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                @if($localeCode === 'en')
                    <img {{ Popper::theme('light')->pop('English language') }} class="image_wrapper" alt="{{ __('messages.en') }}" src="{{ asset('web/images/en.png') }}">
                @elseif($localeCode === 'ua')
                    <img {{ Popper::theme('light')->pop('Українська мова') }} class="image_wrapper" alt="{{ __('messages.ua') }}" src="{{ asset('web/images/ua.png') }}">
                @endif

            </a>
        </li>
    @endforeach
</ul>
