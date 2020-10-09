@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-center"><a href="{{ url('/dashboard') }}" class="link text-dark">Dashboard</a></h1>
@if (count($feeds)===0)
	<h3 class="text-center">You don't have any RSS Feeds :-(</h3>
	<div class="row py-5">
    	<div class="col text-center">
			<a href="{{ url('dashboard/add') }}" class="btn btn-primary">Add your first RSS feed</a>
		</div>
	</div>
@else
	<h3 class="text-center">Your RSS feeds</h3>
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col" width="25%">Title</th>
				<th scope="col" width="35%">Description</th>
				<th scope="col" width="15%"></th>
				<th scope="col" width="15%"></th>
				<th scope="col" width="10%"></th>
			</tr>
		</thead>
		<tbody>
		@foreach($feeds as $feed)
			<tr>
				<td><!-- Feed: {{ $feed->feed }} -->
					<h5>{{ $feed->title }}</h5>
				</td>
				<td>
					<p>{{ $feed->description }}</p>
				</td>
				<td class="text-center">
					@if ($feed->image!='')
						<img src="{{ $feed->image }}" class="img-fluid" />
					@endif
				</td>
				<td>
					<a href="{{ url('/dashboard/'.$feed->id) }}" 
						class="btn btn-primary">Read feed</a>
				</td>
				<td>
					<a href="{{ url('/dashboard/delete/'.$feed->id) }}"
						class="btn btn-warning btn-xm py-0" 
						onclick="return confirm('Are you sure you want to delete this feed?');">
						Delete
					</a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	{{ $feeds->links() }}
	<a href="{{ url('dashboard/add') }}" class="btn btn-primary">+ Add Feed</a>
@endif
@endsection