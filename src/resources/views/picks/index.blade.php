<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP Crawler</title>
  <link rel="stylesheet" href="/css/layout.css">
</head>

<body>

<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">Try to find your TREASURE</a>
  </nav>
</header>


<main>
  <div class="container">
    <!-- row=>1行 -->
    <div class="row">
      <div class="col col-md-4">
        <nav class="panel panel-default">
          <div class="panel-heading panel-heading-color">Pocket</div>
          <div class="panel-body">
            <a href="#" class="btn btn-default btn-block">
              Add Pocket
            </a>
          </div>
          <div class="list-group">
            @foreach($pockets as $pocket)
            <!-- routeはルーティングの設定からURLを作り出す関数 -->
            <!-- route(nameメソッドの引数, ルートURLのうち変数になっている部分に実際の値を埋める役割) -->
              <a href="{{ route('picks.index', ['id' => $pocket->id]) }}" class="list-group-item">
                {{ $pocket->name }}
              </a>
            @endforeach
          </div>
        </nav>
      </div>
      
      <div class="column col-md-8">
        <!-- ここにタスクが表示される -->
      </div>
    </div>
  </div>
</main>

</body>
</html>