@php
    $inPerson = (isset($inPerson)) ? $inPerson : false;
@endphp
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(Auth::user())
        <meta name="jwt-token" content="{{ Auth::user()->api_token }}">
    @endif

    <title>@yield('title'){{ config('app.name', 'Participa') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Muli:400,700,900" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="/fonts/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="/fonts/fontawesome/css/fa-regular.min.css" rel="stylesheet">
    <link href="/fonts/fontawesome/css/fa-brands.min.css" rel="stylesheet">

    @include('components.metatags')
</head>
<body class="{{ 'lang-' . config('app.locale') }}{{ ($inPerson) ? ' booth-mode' : '' }}">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WEX0XYNGE8"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-WEX0XYNGE8');
    </script>

    <a href="#content" class="sr-only sr-only-focusable">@lang('participa.skip_to_content')</a>
    <a href="#languages" class="sr-only sr-only-focusable">@lang('participa.select_language')</a>

    @section('header')
        @include('components/header', ['inPerson' => $inPerson])
        @include('components/voteinfo', ['inPerson' => $inPerson])
    @show

    @hasSection('content')
    <main class="main-background" id="content">
        <div class="container main-container">
            @isset($isArchive)
                <div class="alert alert-primary mb-4"><i class="far fa-archive" aria-hidden="true"></i> @lang('participa.is_archive', ['end_date' => human_date($edition->end_date) . ' ' . date('Y', strtotime($edition->end_date))])</div>
            @endisset

            @yield('content')
        </div>
    </main>
    @endif

    @section('footer')
        <div class="footer-background">
            <div class="container">
                @include('components/footer')
            </div>
        </div>
    @show

    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
    <script src="{{ mix('js/common.js') }}"></script>
    @stack('scripts')
</body>
</html>
