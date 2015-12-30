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
								<div class="input-field">									
									{!! Form::text( 'tags', $product->TagsList ) !!}
									{!! Form::label( 'tags', 'Tags:') !!}
								</div>
								<div class="input-field">
									<button class="grey btn-floating btn-large waves-effect waves-light" type="submit">
										<i class="material-icons">edit</i>
									</button>
									<a href="{{route('admin.products.index')}}" class="grey btn-floating btn-large waves-effect waves-light"><i class="material-icons">keyboard_return</i></a>
								</div>
							{!! Form::close()!!}
						</div>
				</div>
			</section>
		</article>
	@endsection
