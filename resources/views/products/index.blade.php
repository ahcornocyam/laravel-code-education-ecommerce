@extends('app')
	@section('content')
		<article>
			<header>
				<h1>Produtos</h1>
			</header>
			<section>
				<a href="#" id="novoProd">novo Produto</a>
				<div for="novoProd" class="mdl-tooltip">
					Novo Produto
				</div>
				<table class="mdl-data-table mdl-js-data-table" width="100%">
					<thead>
						<tr>
							<th> Nome </th>
							<th> Descrição </th>
							<th> Preço </th>
							<th> Ações </th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td> produto 1 </td>
							<td> descrição 1 </td>
							<td> preco 1 </td>
							<td>
								<a href="#" id="editProd">editar</a> |
								<div for=editProd class="mdl-tooltip">
									Editar
								</div>
							 	<a href="#" id="delProd">Excluir</a>
							 	<div for="delProd" class="mdl-tooltip">
							 		Excluir
							 	</div>
							 </td>
						</tr>
					</tbody>
				</table>
			</section>
		</article>
@stop()