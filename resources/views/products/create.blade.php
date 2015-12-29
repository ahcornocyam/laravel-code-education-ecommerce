@extends('app')
	@section('content')
		<article>
			<header>
				<h1>Novo Produto</h1>
			</header>
			<section>
				<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--12-col">

							{!! Form::open(['route'=> 'admin.products.store','method'=>'post']) !!}
								@include('products.form')
								<div class="mdl-textfield mdl-js-textfield">
									<button id="add" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored" type="submit">
										<i class="material-icons">add_circle</i>
									</button>
									<div class="mdl-tooltip" for="add">
											Cadastrar
									</div>
								</div>
							{!! Form::close()!!}
						</div>
				</div>
			</section>
		</article>
	@endsection