@extends('layouts.app')

@section('title', 'Sign up')

@section('content')
<div class="jumbotron col-md-6 offset-md-3">
	<h1>Sign up</h1>
	@if (isset($error) && $error)
		<div class="alert alert-danger" role="alert">
	 		Problem with Sign up.<br>
	 		Please check your username and password and try again.
	 		You may have already registered. Please log in if you have.
		</div>
	@endif
	<form name="signup" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="email">Username</label>
			<input type="email" id="email" name="email" maxlength="100" 
				class="form-control" required placeholder="Enter Username / Email address" />
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" id="password" name="password" 
				class="form-control" minlength="6" maxlength="25" required placeholder="Enter Password" />
		</div>
		<div class="form-group">
			<label for="password_confirm">Password confirmation</label>
			<input type="password" id="password_confirm" 
				class="form-control" name="password_confirm" minlength="6" 
					maxlength="25" required placeholder="Confirm Password"/>
		</div>
		<button type="submit" class="btn btn-outline-primary">Sign up</button>
	</form>
</div>
@endsection