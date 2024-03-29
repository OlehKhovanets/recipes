{{--<style>--}}
{{--    .olcards,--}}
{{--    .olcards * {--}}
{{--        margin: 0;--}}
{{--        padding: 0;--}}
{{--        box-sizing: border-box;--}}
{{--    }--}}

{{--    .olcards {--}}
{{--        list-style: none;--}}
{{--        counter-reset: cardCount;--}}
{{--        font-family: sans-serif;--}}
{{--        display: flex;--}}
{{--        flex-direction: column;--}}
{{--        --cardsGap: 1rem;--}}
{{--        gap: var(--cardsGap);--}}
{{--        padding-bottom: var(--cardsGap);--}}
{{--    }--}}
{{--    .olcards li {--}}
{{--        counter-increment: cardCount;--}}
{{--        display: flex;--}}
{{--        color: white;--}}
{{--        --labelOffset: 1rem;--}}
{{--        --arrowClipSize: 1.5rem;--}}
{{--        margin-top: var(--labelOffset);--}}
{{--    }--}}

{{--    .olcards li::before {--}}
{{--        content: counter(cardCount, decimal-leading-zero);--}}
{{--        background: white;--}}
{{--        color: var(--cardColor);--}}
{{--        font-size: 2em;--}}
{{--        font-weight: 700;--}}
{{--        transform: translateY(calc(-1 * var(--labelOffset)));--}}
{{--        margin-right: calc(-1 * var(--labelOffset));--}}
{{--        z-index: 1;--}}
{{--        display: flex;--}}
{{--        justify-content: center;--}}
{{--        align-items: center;--}}
{{--        padding-inline: 0.5em;--}}
{{--    }--}}

{{--    .olcards li .content {--}}
{{--        background-color: var(--cardColor);--}}
{{--        --inlinePadding: 1em;--}}
{{--        --boxPadding: 0.5em;--}}
{{--        display: grid;--}}
{{--        padding: var(--boxPadding) calc(var(--inlinePadding) + var(--arrowClipSize))--}}
{{--        var(--boxPadding) calc(var(--inlinePadding) + var(--labelOffset));--}}
{{--        grid-template-areas:--}}
{{--    "icon title"--}}
{{--    "icon text";--}}
{{--        gap: 0.25em 1em;--}}
{{--        clip-path: polygon(--}}
{{--            0 0,--}}
{{--            calc(100% - var(--arrowClipSize)) 0,--}}
{{--            100% 50%,--}}
{{--            calc(100% - var(--arrowClipSize)) 100%,--}}
{{--            calc(100% - var(--arrowClipSize)) calc(100% + var(--cardsGap)),--}}
{{--            0 calc(100% + var(--cardsGap))--}}
{{--        );--}}
{{--        position: relative;--}}
{{--    }--}}
{{--    .olcards li .content::before {--}}
{{--        content: "";--}}
{{--        position: absolute;--}}
{{--        width: var(--labelOffset);--}}
{{--        height: var(--labelOffset);--}}
{{--        background: var(--cardColor);--}}
{{--        left: 0;--}}
{{--        bottom: 0;--}}
{{--        clip-path: polygon(0 0, 100% 0, 0 100%);--}}
{{--        filter: brightness(0.75);--}}
{{--    }--}}
{{--    .olcards li .content::after {--}}
{{--        content: "";--}}
{{--        position: absolute;--}}
{{--        height: var(--cardsGap);--}}
{{--        width: var(--cardsGap);--}}
{{--        background: linear-gradient(to right, rgba(0, 0, 0, 0.25), transparent 50%);--}}
{{--        left: 0;--}}
{{--        top: 100%;--}}
{{--    }--}}
{{--    .olcards li .icon {--}}
{{--        grid-area: icon;--}}
{{--        align-self: center;--}}
{{--        font-size: 1em;--}}
{{--    }--}}
{{--    .olcards li .content .title {--}}
{{--        grid-area: title;--}}
{{--        font-size: 0.7em;--}}
{{--        /* font-weight: 700; */--}}
{{--    }--}}
{{--    .olcards li .content .text {--}}
{{--        grid-area: text;--}}
{{--        color: white;--}}
{{--    }--}}

{{--    .text {--}}
{{--        font-size: 13px;--}}
{{--        font-weight: bold;--}}
{{--    }--}}

{{--</style>--}}

{{--<ol class="olcards" style="position: fixed; margin-bottom: 100px; bottom: 0">--}}
{{--    <li style="--cardColor:#fc374e">--}}
{{--        <div class="content">--}}
{{--            <div class="icon"><img class="blog-section-breadcrumbs-img" src="{{ asset('web/images/template.png') }}"></div>--}}
{{--            <div class="text">{{ __('messages.create_cv') }}</div>--}}
{{--        </div>--}}
{{--    </li>--}}
{{--    <li style="--cardColor:#36aeb3">--}}
{{--        <div class="content">--}}
{{--            <div class="icon"><img class="blog-section-breadcrumbs-img" src="{{ asset('web/images/roadmap.png') }}"></div>--}}
{{--            <div class="text">{{ __('messages.choose_roadmap') }}</div>--}}
{{--        </div>--}}
{{--    </li>--}}
{{--    <li style="--cardColor:#162d59">--}}
{{--        <div class="content">--}}
{{--            <div class="icon"><img class="blog-section-breadcrumbs-img" src="{{ asset('web/images/hint.png') }}"></div>--}}
{{--            <div class="text">{{ __('messages.tips_for_all_occasions') }}</div>--}}
{{--        </div>--}}
{{--    </li>--}}
{{--    <li style="--cardColor:#f15f0e">--}}
{{--        <div class="content">--}}
{{--            <div class="icon"><img class="blog-section-breadcrumbs-img" src="{{ asset('web/images/cookies.png') }}"></div>--}}
{{--            <div class="text">{{ __('cookies.h1') }}</div>--}}
{{--        </div>--}}
{{--    </li>--}}
{{--</ol>--}}

