@extends('app')
	@section('content')
		<article>
			<header>
				<h1>Editar Categoria</h1>
			</header>
			<section>
				<div class="row">
						<div class="col l12">

							{!! Form::model($category,['route'=> ['admin.categories.update','id'=>$category->id],'method'=>'put']) !!}
								@include('admin.categories.form')
								<div class="mdl-textfield mdl-js-textfield">
									<button class="grey btn-floating btn-large waves-effect waves-light" type="submit">
										<i class="material-icons">edit</i>
									</button>
									<a href="{{route('admin.categories.index')}}" class="grey btn-floating btn-large waves-effect waves-light"><i class="material-icons">keyboard_return</i></a>
								</div>
							{!! Form::close()!!}
						</div>
				</div>
			</section>
		</article>
	@endsection
