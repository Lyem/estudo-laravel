@extends('layouts.app')

@section('title') Criar evento @endsection

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
			<form action="{{route('admin.events.store')}}" method="post">
				@csrf
				<div class="form-group">
					<label>Título Evento</label>
					<input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" name="title" value="{{old('title')}}">
				</div>
				<div class="form-group">
					<label>Descrição Rápida Evento</label>
					<input type="text" class="form-control @if($errors->has('description')) is-invalid @endif" name="description" value="{{old('description')}}">
				</div>
				<div class="form-group">
					<label>Fale mais Sobre o Evento</label>
					<textarea cols="30" rows="10" class="form-control @if($errors->has('body')) is-invalid @endif" name="body">{{old('body')}}</textarea>
				</div>
				<div class="form-group">
					<label>Quando Vai Acontecer?</label>
					<input type="text" class="form-control @if($errors->has('start_event')) is-invalid @endif" name="start_event" value="{{old('start_event')}}">
				</div>
				<button type="submit" class="btn btn-lg btn-success">Criar Evento</button>
			</form>
		</div>
	</div>
@endsection