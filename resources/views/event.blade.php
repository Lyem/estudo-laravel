@extends('layouts.site')

@if($event)
	@section('title')Evento: {{$event->title}} @endsection
@else
	@section('title')Evento: 404 @endsection
@endif

@section('content')
	@if($event)
		<div class="row">
			<div class="col-12">
				<h2>Evento: {{$event->title}}</h2>
				<p>Evento acontecera em: {{$event->start_event->format('d/m/Y H:i')}}</p>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab" aria-controls="home" aria-selected="true">Sobre</button>
					</li>
				  	@if($event->photos->count())
					  <li class="nav-item" role="presentation">
					    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#photos" type="button" role="tab" aria-controls="profile" aria-selected="false">Fotos</button>
					  </li>
					@endif
				</ul>
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade pt-4 show active" id="about" role="tabpanel" aria-labelledby="home-tab">{{$event->body}}
				  </div>
				 	@if($event->photos->count())
					  <div class="tab-pane fade pt-2" id="photos" role="tabpanel" aria-labelledby="profile-tab">
					  	<div class="row">
					  		@foreach($event->photos as $photo)
					  			<div class="col-3">
					  				<img class="img-fluid pt-4" src="{{$photo->photo}}" alt="photo do evento {{$event->title}}">
					  			</div>
					  		@endforeach
					  	</div>
					  </div>
					@endif
				</div>

			</div>
		</div>
	@else
		<div class="row">
			<div class="col-12">
				<div class="alert alert-warning">Evento não encontrado</div>
			</div>
		</div>
	@endif
@endsection