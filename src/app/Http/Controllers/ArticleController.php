<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pocket;

class ArticleController extends Controller
{
    public function index()
    {
        $pockets = Pocket::all();

        // view(テンプレートファイル名, テンプレートに渡すデータ)
        return view('picks/index', [
            // キーがテンプレ側で参照する値(変数名)
            'pockets' => $pockets,
        ]);
    }
}
