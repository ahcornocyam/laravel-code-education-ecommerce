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

                <div class="form-group">
                    {!! Form::label('id','ID')!!}
                    {!! Form::text('id', $order->id, ['class'=>'form-group','disabled'])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('user_id','Nome do Cliente')!!}
                    {!! Form::text('user_id', $order->user->name, ['class'=>'form-group','disabled'])!!}
                </div>
                <fieldset>
                  <legend>Produtos</legend>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Items</th>
                          <th>Valor</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                              @foreach ($order->items as $item)
                                  <ul>
                                    <li><a class="btn btn-link" href="{{ route('product.show',$item->product->id)}}">{{$item->product->name}}</a></li>
                                  </ul>
                              @endforeach
                          </td>
                          	<td>R$: {{ number_format($order->total,2,",",".") }}</td>
                        </tr>
                      </tbody>
                    </table>
                </fieldset>
                <div class="form-group">
                  <div class="col-md-6">
                    {!! Form::label('status','Pedido Realizado',['class'=>'form-label']) !!}
                    {!! Form::radio('status',1, $order->status,['class'=>'form-control']) !!}
                  </div>
                  <div class="col-md-6">
                    {!! Form::label('status','Pedido em Processo',['class'=>'form-label']) !!}
                    {!! Form::radio('status',0, $order->status,['class'=>'form-control']) !!}
                  </div>
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
