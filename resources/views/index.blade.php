@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="px-3 py-3 pt-md-5 pb-md-4 text-center">
	<h1 class="display-5">Welcome To RSSReader.co.uk</h1>
	<p class="lead">
		Sign up for free and add RSS feeds to your own dashboard.<br>
		Quickly navigate and read news headlines or what is happening on your favourite blogs from around the web.
	</p>
</div>

<div class="jumbotron">
	<h3 class="text-center">All your RSS Feeds in one place!</h3>
	<div class="row py-5">
		<div class="col-md-4">
			<img src="{{url('/images/rssfeed-demo1.jpg')}}" class="img-fluid" alt="RSSreader.co.uk dashboard"/>
		</div>
		<div class="col-md-4">
			<img src="{{url('/images/rssfeed-demo2.jpg')}}" class="img-fluid" alt="Navigate and read your added feeds"/>
		</div>
		<div class="col-md-4">
			<img src="{{url('/images/rssfeed-demo3.jpg')}}" class="img-fluid" alt="Add new feeds"/>
		</div>
	</div>
	@guest
	<div class="col-md-4 offset-md-4">
		<a href="{{ url('/signup') }}" class="btn btn-lg btn-block 
				btn-outline-primary">Sign up for free</a>
	</div>
	@endguest
</div>

@endsection