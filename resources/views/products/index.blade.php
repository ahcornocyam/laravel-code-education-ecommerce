@extends('app')
	@section('content')
		<article>
			<header>
				<h1>Produtos</h1>
			</header>
			<section class="mdl-grid">
				<a href="{{ route('admin.products.create')}}" id="novoProd" class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect">Novo Produto</a>
				<div for="novoProd" class="mdl-tooltip">
					Novo Produto
				</div>
				<table class="mdl-data-table mdl-js-data-table" width="100%">
					<thead>
						<tr>
							<th> Nome </th>
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
								<td> {{ $item->description }} </td>
								<td> R$: {{ $item->price }} </td>
								<td> {{ ($item->featured)? 'sim' : 'não' }} </td>
								<td> {{ ($item->recommend)? 'sim': 'não' }} </td>
								<td>
									<a href="{{ route('admin.products.edit',['id' => $item->id ]) }}"><i class="material-icons">edit</i></a> |
									<a href="{{ route('admin.products.destroy',['id' => $item->id ]) }}"><i class="material-icons">delete</i></a>

								 </td>
							</tr>
							@endforeach
					</tbody>
				</table>
				<div class="mdl-cell mdl-cell--12-col">
					{{ $product->render() }}
				</div>
			</section>
		</article>
@stop()
