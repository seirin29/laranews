<!--<!DOCTYPE html>
<html>
	<head>
		<title>Laravel</title>
		
		<link href="https://fonts.googleapis.com">
	</head>
	<body>
		<div class="container">
			<h1>Post {{$id}} {{$name}} {{$password}}</h1>
		</div>
	</body>
</html>
-->

@extends('layouts.app')

@section('content')
	<h1>Post {{$id}} {{$name}} {{$password}}</h1>

@stop
		
		