<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest; 
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    public function show(Post $post)
    {
        //dd($post); post変数の中身を確認
        return view('posts/show')->with(['post' => $post]);
    }
    public function create()
    {
        return view('posts/create');
    }
    public function store(Post $post, PostRequest $request)//requestが入力値、postがデータベース側
    {
        //dd($request->all()); //入力した値を確認するddメソッド
        $input = $request['post'];
        $post->fill($input)->save();//sqlでのinsert構文、createメソッドでも可能
        return redirect('/posts/' . $post->id);
    }
}
?>