@extends('app')
	@section('content')
		<article>
			<header>
				<h1>Nova Categoria</h1>
			</header>
			<section>
				<div class="row">
						<div class="col l12">
							{!! Form::open(['route'=> 'admin.categories.store','method'=>'post']) !!}
								@include('admin.categories.form')
								<div class="mdl-textfield mdl-js-textfield">
									<button id="add" class="grey btn-floating btn-large waves-effect waves-light" type="submit">
										<i class="material-icons">add</i>
									</button>
									<a href="{{route('admin.categories.index')}}" class="grey btn-floating btn-large waves-effect waves-light"><i class="material-icons">keyboard_return</i></a>
								</div>
							{!! Form::close()!!}
						</div>
				</div>
			</section>
		</article>
	@endsection
