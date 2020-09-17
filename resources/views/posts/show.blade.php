@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if($post->cover_image != '')
                <img src="{{ url('/storage/cover_image/'.$post->cover_image) }}" class="img-fluid mt-3" alt="{{ $post->title }}">
            @endif
            <h1 class="display-5">{{ $post->title }}</h1>
            <div>{!! $post->body !!}</div>
            <hr>
            <p class="lead">Автор: {{ $post->user->name }}</p>
            <p class="lead">Создан {{ $post->created_at }}</p>
            <hr>
            @if (Auth::user() == $post->user)
                <a href="{{ route('posts.edit', ['post' => $post]) }}" class="btn btn-outline-info">Редактировать</a>
                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                    Удалить
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Удаление статьи #{{ $post->id }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Вы уверены, что хотите удалить статью "{{ $post->title }}"?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
