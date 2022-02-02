@extends('layouts.app')

@section('title') Meus eventos @endsection

@section('content')

	<div class="row my-4">
		<div class="col-12">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Evento</th>
						<th>Criado em</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					@forelse($events as $event)
						<tr>
							<td>{{$event->id}}</td>
							<td>{{$event->title}}</td>
							<td>{{$event->created_at->format('d/m/Y H:i:s')}}</td>
							<td class="d-flex">
								<a href="{{route('admin.events.edit', $event->id)}}" class="btn btn-warning mx-1">Editar</a>
								<form action="{{route('admin.events.destroy', $event->id)}}" method="post">
									@csrf
									@method('DELETE')
									<button class="btn btn-danger">Deletar</button>
								</form>
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="4">Nenhum evento encontrado</td>
						</tr>
					@endforelse
				</tbody>
			</table>
			{{$events->links()}}
		</div>
	</div>

@endsection