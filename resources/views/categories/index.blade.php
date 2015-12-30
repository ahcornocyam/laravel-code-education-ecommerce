@extends('app')
	@section('content')
		<article>
			<header>
				<h1>Categorias</h1>
			</header>
			<section>
				<a href="{{ route( 'admin.categories.create' ) }}" class="waves-effect waves-light btn grey">nova categoria</a>
				<table class="bordered highlight" width="100%">
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
									 <a href="{{route('admin.categories.edit',['id'=>$item->id])}}" class="waves-effect waves-grey btn-flat"><i class="material-icons">edit</i></a> |
									 <a href="{{route('admin.categories.destroy',[ 'id'=>$item->id ])}}" class="waves-effect waves-grey btn-flat"><i class="material-icons">delete</i></a>
									</td>
								</tr>
							@endforeach
					</tbody>
				</table>
				<div class="center-align">
					{{ $category->render() }}
				</div>
			</section>
		</article>
@stop()
