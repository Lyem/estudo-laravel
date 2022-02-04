@extends('layouts.app')

@section('title') Editar evento @endsection

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
	<div class="row my-4">
		<div class="col-12">
			<form action="{{route('admin.events.update',$event->id)}}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label>Título Evento</label>
					<input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$event->title}}">
				</div>
				<div class="form-group">
					<label>Descrição Rápida Evento</label>
					<input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{$event->description}}">
				</div>
				<div class="form-group">
					<label>Fale mais Sobre o Evento</label>
					<textarea cols="30" rows="10" class="form-control @error('body') is-invalid @enderror" name="body">{{$event->body}}</textarea>
				</div>
				<div class="form-group">
					<label>Quando Vai Acontecer?</label>
					<input type="text" class="form-control @error('start_event') is-invalid @enderror" name="start_event" value="{{$event->start_event}}">
				</div>
				<div class="form-group my-5">
					<div class="row">
						<div class="col-12">
							Banner evento
							<hr>
						</div>

						<div class="col-4">
							<img src="{{asset('storage/' . $event->banner)}}" alt="banner atual do evento {{$event->title}}" class="img-fluid">
						</div>

						<div class="col-8">
							<label>Carregar um banner para o evento</label>
							<input type="file" name="banner" class="form-control @if($errors->has('banner')) is-invalid @endif">
						</div>
					</div>
					<div class="col-12">
						<hr>
					</div>
				</div>
				<button type="submit" class="btn btn-lg btn-success">Editar Evento</button>
			</form>
		</div>
	</div>
@endsection