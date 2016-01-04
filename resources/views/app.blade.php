<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Code-Commerce</title>
	<link rel="stylesheet" href="{{ elixir('css/admin.css') }}">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="grey darken-4 white-text">
	<header>
		<div class="container-fluid">
				<div class="navbar-fixed">
					<nav>
						<div class="nav-wrapper grey darken-2">
							<a href="{{route('home')}}" class="brand-logo">Code-Commerce</a>
							<ul id="nav-mobile" class="right hide-on-med-and-down">
				        <li><a href="{{route('home')}}">Home</a></li>
				        <li><a href="{{route('admin.categories.index')}}">Categorias</a></li>
				        <li><a href="{{route('admin.products.index')}}">Produtos</a></li>
				      </ul>
						</div>
					</nav>
				</div>
		</div>
	</header>
	<main >
		<div class="container-fluid">
			<div class="row">
			  <div class="col l12">
						<div class="content">
								@yield('content')
						</div>
			  </div>
			</div>
		</div>
	</main>
	<footer class="page-footer grey darken-2">
		<div class="container-fluid">
				<div class="footer-copyright center-align">
						<small>desenvolvido por Alexandre Roch</small>
				</div>
		</div>
	</footer>	
	<script src="{{ elixir('js/admin.js')}}"></script>
</body>
</html>
