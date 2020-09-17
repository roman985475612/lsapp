<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index', ['title' => 'Блог'])->with('posts', $post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create', ['title' => 'Новая статья']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:191',
            'body' => 'required'
        ]);

        $post = new Post();
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
//        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Добавлена новая статья!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', [
            'title' => $post->title,
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if (auth()->user()->id != $post->user_id) {
            return redirect()->route('posts.show', [$post->id])->with('error', 'У Вас недостаточно прав!');
        }

        return view('posts.edit', [
            'title' => 'Изменение статьи',
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:191',
            'body' => 'required'
        ]);

        $post = Post::find($id);

        if (auth()->user()->id != $post->user_id) {
            return redirect()->route('posts.show', [$post->id])->with('error', 'У Вас недостаточно прав!');
        }

        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Изменена статья!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (auth()->user()->id != $post->user_id) {
            return redirect()->route('posts.show', [$post->id])->with('error', 'У Вас недостаточно прав!');
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Статья удалена!');
    }
}
