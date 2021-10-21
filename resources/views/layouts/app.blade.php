<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}" ></script>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <span class="navbar-brand" >Test Eukles</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item @if (Route::currentRouteName() == 'question-1') active @endif">
              <a class="nav-link" href="{{ route('question-1') }}">Question #1</a>
            </li>
            <li class="nav-item @if (Route::currentRouteName() == 'question-2') active @endif">
              <a class="nav-link" href="{{ route('question-2') }}">Question #2</a>
            </li>
            <li class="nav-item @if (Route::currentRouteName() == 'question-3') active @endif">
              <a class="nav-link" href="{{ route('question-3') }}">Question #3</a>
            </li>
          </ul>
        </div>
    </nav>

    <main role="main" class="container">
        @yield('content')
    </main>
    @yield('scripts')
</body>
</html>