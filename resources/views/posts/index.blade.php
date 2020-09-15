@extends('layouts.app')

@section('content')
    <h1 class="display-4">Статьи</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($posts as $post)
            <div class="col">
                <div class="card h-100">
                    <img src="https://fakeimg.pl/350x200/?text=Lsapp&font=lobster" class="card-img-top" alt="Fake img">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->body }}</p>
                        <a href="/posts/{{ $post->id }}" class="btn btn-outline-primary">Читать далее...</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated {{ $post->updated_at }}</small>
                    </div>
                </div>
            </div>
        @empty
            <p>Списко статей пуст...</p>
        @endforelse
    </div>
    {{ $posts->links() }}
@endsection
