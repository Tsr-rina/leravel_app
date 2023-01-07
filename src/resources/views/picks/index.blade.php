@extends('mylayout')

@section('content')
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
          🐿🦊⭐️
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
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading panel-heading-color">Form</div>
      <div class="panel-body">
        <form action="http://54.65.203.254/world.php" method="post">
              <div class="form-group">
                <label>関東</label>
                <select class="form-control" name="ken">
                  <option value="tokyo">東京</option>
                  <option value="saitama">埼玉</option>
                  <option value="kanagawa">神奈川</option>
                </select>
              </div>
              <div>
                <input type="submit" value="探す">
              </div>
        </form>
      </div>
      <div class="panel-footer">
        🐿🦊⭐️
      </div>
    </div>
    <p>
    <?php
    if(!empty($_POST)){
            $k_name = $_POST['ken'];
            echo "選択された県は".$k_name;
    }
    ?>
    </p>
  </div>
</div>
@endsection