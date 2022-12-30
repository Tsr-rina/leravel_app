<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pocket;

class ArticleController extends Controller
{
    // URLの変数部分をコントローラーで受け取り方->メソッドの引数として受け取る
    // 引数はルーティングで定義した括弧内の値と同じでなければならない
    public function index(int $id)
    {
        $pockets = Pocket::all();

        // view(テンプレートファイル名, テンプレートに渡すデータ)
        return view('picks/index', [
            // キーがテンプレ側で参照する値(変数名)
            'pockets' => $pockets,
            'current_pocket_id' => $id,
        ]);
    }
}
