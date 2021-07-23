<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title')</title>

<!-- Scripts -->
<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<link rel="stylesheet" href="http://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.16.2/build/styles/default.min.css">
<script src="http://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.16.2/build/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>

<!-- <script src="/js/highlight.js"></script>
<link rel="stylesheet" href="/css/monokai.min.css">
<script>hljs.initHighlightingOnLoad();</script> -->


<!-- Styles -->
<link rel="stylesheet" href="/css/styles.css">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    
</head>
<body>

    <div class="container">
        @yield('content')
    </div>


</body>
</html>