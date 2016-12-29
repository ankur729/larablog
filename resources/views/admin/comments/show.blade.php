@extends('layouts.admin')

@section('content')


<h1>Showing Comments</h1>


<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>E mail</th>
        <th>Author</th>
        <th>Body</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($comments as $comment)
      <tr>
        <td>{{$comment->id}}</td>
        <td>{{$comment->email}}</td>
        <td>{{$comment->author}}</td>
        <td>{{$comment->body}}</td>
        <td>
        	
        	@if($comment->is_active==1)
        	{!! Form::open(['method'=>'PATCH','action'=>['PostCommentController@update',$comment->id]])  !!}
        		
              	<input type="hidden" name="is_active" value="0">
        	
        		<div class="form-group">
        			
        			
        			{!!Form::submit('Un-Approve',[
        	
        				'class'=>'btn btn-warning'
        	
        			])!!}
        	
        		</div>
        	
        	{!!Form::close()!!}

        	@else

    	{!! Form::open(['method'=>'PATCH','action'=>['PostCommentController@update',$comment->id]])  !!}
        		
              	<input type="hidden" name="is_active" value="1">
        	
        		<div class="form-group">
        			
        			
        			{!!Form::submit('Approve Pending',[
        	
        				'class'=>'btn btn-success'
        	
        			])!!}
        	
        		</div>
        	
        	{!!Form::close()!!}

        	@endif
        </td>

        <td>
        	
 		{!! Form::open(['method'=>'DELETE','action'=>['PostCommentController@destroy',$comment->id]])  !!}
        		

        	
        		<div class="form-group">
        			
        			
        			{!!Form::submit('Delete',[
        	
        				'class'=>'btn btn-danger'
        	
        			])!!}
        	
        		</div>
        	
        	{!!Form::close()!!}

        </td>
      </tr>
   		@endforeach
    </tbody>
  </table>

@endsection
