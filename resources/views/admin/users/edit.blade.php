@extends('layouts.admin')


@section('content')


<h1>Editing Users..</h1>


{!! Form::model($user,['method'=>'PATCH','action'=>['AdminUserController@update',$user->id],'files'=>true])  !!}


<div class="col-sm-3">
	
<a href="../../../user_image/{{$user->photo ? $user->photo->file :'http://placehold.it/350x150'}}"><img src="../../../user_image/{{$user->photo ? $user->photo->file :'http://placehold.it/350x150'}}" class="img-responsive img-circle" style="border:1px solid black;width: 250px;height: 200px;"></a>
</div>

<div class="col-sm-9">
	

	<div class="form-group">
		
		{!! Form::label('Name','Name') !!}

		{!!Form::text('name',null,[

			'class'=>'form-control'

		])!!}

	</div>

	<div class="form-group">
		
		{!! Form::label('E Mail','E Mail') !!}

		{!!Form::text('email',null,[

			'class'=>'form-control'

		])!!}

	</div>

	<div class="form-group">
		
		{!! Form::label('Password','Password') !!}

		{!!Form::password('password',[

			'class'=>'form-control'

		])!!}

	</div>

	<div class="form-group">
		
		{!! Form::label('role_id','Role') !!}

		{!!Form::select('role_id',$roles,null,[

			'class'=>'form-control'

		])!!}

	</div>



	<div class="form-group">
		
		{!! Form::label('status','Status') !!}

		{!!Form::select('is_active', ['1' => 'Active', '0' => 'InActive'], null, ['placeholder' => '--select status--','class'=>'form-control'])!!}

	</div>


	<div class="form-group">
		
		
		{!!Form::submit('Update User',[

			'class'=>'btn btn-warning'

		])!!}

	</div>





{!!Form::close()!!}



{!! Form::model($user,['method'=>'DELETE','action'=>['AdminUserController@destroy',$user->id]])  !!}



	<div class="form-group">
		
		
		{!!Form::submit('Delete User',[

			'class'=>'btn btn-danger'

		])!!}

	</div>

{!!Form::close()!!}

</div>


<div class="row">
	
<div class="col-sm-12">
	
	@include('errors.form_error')
</div>


</div>

@endsection