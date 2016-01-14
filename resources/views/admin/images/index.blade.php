@extends('layouts.app')
	@section('content')
		<article>
			<header>
				<h1>Imagens do produto {{ $product->name}}</h1>
			</header>
			<section>
				<a href="{{ route( 'admin.images.create',$product->id ) }}" class="btn btn-default">nova Imagem</a>
				<table class="table table-hover" width="100%">
					<thead>
						<tr>
							<th>Imagem</th>
							<th>extenção</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
							@foreach( $product->images->all() as $item )
								<tr>
									<td> <img src="{{ url('uploads/'.$item->id.'.'.$item->extension) }}"class="img-thumbnail" width="80px" height="80px" alt=""/></td>
									<td> {{ $item->extension }}</td>
									<td>
									 <a href="{{route('admin.images.destroy',[ 'id'=>$item->id ])}}" class="waves-effect waves-grey btn-flat"><i class="fa fa-trash-o fa-x5"></i></a>
									</td>
								</tr>
							@endforeach
					</tbody>
				</table>
				<div>
					<a href="{{route('admin.products.index')}}" class="btn btn-danger"><i class="fa fa-angle-left fa-x5"></i></a>
				</div>
			</section>
		</article>
@stop()
