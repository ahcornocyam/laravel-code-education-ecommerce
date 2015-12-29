@extends('app')
	@section('content')
		<article>
			<header>
				<h1>Editar Produto {{ $product->id }}</h1>
			</header>
			<section>
				<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--12-col">
							{!! Form::model($product,['route'=> ['admin.products.update','id'=>$product->id],'method'=>'put']) !!}
								@include('products.form')
								<div class="mdl-textfield mdl-js-textfield">
									<button id="edit" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored" type="submit">
										<i class="material-icons">edit_circle</i>
									</button>
									<div class="mdl-tooltip" for="edit">
											Editar
									</div>
								</div>
							{!! Form::close()!!}
						</div>
				</div>
			</section>
		</article>
	@endsection
