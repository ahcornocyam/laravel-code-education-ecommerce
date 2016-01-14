@extends('store.store')
	@section('content')
    	<section id="cart_items">
    		<div class="container">
    			<div class="table-responsive cart_info">
                    <table class="table table-condensed">
    					<thead>
    						<tr class="cart_menu">
    							<th class="image">Item</th>
    							<th class="description"></th>
    							<th class="price">Preço</th>
    							<th class="qtd">Quantidade</th>
    							<th class="total">Total</th>
    							<th class=""></th>
    						</tr>
    					</thead>
    					<tbody>
    						@forelse( $cart->all() as $c=>$item )
    						<tr>
    							<td class="cart_product">
    								 <a href="#">
                                        <img src="{{ url( 'uploads/'.$item['image']->id.'.'.$item['image']->extension ) }}" alt="" width="80">
                                    </a>
    							</td>
    							<td class="cart_description">
    								<h4><a href="{{ route('product.show',['id'=> $c]) }}"> {{ $item['name'] }}</a></h4>
    								<span>Código: {{ $c }}</span>
    							</td>
    							<td class="cart_price">
    								<p>R$: {{ number_format($item['price'],2,',','.') }}</p>
    							</td>
    							<td class="cart_quantity">
    								<p class="col-sm-4 pull-right">
                                        {!! Form::open(['route'=>['cart.update','id'=>$c],'method'=>'post','class'=>'form-inline']) !!}
                                            <div class="form-group col-sm-3 pull-right">
                                                {!! Form::number('qtd',$item['qtd'],['class'=>'form-control','min'=>'0']) !!}
                                                {!! Form::submit("atualizar",['class'=>'btn btn-primary']) !!}
                                            </div>
                                        {!! Form::close() !!}
                                    </p>
    							</td>
    							<td class="cart_total">
    								<p class="cart_total_price">R$: {{ number_format($item['price'] * $item['qtd'],2,',','.') }}</p>
    							</td>
    							<td class="cart_delete">
    								<a href="{{ route('cart.destroy',['id'=>$c]) }}" class="cart_quantity_delete">remover</a>
    							</td>
    						</tr>
                            @empty
                            <td colspan="6" class="text-center">Não há produtos no carrinho</td>
    						@endforelse
    					</tbody>
                        <tfoot>
                            <tr class="cart_menu">
                                <td colspan="6">
                                    <div class="pull-right">
                                        <span>Total : R$: {{ number_format( $cart->getTotal(),2,',','.' ) }}</span>
                                        <a href="{{ route('checkout.place') }}" class="btn btn-success">finalizar pedido</a>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
    				</table>
    			</div>
    		</div>
    	</section>
	@stop