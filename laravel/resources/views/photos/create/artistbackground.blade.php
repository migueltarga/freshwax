@extends('layouts.master')

@section('content')
	<article class="forms">
		<header>  
			<h1>Create Artist Background</h1>
		</header> 

		{!!Form::open(['route'=>'photos.store', 'files' => 'true'])!!}
			
			@include('errors.partials.show')

			<p>
			{!!Form::label('name', 'Name:')!!}
			{!!Form::text('name')!!}
			</p>

			<p>
			{!!Form::label('caption', 'Caption:')!!}
			{!!Form::textarea('caption')!!}
			</p>


			{!!Form::hidden('artist', $id)!!}
			{!!Form::hidden('background_override', true)!!}

			
			<p>
			{!!Form::label('photo', 'Photo:')!!}
			{!!Form::file('photo')!!}
			</p>
		
			{!!Form::submit('create')!!}
		{!!Form::close()!!}

	</article> 
@stop
