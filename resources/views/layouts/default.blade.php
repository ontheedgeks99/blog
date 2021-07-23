<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- <link rel="stylesheet"
          href="http://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.16.2/build/styles/default.min.css">
    <script src="http://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.16.2/build/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script> -->

    <script src="/js/highlight.js"></script>
    <link rel="stylesheet" href="/css/monokai-sublime.min.css">
    <script>hljs.initHighlightingOnLoad();</script>
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    
    
</head>
<body class="original">

    <header class="border-bottom">
        <div class="container">
            <div class="row mt-4 mb-4">
                <div class="col">
                    <a href="/">
                        <img src="../storage/photos/logo.png" alt="Tech Assist" width="190px" height="30px">
                    </a>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-12">
                    <div class="nav nav-fill nav-tabs flex-column flex-sm-row">
                        <div class="col border-left border-right  global-navi p-0">
                            <a href="/profile/index" class="nav-link link">PROFILE</a>
                        </div>
                        <div class="col border-left border-right global-navi p-0">
                            <a href="/portfolio/index" class="nav-link link">PORTFOLIO</a>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </header>

    <div class="jumbotron jumbotron-fluid bg-primary">
        <div class="container">
            <h1>
             <a href="/" class="text-white">BOOK & TECH LIFE in YOKOHAMA</a>
            </h1>
            <p class="jumbotron_description text-white">横浜での読書好きエンジニアによる活動記録。</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @yield('content')
            </div>

            <div class="col-md-4 pb-4">
                @include('posts.right_column')
            </div>
        </div>
    </div>

    <footer class="page-footer bg-secondary">
        <div class="container p-3">
            <div class="text-center small text-white">
                Copyright
                <script>document.write(new Date().getFullYear());</script>
                BOOK & TECH LIFE in YOKOHAMA, All Rights Reserved.
            </div>
        </div>
    </footer>

</body>
</html>