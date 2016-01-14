@extends('layouts.app')
	@section('content')
		<article>
			<header>
				<h1>Editar Produto {{ $product->id }}</h1>
			</header>
			<section>
				<div class="row">
						<div class="col-md-12">
						<!-- Listar Erros -->
				            @if($errors->any)
				                <div class="panel-info">
				                    <ul class="alert">
				                       @foreach($errors->all() as $error)
				                           <li>{{$error}}</li>
				                       @endforeach
				                    </ul>
				                </div>
				            @endif
							{!! Form::model($product,['route'=> ['admin.products.update','id'=>$product->id],'method'=>'put']) !!}
								@include('admin.products.form')
								<div class="form-group">
									{!! Form::label( 'tags', 'Tags:',['class'=>'form-label']) !!}
									{!! Form::text( 'tags', $product->TagsList,['class'=>'form-control'] ) !!}
								</div>
								<div class="form-group">
									<button class="btn btn-success" type="submit">
										<i class="fa fa-pencil fa-x5"></i>
									</button>
									<a href="{{route('admin.products.index')}}" class="btn btn-danger"><i class="fa fa-minus fa-x5"></i></a>
								</div>
							{!! Form::close()!!}
						</div>
				</div>
			</section>
		</article>
	@endsection
