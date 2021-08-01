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
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="/js/highlight.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/monokai-sublime.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css">
    
    
</head>
<body class="original">
    
    <nav class="navbar navbar-expand-md navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ url('/') }}">
                <img src="../storage/photos/logo.png" alt="Tech Assist" width="180px" height="25px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            menu
                        </a>
                        <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
                            <div class="col border-left border-right border-bottom global-navi p-0">
                                <a href="/profile/index" class="nav-link link">PROFILE</a>
                            </div>
                            <div class="col border-left border-right global-navi p-0">
                                <a href="/portfolio/index" class="nav-link link">PORTFOLIO</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid bg-primary">
        <div class="container">
            <h2>
             <a href="{{ url('/') }}" class="text-white text-bold" style="font-weight: bold;">BOOK & TECH LIFE in YOKOHAMA</a>
            </h2>
            <p class="jumbotron_description text-white text-bold" style="font-weight: bold;" >読書好き駆け出しエンジニアによる活動記録。</p>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @yield('content')
            </div>

            <div class="col-md-4 pb-4 pl-4">
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