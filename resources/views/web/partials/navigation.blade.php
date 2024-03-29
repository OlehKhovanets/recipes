<div class="navigation">
{{--    <a {{ Popper::theme('light')->pop(__('messages.create_cv')) }} href="/cv/templates" class="nav-pointer">--}}
{{--        <div class="cv-tab">--}}
{{--            <div class="cv-tab__inner">--}}
{{--                <div class=""><img alt="{{ __('messages.cv_templates') }}" src="{{ asset('web/images/template.png') }}"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </a>--}}
{{--    <div class="nav-wrapper">--}}
{{--        <div class="nav-tab__line"></div>--}}
{{--    </div>--}}
{{--    <div class="cv-tab__line_point_wrapper">--}}
{{--        <div class="cv-tab__line_point"></div>--}}
{{--    </div>--}}
{{--    <div class="nav-wrapper">--}}
{{--        <span>{{ __('messages.generate_cv') }}</span>--}}
{{--    </div>--}}
    <a {{ Popper::theme('light')->pop(__('messages.clue')) }} href="/clues" class="nav-pointer">
        <div class="nav-clue-wrapper">
            <div class="nav-clue">
                <div class=""><img alt="{{ __('messages.hints') }}" src="{{ asset('web/images/hint.png') }}"></div>
            </div>
        </div>
    </a>
    <div class="nav-wrapper">
        <div class="nav-tab__line"></div>
    </div>
    <div class="nav-wrapper">
        <div class="clue-tab__line_point"></div>
    </div>
    <div class="nav-wrapper">
        <span>{{ __('messages.clue') }}</span>
    </div>
    <a {{ Popper::theme('light')->pop(__('messages.choose_roadmap')) }} href="/roadmap" class="nav-pointer">
        <div class="nav-roadmap-wrapper">
            <div class="nav-roadmap">
                <div class=""><img alt="{{ __('messages.roadmap') }}" src="{{ asset('web/images/roadmap.png') }}"></div>
            </div>
        </div>
    </a>
    <div class="nav-wrapper">
        <div class="nav-tab__line"></div>
    </div>
    <div class="nav-wrapper">
        <div class="roadmap-tab__line_point"></div>
    </div>
    <div class="nav-wrapper">
        <span>{{ __('messages.roadmap') }}</span>
    </div>
</div>
