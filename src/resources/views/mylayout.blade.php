<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP Info</title>
  @yield('styles')
  <link rel="stylesheet" href="/css/layout.css">
</head>
<body>
<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">Try to find your TREASURE</a>
  </nav>
</header>
<main>
  @yield('content')
</main>
@yield('scripts')
</body>
</html>