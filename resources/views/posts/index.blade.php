@extends('layouts.app')

@section('content')
    <h1 class="display-4">Статьи</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-3">
        @forelse($posts as $post)
            <div class="col">
                <div class="card h-100">
                    @if($post->cover_image != '')
                        <img src="{{ url('/storage/cover_image/'.$post->cover_image) }}" class="card-img-top" alt="{{ $post->title }}">
                    @else
                        <img src="https://fakeimg.pl/300x200/868e96/?text=%20" class="card-img-top" alt="No image">
                    @endif
                    <div class="card-header">
                        <small class="text-muted">Автор: {{ $post->user->name }}</small>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($post->body, 100) }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-primary">Читать далее...</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Обновлен {{ $post->updated_at }}</small>
                    </div>
                </div>
            </div>
        @empty
            <p>Списко статей пуст...</p>
        @endforelse
    </div>

	{{ $posts->links() }}
	
@endsection
