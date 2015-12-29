<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Code-Commerce</title>
	<link href="{{ asset('/css/material.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('/css/material.blue_grey-indigo.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css')}}">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
		<header class="mdl-layout__header">
			<div class="mdl-layout__header-row">
				<span class="mdl-layout__title"><a href="{{ route('home')}}">CodeCommerce</a></span>
				<div class="mdl-layout-spacer"></div>
				<nav class="mdl-navigation">
					<a class="mdl-navigation__link" href="{{ route('home')}}">Home</a>
					<a class="mdl-navigation__link" href="{{ route('admin.categories.index')}}">Categorias</a>
					<a class="mdl-navigation__link" href="{{ route('admin.products.index')}}">Produtos</a>
				</nav>
			</div>
		</header>
		<div class="mdl-content">
			<main>
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone">
						@yield('content')
					</div>
				</div>
			</main>
			<footer class="mdl-mini-footer">
				<div class="mdl-mini-footer__left-section">
					<small class="mdl-mini-footer--heading">desenvolvido por Alexandre Roch</small>
				</div>
			</footer>
		</div>
	</div>
	<script src="{{ asset('/js/material.js') }}"></script>
</body>
</html>
