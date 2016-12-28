@extends('layouts.admin')


@section('content')
<h1>CREATE POSTS</h1>





{!! Form::open(['method'=>'POST','action'=>'AdminPostController@store','files'=>true])  !!}
	


	<div class="form-group">
		
		{!! Form::label('title','Title') !!}

		{!!Form::text('title',null,[

			'class'=>'form-control'

		])!!}

	</div>

	<div class="form-group">
			
			{!! Form::label('category','Category') !!}
	
			{!!Form::select('category_id',[''=>'--Choose Category--']+$categories,null,[
	
				'class'=>'form-control'
	
			])!!}
	
		</div>

		<div class="form-group">
				
				{!! Form::label('photo','Photo') !!}
		
				{!!Form::file('photo_id',[
		
					
		
				])!!}
		
			</div>

	<div class="form-group">
		
		{!! Form::label('body','body') !!}

		{!!Form::textarea('body',null,[

			'class'=>'form-control',
			'rows'=>3

		])!!}

	</div>




	<div class="form-group">
		
		
		{!!Form::submit('Create Post',[

			'class'=>'btn btn-primary'

		])!!}

	</div>

{!!Form::close()!!}


<div class="row">
	<div class="col-sm-12">
		
		@include('errors.form_error')
	</div>

</div>
@endsection