@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="jumbotron col-md-6 offset-md-3">
	<h1>Login</h1>
	@if (isset($error) && $error)
		<div class="alert alert-danger" role="alert">
	 		Problem with logging in.<br>
	 		Please check your username and password and try again.
		</div>
	@endif
	<form name="login" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="email">Username</label>
			<input type="email" id="email" name="email" class="form-control" 
				maxlength="100" required placeholder="Enter Username / Email address" />
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" id="password" name="password" 
				class="form-control" minlength="6" maxlength="25" required placeholder="Enter Password" />
		</div>
		<button type="submit" class="btn btn-primary">Login</button>
	</form>
</div>
@endsection