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
      <!-- col=>横並び mdは6つ分(1で2サイズ)4なので2つ分 -->
      <div class="col col-md-4">
        <!-- panelを使う -->
        <nav class="panel panel-default">
          <!-- panelのヘッダーの設定 -->
          <div class="panel-heading panel-heading-color">Pocket</div>
          <!-- panelの中身 -->
          <div class="panel-body">
            <a href="#" class="btn btn-default btn-block">
              Add Pocket
            </a>
          </div>

          <!-- リストで表示できる -->
          <div class="list-group">
            @foreach($pockets as $pocket)
            <!-- routeはルーティングの設定からURLを作り出す関数 -->
            <!-- route(nameメソッドの引数, ルートURLのうち変数になっている部分に実際の値を埋める役割) -->
            <!-- コントローラーから受け取ったURLの値とコントローラーから受け取ったdbのidの値が同じときにactive-->
              <a href="{{ route('picks.index', ['id' => $pocket->id]) }}" 
              class="list-group-item list-group-item-action {{ $current_pocket_id === $pocket->id ? 'list-group-item-dark':''}}">
                {{ $pocket->name }}
              </a>
            @endforeach
          </div>

          <!-- panelフッター -->
          <div class="panel-footer">
            🐿🦊
          </div>
        </nav>
      </div>
      <div class="col col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading panel-heading-color">
            Pick
          </div>

          <div class="panel-body">
            @foreach($picks as $pick)
              <div class="col col-md-8">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">{{ $pick->title }}</h5>
                    <div class="card-text">{{ $pick->memo }}</div>
                    <a href="{{ $pick->url }}" class="card-link">{{ $pick->url }}</a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <div class="panel-footer">
            🐿🦊⭐️
          </div>
        </div>
      </div>
    </div>
    <!-- 以下change -->
    <div class="card">
      <h5 class="card-title">EC2 page</h5>
      <div class="card-text">Look Look Look</div>
      <a href="http://54.250.90.105" class="card-link">http://54.250.90.105</a>
    </div>
    <iframe src="http://54.250.90.105" frameborder="0"></iframe>
  </div>
</main>

</body>
</html>