@extends('layouts.app')

@section('title') Fotos @endsection

@section('content')
	@if($errors->any())
		<div class="alert alert-danger my-4">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<div class="row mt-4">
		<div class="col-12">
			<form action="{{route('admin.events.photos.store', $event)}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label>Subir fotos do evento</label>
					<input type="file" name="photos[]" class="form-control @if($errors->has('photos*')) is-invalid @endif" multiple>
				</div>
				<button class="btn btn-outline-success">Enviar fotos</button>
			</form>
			<hr>
			@if($event->photos->count())
			  	<div class="row">
			  		@foreach($event->photos as $photo)
			  			<div class="col-4 mb4 text-center">
			  				<img class="img-fluid mb-1" src="{{asset('storage/' . $photo->photo)}}" alt="photo do evento {{$event->title}}">
			  				<form action="{{route('admin.events.photos.destroy', [$event ,$photo])}}" method="POST">
			  					@csrf
			  					@method('DELETE')
			  					<button class="btn btn-danger">Remover foto</button>
			  				</form>
			  			</div>
			  		@endforeach
			  	</div>
			@endif
		</div>
	</div>

@endsection