@extends('app')
	@section('content')
		<article>
			<header>
				<h1>Categorias</h1>
			</header>
			<section>
				<a href="#" id="novaCat">nova categoria</a>
				<div for="novaCat" class="mdl-tooltip">
					nova categoria
				</div>
				<table class="mdl-data-table mdl-js-data-table" width="100%">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Descrição</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td> nome 1</td>
							<td> descrição</td>
							<td>
							 <a href="#" id="editCat">editar</a> |
							 <div for="editCat" class="mdl-tooltip">
							 	editar
							 </div>
							 <a href="#" id="delCat">Excluir</a>
							 <div for="delCat" class="mdl-tooltip">
							 	Excluir
							 </div>
							</td>
						</tr>
					</tbody>
				</table>
			</section>
		</article>
@stop()