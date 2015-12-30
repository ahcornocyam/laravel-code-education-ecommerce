@extends('app')
	@section('content')
		<article>
			<header>
				<h1>Produtos</h1>
			</header>
			<section class="mdl-grid">
				<a href="{{ route('admin.products.create')}}" class="waves-effect waves-light btn grey">Novo Produto</a>
				<table class="bordered highlight" width="100%">
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
									<a href="{{ route('admin.products.edit',['id' => $item->id ]) }}" class="waves-effect waves-grey btn-flat"><i class="material-icons">edit</i></a> |
									<a href="{{ route('admin.images.index',['id' => $item->id ]) }}"class="waves-effect waves-grey btn-flat"><i class="material-icons">image</i></a>|
									<a href="{{ route('admin.products.destroy',['id' => $item->id ]) }}"class="waves-effect waves-grey btn-flat"><i class="material-icons">delete</i></a>
								 </td>
							</tr>
							@endforeach
					</tbody>
				</table>
				<div class="center-align">
					{{ $product->render() }}
				</div>
			</section>
		</article>
@stop()
