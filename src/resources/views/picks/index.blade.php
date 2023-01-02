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
      
      <div class="column col-md-8">
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
    </div>

    <div class="row">
      <div class="col col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading panel-heading-color">
            Pick
          </div>

          <div class="panel-body">
            <div class="text-right">
              <a href="#" class="btn btn-default btn-block">
                タスクを追加する
              </a>
            </div>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th>Title</th>
                <th>URL</th>
                <th>Memo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($picks as $pick)
                <tr>
                  <td>{{ $pick->title }}</td>
                  <td>
                    <a href="{{ $pick->url}}">{{ $pick-> url}}</a>
                  </td>
                  <td>{{ $pick->memo }}</td>
                  <td><a href="#">編集</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="panel-footer">
            🐿🦊⭐️
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

</body>
</html>