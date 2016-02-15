@extends('layouts.app')
  @section('content')
    <article>
			<header>
				<h1>Editar Pedido</h1>
			</header>
			<section>
				<div class="row">
						<div class="col-md-12">
							<!-- Listar Erros -->
				            @if($errors->any)
				                <div class="panel-info">
				                    <ul class="alert">
				                       @foreach($errors->all() as $error)
				                           <li>{{$error}}</li>
				                       @endforeach
				                    </ul>
				                </div>
				            @endif

							{!! Form::model($order,['route'=> ['admin.orders.update','id'=>$order->id],'method'=>'put']) !!}

                <div class="form-group col-md-6">
                    {!! Form::label('id','Código da ordem de serviço')!!}
                    {!! Form::text('id', $order->id, ['class'=>'form-group','disabled'])!!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('user_id','Nome do Cliente', ['class'=>'form-label'])!!}
                    {!! Form::text('user_id', $order->user->name, ['class'=>'form-group','disabled'])!!}
                </div>
                <fieldset>
                  <legend>Produtos</legend>
                    <div class="table-responsive">

                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Item</th>
                            <th>Quantidade</th>
                            <th>Valor</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($order->items as $item)
                            <tr>
                              <td>{{ $item->id }}</td>
                              <td>
                                <a class="btn btn-link" href="{{ route('product.show',$item->product->id)}}">{{$item->product->name}}</a>
                              </td>
                              <td> {{ $item->qtd }}</td>
                              <td>R$: {{ number_format($item->price,2,",",".") }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="4">
                              Total: R$: <strong>{{ number_format($order->total, 2, ",", ".")  }}</strong>
                            </td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                </fieldset>
                <div class="form-group">
                  {!! Form::label('status_id', 'Status do pedido',['class'=>'form-label'])!!}
                  {!! Form::select('status_id', $status, null, ['class'=>'form-control'] )!!}
                </div>
								<div class="form-group">
									<button class="btn btn-success" type="submit">
										<i class="fa fa-pencil fa-x5"></i>
									</button>
									<a href="{{route('admin.categories.index')}}" class="btn btn-danger"><i class="fa fa-minus fa-x5"></i></a>
								</div>
							{!! Form::close()!!}
						</div>
				</div>
			</section>
		</article>
@stop
