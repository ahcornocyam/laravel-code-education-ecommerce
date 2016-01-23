@extends('store.account.index')
@section('AccountSection')
	<h3>Endereços de Entrega</h3>
	<div>
		<a class="btn btn-link" href="{{ route('account.adress.new') }}">Novo Endereço</a>
	</div>
	<div class="panel-body">
		<div class="panel-group" id="endereco" role="tablelist" aria-multselectable="true">
		@forelse ($enderecos as $endereco)
				<div class="panel panel-info">
					<div class="panel-heading" role="tab" id="heading{{ $endereco->id }}">
						<h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#endereco" href="#{{ $endereco->id }}" aria-expanded="false" aria-controls="{{ $endereco->id }}">
								{{ $endereco->nome }}
							</a>
						</h4>
					</div><!--fim panel-heading-->
					<div id="{{ $endereco->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $endereco->id }}">
						<div class="col-md-9">
							<div><strong>Rua</strong> {{ $endereco->rua }} </div>
							<div><strong>N°</strong> {{ $endereco->numero }} </div>
							<div><strong>Bairro</strong> {{ $endereco->bairro }} </div>
							<div><strong>Cidade</strong> {{ $endereco->cidade}} </div>
							<div><strong>CEP</strong> {{ $endereco->cep }}</div>
							<div><strong>Estado</strong> {{ $endereco->estado }} </div>
						</div>
						<div class="col-md-12">
							<a class="btn btn-success" href="{{ route('account.adress.edit', $endereco->id) }}">editar</a>
							<a class="btn btn-danger"href="{{route('account.adress.destroy', $endereco->id )}}">excluir</a>
						</div>
					</div>
				</div><!--fim de um endereço-->
		@empty
			<span>não há endereco cadastrado</span>
		@endforelse
		</div>
		{!! $enderecos->render() !!}
	</div>
@stop
