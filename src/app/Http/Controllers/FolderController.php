<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }

    // メソッドが呼び出されるときにリクエスト情報をRequestのインスタンス$requestに引数としてLaravelが渡してくれる
    // Requestのインスタンスにはリクエストヘッダや送信元IP,入力値などのいろいろな情報が含まれている
    // FormrequesクラスはRequestクラスと互換性がある
    public function create(CreateFolder $request)
    {
        // フォルダクラスのインスタンスを生成
        $folder = new Folder();

        // タイトルに入力値を代入する
        // $request->titleは$requestの入力値を取得している
        $folder->title = $request->title;

        // インスタンスの状態をデータベースに書き込む(モデルクラスを永続化)
        // 手順はモデルクラスのインスタンス生成,インスタンスのプロパティに値を代入する, saveメソッドを呼び出す
        // これでテーブルに対してinsertが実行される
        $folder -> save();

        // redirectで独自の画面ではなくそのフォルダに対するタスク一覧画面に遷移する
        return redirect()->route('tasks.index',[
            'id' => $folder ->id,
        ]);
    }

}
