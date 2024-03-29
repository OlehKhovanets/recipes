<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">

<head>
    @laravelPWA
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $seoDescription }}">
    <meta name="keywords" content="{{ $seoKeywords }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ mix('compiled/css/index.css') }}" preload>
    <link rel="stylesheet" href="{{ mix('compiled/css/blog.css') }}" preload>
    @if($page === 'pages')
        <link rel="stylesheet" href="{{ mix('compiled/css/pages.css') }}" preload>
    @endif
    @if($page === 'cv_template')
        <link rel="stylesheet" href="{{ mix('compiled/css/cv.css') }}" preload>
    @endif
    @if($page === 'index')
        <link rel="stylesheet" href="{{ mix('compiled/css/type-writter.css') }}" preload>
        <link rel="stylesheet" href="{{ mix('compiled/css/navigation.css') }}" preload>
    @endif
    <link rel="stylesheet" href="{{ asset('compiled/css/sweetalert2.min.css') }}" preload>
    @if($page === 'answer' || $page === 'blog' || $page === 'clue')
        <link href="https://cdn.jsdelivr.net/npm/prismjs@1.28.0/themes/prism.min.css" rel="stylesheet" preload>
    @endif
    <link rel='stylesheet' type='text/css' href='//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css'/>
    <script src="https://kit.fontawesome.com/7902ee48d2.js" crossorigin="anonymous"></script>
    <!--Google Analytics-->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-G4NSE0KVET"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-G4NSE0KVET');
    </script>
    <!--End of Google Analytics-->
</head>
<body class="{{ $bodyClass }}">
<div class="header-top">
    <div class="container">
        <div class="header-top__inner">
            @include('web.partials.header.logo')
            @include('web.partials.header.locale')
            @include('web.partials.header.auth-icon')
        </div>
    </div>
</div>

@include('web.partials.header.banner')
@include('web.partials.header.notification')
