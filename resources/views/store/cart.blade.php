@extends('store.store')
	@section('content')
    	<section id="cart_items">
    		<div class="container">
    			<div class="table-responsive cart_info">
    				<table class="table table-condensed">
    					<thead>
    						<tr class="cart_menu">
    							<th class="image">Item</th>
    							<th class="description">Descrição</th>
    							<th class="price">Preço</th>
    							<th class="qtd">Quantidade</th>
    							<th class="total">Total</th>
    							<th class=""></th>
    						</tr>
    					</thead>
    					<tbody>
    						@foreach( $carrinho->all() as $c=>$item )
    						<tr>
    							<td class="cart_product">
    								<a href="#">
    									<img src="" alt="" width="80">
    								</a>
    							</td>
    							<td class="cart_description">
    								<h4><a href="{{ route('product.show',['id'=> $c]) }}"> {{ $item['name'] }}</a></h4>
    								<span>Código: {{ $c }}</span>
    							</td>
    							<td class="cart_price">
    								<p>{{ $item['price'] }}</p>
    							</td>
    							<td class="cart_quantity">
    								<p>{{ $item['qtd'] }}</p>
    							</td>
    							<td class="cart_total">
    								<p class="cart_total_price">R$: {{ $item['price'] * $item['qtd'] }}</p>
    							</td>
    							<td class="cart_delete">
    								<a href="#" class="cart_quantity_delete">remover</a>
    							</td>
    						</tr>
    						@endforeach
    					</tbody>
    				</table>
    			</div>
    		</div>
    	</section>
	@stop