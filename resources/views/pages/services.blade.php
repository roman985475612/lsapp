@extends('layouts.app')

@section('content')
    <div class="bg-light mt-3 p-4 text-center">
        <h1 class="display-4">{{ $title }}</h1>
        <p class="lead">В этом разделе Вы узнаете про наши услуги...</p>
    </div>
    @if(count($services) > 0)
        <ul class="list-grout mt-3 pl-0">
            @foreach($services as $service)
                <label class="list-group-item">
                    <input class="form-check-input mr-1" type="checkbox" value="">
                    {{ $service }}
                </label>

{{--                <li class="list-group-item">{{ $service }}</li>--}}
            @endforeach
        </ul>
    @endif
@endsection
