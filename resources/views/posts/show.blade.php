@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <img src="https://fakeimg.pl/1024x350/?text=Lsapp&font=lobster" class="img-fluid mt-3" alt="Fake img">
            <h1 class="display-5">{{ $post->title }}</h1>
            <div>{!! $post->body !!}</div>
            <hr>
            <p class="lead">Создан {{ $post->created_at }}</p>
        </div>
    </div>
@endsection
