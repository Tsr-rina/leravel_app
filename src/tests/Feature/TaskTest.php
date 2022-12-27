<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use Tests\TestCase;
use Carbon\Carbon;

class TaskTest extends TestCase
{

    // テストケースごとにデータベースをリフレッシュしてマイグレーションを再実行する
    use RefreshDatabase;

    // 各テストメソッドの実行前に呼ばれる
    public function setUp() :void
    {
        parent::setUp();

        $this->seed('FoldersTableSeeder');
    }

    /**
     *  期限日が日付でない場合はバリデーションエラー
     * @test
    */
    public function due_date_should_be_date()
    {
        $response = $this->post('/folders/1/tasks/create',[
            'title' => 'sample task',
            'due_date' => 123,
        ]);

        $response->assertSessionHasErrors([
            'due_date'=>'期限日には日付を入力してください',
        ]);
    }

    /**
     * 期限日が過去日付の場合はバリデーションエラー
     * @test
     */ 
    public function due_date_should_not_be_date()
    {
        $response = $this->post('/folders/1/tasks/create',[
            'title' => 'sample task',
            'due_date' => Carbon::yesterday()->format('Y/m/d'),
        ]);

        $response->assertSessionHasErrors([
            'due_date'=>'期限日には今日以降の日付を入力してください',
        ]);
    }
    /**
     * 状態が定義された値ではない場合はバリデーションエラー
     * @test
     */
    public function status_should_be_within_defined_numbers()
    {
        $this -> seed('TasksTableSeeder');

        $response = $this->post('/folders/1/tasks/1/edit',[
            'title' => 'Sample task',
            'due_date' => Carbon::today()->format('Y/m/d'),
            'status' => 999,
        ]);

        $response->assertSessionHasErrors([
            'status' => '状態には未着手、着手中、完了のいずれかを指定してください。',
        ]);
    }
}

