<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="token" data-token="{{csrf_token()}}" id="token">
	<title>
		@section('title')
			{{ config('site.slug') }}
		@show
			&mdash; {{ config('site.name') }}
	</title>

	{{-- RSS Feed --}}
	<link
		rel="alternate"
		type="application/rss+xml"
		href="{{ TKPM::route('feed.music')}}"
		title="Music RSS Feed {{ config('site.name') }}">

	<link
		rel="alternate"
		type="application/rss+xml"
		href="{{ TKPM::route('feed.video')}}"
		title="Video RSS Feed {{ config('site.name') }}">

	@include('inc.seo')

	@include('styles')

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	@if  (! App::isLocal())
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	@endif
</head>
<body ng-app="app">

	<div class="container" id="wrapper">

		<div class="row">
			@include('nav')
		</div>

		<div class="row">

			@section('search-results')
				<div class="col-sm-12" ng-controller="searchController">
					@include('inc.search')
				</div>
			@show
			@section('alert')
				<div class="col-sm-12">
					@include('inc.alert')
				</div>
			@show