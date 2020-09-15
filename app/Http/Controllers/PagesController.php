<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = 'Добро пожаловать в LSAPP!';
        return view('pages.index', compact('title'));
    }

    public function about() {
        $title = 'О нас';
        return view('pages.about', compact('title'));
    }

    public function services() {
        return view('pages.services', [
            'title' => 'Наши услуги',
            'services' => [
                'Веб-дизайн',
                'Программирование',
                'SEO-оптимизация'
            ]
        ]);
    }
}
