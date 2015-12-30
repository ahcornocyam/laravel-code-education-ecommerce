@extends('app')
	@section('content')
		<article>
			<header>
				<h1>Novo Produto</h1>
			</header>
			<section>
				<div class="row">
						<div class="col l12">
							{!! Form::open(['route'=> 'admin.products.store','method'=>'post']) !!}
								@include('products.form')
								<div class="input-field">
									{!! Form::text( 'tags', null) !!}
									{!! Form::label( 'tags', 'Tags:') !!}
								</div>
								<div class="input-field">
									<button class="grey btn-floating btn-large waves-effect waves-light" type="submit">
										<i class="material-icons">add</i>
									</button>
									<a href="{{route('admin.products.index')}}" class="grey btn-floating btn-large waves-effect waves-light"><i class="material-icons">keyboard_return</i></a>
								</div>
							{!! Form::close()!!}
						</div>
				</div>
			</section>
		</article>
	@endsection
