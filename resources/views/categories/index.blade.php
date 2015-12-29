@extends('app')
	@section('content')
		<article>
			<header>
				<h1>Categorias</h1>
			</header>
			<section class="mdl-grid">
				<a href="{{ route( 'admin.categories.create' ) }}" id="novaCat" class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect">nova categoria</a>
				<div for="novaCat" class="mdl-tooltip">
					nova categoria
				</div>
				<table class="mdl-data-table mdl-js-data-table" width="100%">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Descrição</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
							@foreach( $category as $item )
								<tr>
									<td> {{ $item->name }}</td>
									<td> {{ $item->description }}</td>
									<td>
									 <a href="{{route('admin.categories.edit',['id'=>$item->id])}}"><i class="material-icons">edit</i></a> |
									 <a href="{{route('admin.categories.destroy',[ 'id'=>$item->id ])}}"><i class="material-icons">delete</i></a>									 
									</td>
								</tr>
							@endforeach
					</tbody>
				</table>
				<div class="mdl-cell mdl-cell--12-col">
					{{ $category->render() }}
				</div>
			</section>
		</article>
@stop()
