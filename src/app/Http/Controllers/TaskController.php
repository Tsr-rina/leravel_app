<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder; // ModelsのFolder
use App\Models\Task;

class TaskController extends Controller
{
    public function index(int $id)
    {
        // Folderモデルのallクラスメソッドを使う->フォルダデータをdbから取得
        $folders = Folder::all();

        // 選ばれたフォルダを取得する
        $current_folder = Folder::find($id);

        // 選ばれたフォルダに紐づくタスクを取得する
        $tasks = $current_folder->tasks()->get();

        // view(テンプレートファイル名, [テンプレートに渡すデータ])
        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $current_folder->id,
            'tasks'=> $tasks
        ]);
    }
}
