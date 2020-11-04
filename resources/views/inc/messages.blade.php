@if(count($errors) > 0 )
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{ $error }}
			<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
		<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        {{ session('error') }}
		<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
