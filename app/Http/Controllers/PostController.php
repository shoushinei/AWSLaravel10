<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
/**
 * Post一覧を表示する
 * 
 * @param Post Postモデル
 * @return array Postモデルリスト
 */

class PostController extends Controller
{
    public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
{
   
    return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);  
       //getPaginateByLimit()はPost.phpで定義したメソッドです。
}
/**
 * 特定IDのpostを表示する
 *
 * @params Object Post // 引数の$postはid=1のPostインスタンス
 * @return Reposnse post view
 */
public function show(Post $post)
{
    
    return view('posts.show')->with(['post' => $post]);
 //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
}
public function create()
{
    return view('posts.create');
}
public function store(PostRequest $request, Post $post)
{
    $input = $request['post'];
    $post->fill($input)->save();
    return redirect('/posts/' . $post->id);

}
public function edit(Post $post)
{
    return view('posts.edit')->with(['post' => $post]);
}
public function update(PostRequest $request, Post $post)
{
    $input_post = $request['post'];
    $post->fill($input_post)->save();
    return redirect('/posts/' . $post->id);
}
public function delete(Post $post)
{
    $post->delete();
    return redirect('/');
}
}
