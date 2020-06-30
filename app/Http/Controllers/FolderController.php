<?php

namespace App\Http\Controllers;

 
use App\Folder; // ★ この行を追記！
use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolder $request) // ★ 引数の型を変更
{
    // フォルダモデルのインスタンスを作成する
    $folder = new Folder();
    // タイトルに入力値を代入する
    $folder->title = $request->title;
    // インスタンスの状態をデータベースに書き込む
    $folder->save();

    return redirect()->route('tasks.index', [
        'id' => $folder->id,
    ]);
}
}