<!-- <!DOCTYPE html>
<html>
	<head>
		<title>Laravel</title>
		
		<link href="https://fonts.googleapis.com">
	</head>
	<body>
		<div class="container">
			//h1>Contact Page</h1>
		</div>
	</body>
</html>
-->

@extends('layouts.app')

@section('content')
	<h1>Contact Page</h1>
	@if (count($people))
		<ul>
		@foreach($people as $person)
			<li>{{$person}}</li>
		@endforeach
		</ul>
	@endif
@stop

@section('footer')
	<script>alert("Hello Visitor.")</script>	
@stop
		