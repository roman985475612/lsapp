@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="display-4">{{ $title }}</h1>
            {!! Form::open(['route' => ['posts.update', $post->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
            <div class="mb-3">
                {{ Form::label('title', 'Заголовок', ['class' => 'form-label']) }}
                {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Укажите заголовок статьи']) }}
            </div>
            <div class="mb-3">
                {{ Form::label('body', 'Текст', ['class' => 'form-label']) }}
                {{ Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Введите текст статьи']) }}
            </div>
            <div class="form-file mb-3">
                <input type="file" class="form-file-input" name="cover_image" id="customFile">
                <label class="form-file-label" for="customFile">
                    <span class="form-file-text">Выберите файл...</span>
                    <span class="form-file-button">Открыть</span>
                </label>
            </div>
            {{ Form::submit('Сохранить', ['class' => 'btn btn-outline-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
