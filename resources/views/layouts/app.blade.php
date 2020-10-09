<html>
	<head>
		<title>RSSReader.co.uk - @yield('title')</title>
		<!-- Bootstrap 4 CSS only -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
			integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="d-flex flex-column flex-md-row align-items-center 
				p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
				<h5 class="my-0 mr-md-auto font-weight-normal">RSSReader.co.uk</h5>
				<nav class="my-2 my-md-0 mr-md-3">
					@auth
						<a class="p-2 text-dark" href="{{ url('/') }}">Home</a>
						<a class="p-2 text-dark" href="{{ url('/dashboard') }}">Dashboard</a>
						<a class="btn btn-primary" href="{{ url('/logout') }}">Log out</a>
					@endauth
					@guest
						<a class="p-2 text-dark" href="{{ url('/') }}">Home</a>
						<a class="btn btn-outline-primary" href="{{ url('/signup') }}">Sign up</a>
						<a class="btn btn-primary" href="{{ url('/login') }}">Login</a>
					@endguest
				</nav>  
			</div>

			@yield('content')

			<footer class="pt-4 my-md-5 pt-md-5 border-top">
				<div class="row col-md-12">
					<ul class="list-inline text-small mx-auto">
						@auth
							<li class="list-inline-item">
								<a class="text-muted" href="{{ url('/') }}">Home</a>
							</li>
							<li class="list-inline-item">
								<a class="text-muted" href="{{ url('/dashboard') }}">Dashboard</a>
							</li>
							<li class="list-inline-item">
								<a class="text-muted" href="{{ url('/logout') }}">Log out</a>
							</li>
						@endauth
						@guest
							<li class="list-inline-item">
								<a class="text-muted" href="{{ url('/') }}">Home</a>
							</li>
							<li class="list-inline-item">
								<a class="text-muted" href="{{ url('/signup') }}">Sign up</a>
							</li>
							<li class="list-inline-item">
								<a class="text-muted" href="{{ url('/login') }}">Log in</a>
							</li>
						@endguest
					</ul>
				<div class="row col-md-12 mx-auto">
					<div class="col-md-12 text-center">
						<small class="text-muted">
							&copy;{{ date('Y') }} 
							<a href="{{ url('/') }}" class="link text-dark">RSSReader.co.uk</a>
						</small>
					</div>
				</div>
			</footer>
    	</div>
	</body>
</html>