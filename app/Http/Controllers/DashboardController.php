<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke() {
        $user = User::find(auth()->user()->id);

        return view('dashboard', [
            'title' => 'Панель управления',
            'posts' => $user->posts,
        ]);
    }
}
