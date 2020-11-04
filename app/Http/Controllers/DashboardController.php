<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        // $posts = User::find(auth()->user()->id)->posts;
		$posts = Post::where('user_id', auth()->user()->id)
					->orderBy('id')
					->paginate(10);

        return view('dashboard', [
            'title' => 'Панель управления',
            'posts' => $posts,
        ]);
    }
}
