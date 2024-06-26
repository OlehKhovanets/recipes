<div class="footer">
    <div class="blog-section">
        <img alt="{{ __('messages.articles') }}" src="{{ asset('web/images/blog.png') }}">
        <a class="footer-link links" href="/articles">{{ __('messages.blog') }}</a>
    </div>
    <p class="monoton">{{ __('messages.project_created') }} 2023</p>
    <div style="display: flex; gap: 5px">
{{--        <a {{ Popper::theme('light')->pop('PWA') }} href="/pages/pwa"><img alt="cookies" src="{{ asset('web/images/pwa.png') }}"></a>--}}
        <a {{ Popper::theme('light')->pop('Cookies') }} href="/pages/cookies"><img alt="cookies" src="{{ asset('web/images/cookies.png') }}"></a>
        <a href="#">        <svg style="min-width: 25px" aria-label="{{ __('messages.support') }}" id="help-service" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:#a2d0ff;}.cls-2{fill:#8bc4ff;}.cls-3{fill:#2e58ff;}</style></defs><title/><g id="Question"><path class="cls-1" d="M44,34A21,21,0,0,1,18.33,54.47L9,59V49.65A21,21,0,1,1,44,34Z"/><path class="cls-2" d="M55,41.65V51l-9.33-4.53a20.51,20.51,0,0,1-6.13.47c10.3-13.18,1.73-32.74-15.08-33.88A20.94,20.94,0,0,1,41,5C60.34,5,69.24,28.93,55,41.65Z"/><path class="cls-3" d="M41,3a22.84,22.84,0,0,0-17.45,8C2.81,10.45-8,36,7,50.52V59a2,2,0,0,0,2.87,1.8l8.71-4.23A22.9,22.9,0,0,0,40.44,49a22.39,22.39,0,0,0,5-.41C54.82,53.14,54.36,53,55,53a2,2,0,0,0,2-2V42.52C71.81,28.2,61.55,3,41,3ZM23,53c-7.17,0-1.38-2.35-12,2.81,0-6.25.24-6.84-.67-7.65A19,19,0,1,1,23,53ZM53.67,40.16c-.9.8-.67,1.13-.67,7.65-8.78-4.27-6-3.4-9.72-3A23.06,23.06,0,0,0,28.51,11.67C40.58,1.1,60,9.57,60,26A19,19,0,0,1,53.67,40.16Z"/><circle class="cls-3" cx="23" cy="47" r="2"/><path class="cls-3" d="M22.15,19A9,9,0,0,0,14,32.14a2,2,0,1,0,3.54-1.84A5,5,0,0,1,22.09,23c4.73.08,6.85,6.44,2.65,9.18A8,8,0,0,0,21,38.83a2,2,0,1,0,4,0,4,4,0,0,1,1.93-3.3C34.43,30.63,30.8,19.15,22.15,19Z"/></g></svg>
        </a>
{{--        <img alt="cookies" src="/web/images/pwa.png">--}}
{{--        <img alt="cookies" src="/web/images/cookies.png">--}}
{{--        <svg style="min-width: 25px" aria-label="{{ __('messages.support') }}" id="help-service" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:#a2d0ff;}.cls-2{fill:#8bc4ff;}.cls-3{fill:#2e58ff;}</style></defs><title/><g id="Question"><path class="cls-1" d="M44,34A21,21,0,0,1,18.33,54.47L9,59V49.65A21,21,0,1,1,44,34Z"/><path class="cls-2" d="M55,41.65V51l-9.33-4.53a20.51,20.51,0,0,1-6.13.47c10.3-13.18,1.73-32.74-15.08-33.88A20.94,20.94,0,0,1,41,5C60.34,5,69.24,28.93,55,41.65Z"/><path class="cls-3" d="M41,3a22.84,22.84,0,0,0-17.45,8C2.81,10.45-8,36,7,50.52V59a2,2,0,0,0,2.87,1.8l8.71-4.23A22.9,22.9,0,0,0,40.44,49a22.39,22.39,0,0,0,5-.41C54.82,53.14,54.36,53,55,53a2,2,0,0,0,2-2V42.52C71.81,28.2,61.55,3,41,3ZM23,53c-7.17,0-1.38-2.35-12,2.81,0-6.25.24-6.84-.67-7.65A19,19,0,1,1,23,53ZM53.67,40.16c-.9.8-.67,1.13-.67,7.65-8.78-4.27-6-3.4-9.72-3A23.06,23.06,0,0,0,28.51,11.67C40.58,1.1,60,9.57,60,26A19,19,0,0,1,53.67,40.16Z"/><circle class="cls-3" cx="23" cy="47" r="2"/><path class="cls-3" d="M22.15,19A9,9,0,0,0,14,32.14a2,2,0,1,0,3.54-1.84A5,5,0,0,1,22.09,23c4.73.08,6.85,6.44,2.65,9.18A8,8,0,0,0,21,38.83a2,2,0,1,0,4,0,4,4,0,0,1,1.93-3.3C34.43,30.63,30.8,19.15,22.15,19Z"/></g></svg>--}}
    </div>
</div>
@include('popper::assets')
</body>
<script src="{{ asset('compiled/js/jquery.min.js') }}"></script>
<script src="{{ asset('compiled/js/sweetalert2.min.js') }}"></script>
<script src="{{ mix('compiled/js/index.js') }}"></script>
@if(isset($typeWritter))
    <script src="{{ mix('compiled/js/type-writter.js') }}"></script>
@endif
@if(isset($isCustomPages))
    <script src="{{ mix('compiled/js/custompages.js') }}"></script>
@endif
<script src="https://cdn.jsdelivr.net/npm/prismjs@1.28.0/prism.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/prismjs@1.28.0/components/prism-clike.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/prismjs@1.28.0/components/prism-javascript.min.js"></script>
@if($isQuestionPage)
    <script src="{{ mix('compiled/js/answer.js') }}"></script>
@endif

@if(isset($page) && $page == 'cv')
    <script src="{{ mix('compiled/js/cv.js') }}"></script>
@endif

@if($isQuestionCreatePage)
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script><!-- Header -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script><!-- Image -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/delimiter@latest"></script><!-- Delimiter -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script><!-- List -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script><!-- Checklist -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script><!-- Quote -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script><!-- Code -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script><!-- Embed -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script><!-- Table -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/link@latest"></script><!-- Link -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/warning@latest"></script><!-- Warning -->

    <script src="https://cdn.jsdelivr.net/npm/@editorjs/marker@latest"></script><!-- Marker -->
{{--    <script src="https://cdn.jsdelivr.net/npm/@editorjs/inline-code@latest"></script><!-- Inline Code -->--}}

    <!-- Load Editor.js's Core -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>

    @endif
<script src='//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js'></script>

@if(\Illuminate\Support\Facades\App::getLocale() === 'en')
    <script type='text/javascript'>
        //<![CDATA[
        window.addEventListener("load",function(){
            window.cookieconsent.initialise({
                "palette": {
                    "popup": {
                        "background": "#ffffff"
                    },
                    "button": {
                        "background": "#002b53",
                    }
                },
                "position": "bottom-left",
                "content": {
                    "href": "/pages/cookies",
                    'message' : 'This website uses cookies to ensure you get the best experience on our website.'
                },
            });
        }                                           );
        //]]>
    </script>
@elseif(\Illuminate\Support\Facades\App::getLocale() === 'ua')
    <script type='text/javascript'>
        //<![CDATA[
        window.addEventListener("load",function(){
            window.cookieconsent.initialise({
                "palette": {
                    "popup": {
                        "background": "#ffffff"
                    },
                    "button": {
                        "background": "#002b53",
                    }
                },
                "position": "bottom-left",
                "content": {
                    "href": "/pages/cookies",
                    'message' : 'Цей веб-сайт використовує файли cookie, щоб забезпечити вам найкращий досвід використання нашого веб-сайту.'
                },
            });
        }                                           );
        //]]>
    </script>
@endif
</html>
