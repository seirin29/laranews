@extends('layouts.app')



@section('content')

	<!-- <form action="/posts" method="post"> -->
	{!! Form::open(['method'=>'POST', 'action'=>'PostsController@store']) !!}	
		
		<div class="form-group">
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title', null, ['class'=>'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('Gambar', 'File:') !!}
			{!! Form::file('gambar', ['class'=>'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
		</div>	
	
	{!! Form::close() !!}
	
	@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
		<!-- <input type="text" name="title"/>
		{{csrf_field()}}
		<input type="submit" name="submit" />
	</form> -->
	
@stop

@section('footer')

@stop