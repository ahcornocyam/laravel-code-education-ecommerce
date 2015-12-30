@extends('app')
	@section('content')
		<article>
			<header>
				<h1>Imagens do produto {{ $product->name}}</h1>
			</header>
			<section>
				<a href="{{ route( 'admin.images.create',$product->id ) }}" class="waves-effect waves-light btn grey">nova Imagem</a>
				<table class="bordered highlight" width="100%">
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
									 <a href="{{route('admin.images.destroy',[ 'id'=>$item->id ])}}" class="waves-effect waves-grey btn-flat"><i class="material-icons">delete</i></a>
									</td>
								</tr>
							@endforeach
					</tbody>
				</table>
				<div>
					<a href="{{route('admin.products.index')}}" class="grey btn-floating btn-large waves-effect waves-light"><i class="material-icons">keyboard_return</i></a>
				</div>
			</section>
		</article>
@stop()
