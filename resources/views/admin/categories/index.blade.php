@extends('layouts.app')
	@section('content')
		<article>
			<header>
				<h1>Categorias</h1>
			</header>
			<section>
				<a href="{{ route( 'admin.categories.create' ) }}" class="btn btn-default">nova categoria</a>
				<table class="table table-hover" width="100%">
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
									 <a href="{{route('admin.categories.edit',['id'=>$item->id])}}" class="btn btn-primary"><i class="fa fa-edit fa-x5"></i></a> |
									 <a href="{{route('admin.categories.destroy',[ 'id'=>$item->id ])}}" class="btn btn-danger"><i class="fa fa-trash-o fa-x5"></i></a>
									</td>
								</tr>
							@endforeach
					</tbody>
				</table>
				<div class="text-center">
					{{ $category->render() }}
				</div>
			</section>
		</article>
@stop()
