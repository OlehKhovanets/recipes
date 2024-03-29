@include('web.components.head', [
    'bodyClass' => 'body_question_and_answer',
    'title' => __('messages.search'),
    'seoDescription' =>  __('seo.search'),
    'seoKeywords' =>  __('seo.search_keywords'),
    'page' => 'search'
])

<section class="question">
    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs__list">
                <div class="breadcrumbs__item">
                    <a class="breadcrumbs__link links" href="/">
                        {{ __('messages.home') }}
                    </a>
                </div>
                <div class="breadcrumbs__item">
                    <a class="breadcrumbs__link links" href="#">
                        {{ __('messages.search') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="question__wrapper">
            <div id="spinner-container">
                <div class="spinner"></div>
            </div>
            <div class="question-content hide">
                <ul class="question-list">
                    @include('web.home.data')
                </ul>
            </div>
        </div>
    </div>
</section>
@include('web.components.footer', [
    'isQuestionPage' => false,
    'isQuestionCreatePage' => true
])
