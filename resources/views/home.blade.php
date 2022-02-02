@extends('layouts.site')

@section('title')Lista eventos @endsection

@section('content')
<div class="row">    
    <div class="col-12">
        <h2>Eventos</h2>
        <hr>
    </div>
</div>

<div class="row">
        @forelse($events as $event)
            <div class="col-4">
                <div class="card">
                    @if(count($event->photos))
                        <img src="{{$event->photos[0]->photo}}" class="card-img-top" alt="Imagem do evento" />
                    @else
                        <img src="https://via.placeholder.com/640x480.png/2a2978?text=Sem%20imagem" class="card-img-top" alt="Imagem do evento" />
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{$event->title}}</h5>

                        <strong>Acontece em {{$event->start_event->format('d/m/Y H:i')}}</strong>

                        <p class="card-text">{{$event->description}}</p>

                        <a href="{{route('event',$event->slug)}}" class="btn btn-default">Ver evento</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning">Nenhum evento encontrado neste site...</div>
            </div>
        @endforelse
        {{$events->links()}}
</div>
@endsection