@extends('store.account.index')
@section('AccountSection')
		<h3>Detales da Conta de {{$user->name }}</h3>
		<div>
				<form class="" action="index.html" method="post">
						<div class="row form-group">
								<div class="col-md-3">
									<label for="name" class="form-control">Nome</label>
								</div>
								<div class="col-md-9">
									<input type="text" name="name" value="{{$user->name}}" disabled class="form-control">
								</div>
						</div>
						<div class="row form-group">
								<div class="col-md-3">
									<label for="cpf" class="form-control">Cpf</label>
								</div>
								<div class="col-md-9">
									<input type="text" name="cpf" value="{{$user->cpf}}" disabled class="form-control">
								</div>
						</div>
						<div class="row form-group">
								<div class="col-md-3">
									<label for="fone" class="form-control">Telefone</label>
								</div>
								<div class="col-md-9">
									<input type="text" name="fone" value="{{$user->fone}}" disabled class="form-control">
								</div>
						</div>
						<div class="row form-group">
								<div class="col-md-3">
									<label for="email" class="form-control">Email</label>
								</div>
								<div class="col-md-9">
									<input type="text" name="email" value="{{$user->email}}" disabled class="form-control">
								</div>
						</div>
				</form>
		</div>
@stop
