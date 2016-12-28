@extends('layouts.admin')


@section('content')
<h1>POSTS</h1>

<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Owner</th>
        <th>Owner</th>
        <th>Category</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created At</th>
        <th>Updated At</th>
        
      </tr>
    </thead>
    <tbody>

    @if('$post')
    	@foreach($posts as $post)
      <tr>
      	<td>{{$post->id}}</td>
      	<td>{{$post->user->name}}</td>
      	<td><a href="../{{$post->user->photo->file}}"><img src="../{{$post->user->photo->file}}" style="height: 50px;width: 50px;"></a></td>
      	<td>{{$post->category ? $post->category->name : 'Unactegorized'}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td>{{$post->created_at->diffForhumans()}}</td>
        <td>{{$post->updated_at->diffForhumans()}}</td>
        
      </tr>

      @endforeach
   @endif
    </tbody>
  </table>
@endsection