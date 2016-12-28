@extends('layouts.admin')


@section('content')
<h1>Creating Users..</h1>

@include('errors.form_error')

{!! Form::open(['method'=>'POST','action'=>'AdminUserController@store','files'=>true])  !!}


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

		{!!Form::select('role_id',[''=>'---Choose One---']+$roles,null,[

			'class'=>'form-control'

		])!!}

	</div>

	<div class="form-group">
		
		{!! Form::label('Upload File','Upload File') !!}

		{!!Form::file('user_photo',null,[

			'class'=>'form-control'

		])!!}

	</div>

	<div class="form-group">
		
		{!! Form::label('status','Status') !!}

		{!!Form::select('status', ['1' => 'Active', '0' => 'InActive'], null, ['placeholder' => '--select status--','class'=>'form-control'])!!}

	</div>


	<div class="form-group">
		
		
		{!!Form::submit('Create User',[

			'class'=>'btn btn-primary'

		])!!}

	</div>

{!!Form::close()!!}


@endsection