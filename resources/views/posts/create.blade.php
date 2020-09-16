@extends('layouts.app')

@section('content')
    <h1 class="display-4">Добавлнеие статьи</h1>
    {!! Form::open(['route' => 'posts.store', 'method' => 'POST']) !!}
        <div class="mb-3">
            {{ Form::label('title', 'Заголовок', ['class' => 'form-label']) }}
            {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Укажите заголовок статьи']) }}
        </div>
        <div class="mb-3">
            {{ Form::label('body', 'Текст', ['class' => 'form-label']) }}
            {{ Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Введите текст статьи']) }}
        </div>
        {{ Form::submit('Сохранить', ['class' => 'btn btn-outline-primary']) }}
    {!! Form::close() !!}
@endsection
