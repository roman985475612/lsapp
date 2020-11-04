@extends('layouts.app')

@section('content')
    <h1 class="display-4">{{ $title }}</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-success">Новая статья</a>
	<br><br>
    <table class="table table-striped">
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
		<tbody>
			@forelse($posts as $post)
            <tr>
                <th>{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                <td>
					<div class="btn-group">
						<a href="{{ route('posts.show', ['post' => $post]) }}" class="btn btn-outline-info">
							<i class="fas fa-eye"></i>
						</a>
						<a href="{{ route('posts.edit', ['post' => $post]) }}" class="btn btn-outline-warning">
							<i class="fas fa-edit"></i>
						</a>
						<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#mod{{$post->id}}">
							<i class="fas fa-trash-alt"></i>
						</button>
					</div>

                    <!-- Modal delete -->
                    <div class="modal fade" id="mod{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Удаление статьи #{{ $post->id }}</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
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
			@empty
				<p>Списко статей пуст...</p>
			@endforelse
		</tbody>
    </table>
	
	{{ $posts->links() }}
@endsection
