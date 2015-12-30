@extends('app')
	@section('content')
		<article>
			<header>
				<h1>Nova Foto do produto {{$product->name}}</h1>
			</header>
			<section>
				<div class="row">
						<div class="col l12">
							{!! Form::open(['route'=> ['admin.images.store', $product->id ],'method'=>'post','enctype'=>'multipart/form-data']) !!}
								@include('images.form')
								<div class="mdl-textfield mdl-js-textfield">
									<button id="add" class="grey btn-floating btn-large waves-effect waves-light" type="submit">
										<i class="material-icons">add</i>
									</button>
									<a href="{{route('admin.images.index',$product->id)}}" class="grey btn-floating btn-large waves-effect waves-light"><i class="material-icons">keyboard_return</i></a>
								</div>
							{!! Form::close()!!}
						</div>
				</div>
			</section>
		</article>
	@endsection
