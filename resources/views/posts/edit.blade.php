@extends('layouts.app')

@section('content')
    <h1 class="display-4">{{ $title }}</h1>
    {!! Form::open(['route' => ['posts.update', $post->id], 'method' => 'put']) !!}
        <div class="mb-3">
            {{ Form::label('title', 'Заголовок', ['class' => 'form-label']) }}
            {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Укажите заголовок статьи']) }}
        </div>
        <div class="mb-3">
            {{ Form::label('body', 'Текст', ['class' => 'form-label']) }}
            {{ Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Введите текст статьи']) }}
        </div>
        {{ Form::submit('Сохранить', ['class' => 'btn btn-outline-primary']) }}
    {!! Form::close() !!}
@endsection
