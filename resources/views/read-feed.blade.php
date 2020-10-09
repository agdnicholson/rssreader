@extends('layouts.app')

@section('title', 'Dashboard - Read Feed')

@section('content')
<h1 class="text-center"><a href="{{ url('/dashboard') }}" class="link text-dark">Dashboard</a></h1>
<h3 class="text-center">Read feed</h3>
<!-- Feed: {{ $feed->feed }} -->
<h4 class="text-center">{{ $feed->title }}</h4>
@if ($feed->image!='')
	<p class="text-center"><img src="{{ $feed->image }}" height="50" class="img" /></p>
@endif
@foreach($feed->items as $item)
	<h5>{{ $item["title"] }}</h5>
	<p>
		{{ $item["description"] }}
		<br>
		<a href="{{ $item["link"] }}" target="_blank" class="link">Read full article</a>
	</p>
	<p class="small">
		{{ $item["date"] }}
	</p>
	<hr />
@endforeach

@endsection