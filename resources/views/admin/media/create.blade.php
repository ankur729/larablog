@extends('layouts.admin')


@section('styles')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
@endsection


@section('content')


<h1>Upload Media</h1>


{!! Form::open(['method'=>'POST','action'=>'AdminMediaController@store','class'=>'dropzone'])  !!}






{!!Form::close()!!}

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
@endsection