@extends('layouts.admin')

@section('content')


<h1>Media</h1>


<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Created</th>
        <th>Email</th>

      </tr>
    </thead>
    <tbody>

    @foreach($photos as $photo)
      <tr>
        <td>{{$photo->id}}</td>
        <td>{{$photo->file}}</td>
        <td style="border:1px solid yellow">{{$photo->created_at ? $photo->created_at : 'No date Avaliable'}}</td>

        <td>
          

          {!! Form::open(['method'=>'DELETE','action'=>['AdminMediaController@destroy',$photo->id]])  !!}
  


                      <div class="form-group">
                      
                      
                      {!!Form::submit('Delete Post',[

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