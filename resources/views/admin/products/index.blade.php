@extends('layouts.app')
	@section('content')
		<article>
			<header>
				<h1>Produtos</h1>
			</header>
			<section class="mdl-grid">
				<a href="{{ route('admin.products.create')}}" class="btn btn-default">Novo Produto</a>
				<table class="table table-hover" width="100%">
					<thead>
						<tr>
							<th> Nome </th>
							<th> Categoria </th>
							<th> Descrição </th>
							<th> Preço </th>
							<th> Destaque</th>
							<th> Recomendado</th>
							<th> Ações </th>
						</tr>
					</thead>
					<tbody>
						@foreach($product as $item)
							<tr>
								<td> {{ $item->name }} </td>
								<td> {{ $item->category->name }} </td>
								<td> {{ $item->description }} </td>
								<td> R$: {{ $item->price }} </td>
								<td> {{ ($item->featured)? 'sim' : 'não' }} </td>
								<td> {{ ($item->recommend)? 'sim': 'não' }} </td>
								<td>
									<a href="{{ route('admin.products.edit',['id' => $item->id ]) }}" class="btn btn-primary"><i class="fa fa-edit fa-x5"></i></a> |
									<a href="{{ route('admin.images.index',['id' => $item->id ]) }}"class="btn btn-success"><i class="fa fa-picture-o fa-x5"></i></a>|
									<a href="{{ route('admin.products.destroy',['id' => $item->id ]) }}"class="btn btn-danger"><i class="fa fa-trash-o fa-x5"></i></a>
								 </td>
							</tr>
							@endforeach
					</tbody>
				</table>
				<div class="text-center">
					{{ $product->render() }}
				</div>
			</section>
		</article>
@stop()
