@extends('layouts.app')

@section('title', 'Dashboard - Add new feed')

@section('content')
<h1 class="text-center"><a href="{{ url('/dashboard') }}" class="link text-dark">Dashboard</a></h1>
<div class="jumbotron col-md-6 offset-md-3">
	<h3 class="text-center">Add new feed</h3>
	@if (isset($error) && $error)
		<div class="alert alert-danger" role="alert">
	 		Problem adding new feed.<br>
	 		Please check that the URL is valid and that 
	 		you have not already added this feed and try again.
		</div>
	@endif
	<form name="feed" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="url">Feed Url (RSS 2.0)</label>
			<input type="text" id="url" name="url" class="form-control" 
				maxlength="255" required placeholder="Please enter feed URL" />
		</div>
		<button type="submit" class="btn btn-primary">Add new feed</button>
		<a href="{{ url('/dashboard') }}" class="btn btn-secondary">Cancel</a>
	</form>
</div>

@endsection