@extends('layouts.app')

@section('content')
    <div class="bg-light mt-3 p-4 text-center">
        <h1 class="display-4">{{ $title }}</h1>
        <p class="lead">Это приложнение создано с использованием фреймворка Laravel</p>
        <hr>
        @guest
            <a href="/login" class="btn btn-info btn-lg">Вход</a>
            <a href="/register" class="btn btn-success btn-lg">Регистрация</a>
        @endguest
    </div>
@endsection
