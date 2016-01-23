@extends('store.store')
	@section('categories')
		@include('store.partial.categories')
	@stop
	@section('content')
		<div class="col-sm-9">
				<h2 class="title text-center">Minha Conta</h2>
				<div class="panel-group">
						<div class="panel panel-default">
								<div class="panel-heading">
										<h3 class="panel-title text-right">Olá <strong>{{ $user->name }}</strong></h3>
								</div>
								<div class="panel-body">
										<div class="col-md-8">
											@yield('AccountSection')
										</div>
										<div class="col-md-4">
												<span>
														<strong>Menu</strong>
												</span>
												<ul class="navbar nav">
													<li><a class="btn btn-link" href="{{ route('account.detail') }}">Detalhes da Conta</a></li>
													<li><a class="btn btn-link" href="{{ route('account.adress') }}">Endereços de entrega</a></li>
													<li><a class="btn btn-link" href="{{ route('account.orders') }}">Pedidos</a></li>
													<li><a class="btn btn-link" href="{{ url('/logout') }}">Logout</a></li>
												</ul>
										</div>
								</div>
						</div>
				</div>
		</div>
@stop
