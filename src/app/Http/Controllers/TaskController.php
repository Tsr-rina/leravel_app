<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder; // ModelsのFolder
use App\Models\Task;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;


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

    public function showCreateForm(int $id)
    {
        return view('tasks/create', [
            'folder_id' => $id
        ]);
    }

    public function create(int $id, CreateTask $request)
    {
        $current_folder = Folder::find($id);

        $task = new Task();
        $task->title = $request->title;
        $task->due_date= $request->due_date;

        // current_folderに紐づくタスクを作成している
        $current_folder->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'id' => $current_folder -> id,
        ]);

    }

    public function showEditForm(int $id, int $task_id)
    {
        $task = Task::find($task_id);

        return view('tasks/edit',[
            'task' => $task,
        ]);
    }

    public function edit(int $id, int $task_id, EditTask $request)
    {
        // リクエストされたIDでタスクデータを取得する
        $task = Task::find($task_id);

        // 編集対象のタスクデータに入力値を入れてsaveする
        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        // 編集対象のタスクが属するタスク一覧画面へリダイレクトする
        return redirect()->route('tasks.index',[
            'id' => $task->folder_id,
        ]);

    }
}
