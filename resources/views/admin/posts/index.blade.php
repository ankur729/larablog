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
      	<td><a href="{{route('admin.post.edit',$post->id)}}">{{$post->user->name}}</a></td>
      	<td><a href="../user_image/{{$post->user->photo->file}}"><img src="../user_image/{{$post->user->photo->file}}" style="height: 50px;width: 50px;"></a></td>
      	<td>{{$post->category ? $post->category->name : 'Unactegorized'}}</td>
        <td>{{$post->title}}</td>
        <td>{{str_limit($post->body,20)}}<span>...<a href="#">Read More</a></span></td>
        <td>{{$post->created_at->diffForhumans()}}</td>
        <td>{{$post->updated_at->diffForhumans()}}</td>
        
      </tr>

      @endforeach
   @endif
    </tbody>
  </table>
@endsection