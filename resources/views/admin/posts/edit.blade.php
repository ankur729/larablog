@extends('layouts.admin')


@section('content')
<h1>Edit POSTS</h1>


<div class="row">
<div class="col-sm-3">

<a href="../../../post_image/{{$posts->photo->file}}"><img src="../../../post_image/{{$posts->photo->file}}" class="img-responsive img-rounded col-xs-hide"></a>

</div>

<div class="col-sm-9">
	

{!! Form::model($posts,['method'=>'PATCH','action'=>['AdminPostController@update',$posts->id],'files'=>true])  !!}
	


	<div class="form-group">
		
		{!! Form::label('title','Title') !!}

		{!!Form::text('title',null,[

			'class'=>'form-control'

		])!!}

	</div>

	<div class="form-group">
			
			{!! Form::label('category','Category') !!}
	
			{!!Form::select('category_id',$categories,null,[
	
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
		
		
		{!!Form::submit('Edit Post',[

			'class'=>'btn btn-warning col-sm-6'

		])!!}

	</div>

{!!Form::close()!!}


{!! Form::open(['method'=>'DELETE','action'=>['AdminPostController@destroy',$posts->id]])  !!}
	
	<div class="form-group">
		
		
		{!!Form::submit('Delete Post',[

			'class'=>'btn btn-danger col-sm-6'

		])!!}

	</div>

{!!Form::close()!!}


</div> <!--Column closed for post-->

</div>   <!--Row Close-->



<div class="row">
	<div class="col-sm-12">
		
		@include('errors.form_error')
	</div>

</div>
@endsection