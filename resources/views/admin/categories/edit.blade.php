@extends('layouts.admin')

@section('content')


<h1>Edit Categories</h1>

<div class="col-sm-6">
	
{!!Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id]])  !!}


	<div class="form-group">
	
			{!! Form::label('title','Category Name')!!}

			{!! Form::text('name',null,['class'=>'form-control'])!!}
	
	</div>

	<div class="form-group">
	
		
			{!! Form::submit('Update Category',['class'=>'btn btn-warning col-sm-6'])!!}
	
	</div>
{!!Form::close()!!}



	{!!Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]])  !!}


	<div class="form-group">
	
		
			{!! Form::submit('Delete Category',['class'=>'btn btn-danger col-sm-6'])!!}
	
	</div>
{!!Form::close()!!}


</div>

<div class="col-sm-6">


</div>




@endsection