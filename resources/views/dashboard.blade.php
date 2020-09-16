@extends('layouts.app')

@section('content')
    <h1 class="display-4">{{ $title }}</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-success">Новая статья</a>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Заголовок</th>
            <th>Автор</th>
            <th>Дата создания</th>
            <th>Дата изменения</th>
            <th>Действия</th>
        </tr>
        </thead>
        @forelse($posts as $post)
            <tbody>
            <tr>
                <th>{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user_id }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                <td>
                    <a href="{{ route('posts.show', ['post' => $post]) }}" class="btn btn-outline-info">Просмотр</a>
                    <a href="{{ route('posts.edit', ['post' => $post]) }}" class="btn btn-outline-warning">Редактирование</a>
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#mod{{$post->id}}">
                        Удаление
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="mod{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                </td>
            </tr>
            </tbody>
        @empty
            <tbody>
            <tr>
                <td>Списко статей пуст...</td>
            </tr>
            </tbody>
        @endforelse
    </table>
@endsection
