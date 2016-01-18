@extends('store.store')
	@section('categories')
		@include('store.partial.categories')
	@stop
	@section('content')
		<div class="col-sm-9 padding-right">

				@if (isset($cart) == 'empty')
						<h3> Carrinho de compras vazio</h3>

				@else
					<h3>Pedido Realizado com sucesso</h3>

					<p>
						O Pedido #{{ isset($order->id) }}, foi realizado com sucesso.
					</p>
				@endif


		</div>
@stop
