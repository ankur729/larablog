
@extends('layouts.admin')


@section('content')

@if(Session::has('delete_user'))

<p class="alert alert-danger">{{Session('delete_user')}}</p>
@endif
</h1>usersss</h1>
 <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Photo</th>
        <th>Role</th>
        <th>Status</th>
        <th>Email</th>
        <th>Created At</th>
        <th>Updated At</th>
     
      </tr>
    </thead>
    
    @if($users)

    @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        
		<td><a href="{{route('admin.user.edit',$user->id)}}">{{$user->name}}</a></td>
        <td><a href="../../public/{{$user->photo->file}}"><img class="img-circle" src="../../public/{{$user->photo ? $user->photo->file : 'http://placehold.it/350x150'}}" style="width:50px;height: 50px;"></a></td>
        <td>{{$user->role->name}}</td>
        <td>{{$user->is_active==1? 'ACTIVE' :'NOT ACTIVE'}}</td>
        
        <td>{{$user->email}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
        
      </tr>
      @endforeach

      @endif
    </tbody>
  </table>	

@endsection