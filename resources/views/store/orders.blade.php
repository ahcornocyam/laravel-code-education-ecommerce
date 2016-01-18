@extends('store.store')
	@section('categories')
		@include('store.partial.categories')
	@stop
	@section('content')
		<div class="col-sm-9 padding-right">
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th>#ID</th>
										<th>Itens</th>
										<th>Valor</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>

									@foreach ($orders as $order)
										<tr data-id="{{ $order->id }}">
											<td>{{ $order->id }}</td>
											<td>
												@foreach ($order->items as $item)
													<ul>
														<li><a href="{{ route('product.show',$item->product->id)}}">{{$item->product->name}}</a></li>
													</ul>
												@endforeach
											</td>
											<td>R$: {{ number_format($order->total,2,",",".") }}</td>
											<td>{{ $order->status }}</td>
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
		</div>
@stop
