@extends('layout.main')

@section('title')
	{{ $title }}
@stop

@section('content')

	<div class="col-sm-8">

		@if( count( $results ) )

		<div class="row bg-black btrr bbrr">
			<h2 class="text-center">
				Nou jwenn {{ $results->count() }} rezilta pou: "{{ $query }}"
			</h2>
		</div>
		<br>
		<div class="row">
			@include('search.grid-12')
		</div>

		@else

		<div class="row bg-black">
			<h2 class="text-center">Nou pa jwenn anyen pou: "{{ $query }}"</h2>
		</div>

		@endif

	</div>

@stop