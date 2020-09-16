<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke() {
        $post = Post::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['title' => 'Панель управления'])->with('posts', $post);
    }
}
