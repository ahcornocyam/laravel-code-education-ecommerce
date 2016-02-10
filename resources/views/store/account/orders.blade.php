@extends('store.account.index')
@section('AccountSection')
	<h3>Pedidos Realizados</h3>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>#ID</th>
				<th>Itens</th>
				<th>Valor</th>
				<th>Status</th>
				<th>Código transação</th>
			</tr>
		</thead>
		<tbody>

			@foreach ($orders as $order)
				<tr data-id="{{ $order->id }}">
					<td>{{ $order->id }}</td>
					<td>
						@foreach ($order->items as $item)
							<ul>
								<li><a class="btn btn-link" href="{{ route('product.show',$item->product->id)}}">{{$item->product->name}}</a></li>
							</ul>
						@endforeach
					</td>
					<td>R$: {{ number_format($order->total,2,",",".") }}</td>
					<td>{{ $order->status }}</td>
					<td>{{ $order->id_pagseguro}}</td>
				</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td class="text-center"  colspan="3">{!! $orders->render() !!}
				</td>
			</tr>
		</tfoot>
	</table>
@stop
