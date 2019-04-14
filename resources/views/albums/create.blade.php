@extends('layouts.app')
@section('content')
<h3>Create Album Now </h3>
{!!Form::open(['method'=>'POST','action'=>'AlbumsController@store','files' => true])!!}
<div class="form-group">


  {{Form::text('name',null,['class'=>'form-control','placeholder'=>'Your Name Album'])}}

</div>
<div class="form-group">


  {{Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Your Detail Album'])}}

</div>

<div class="form-group">


  {{Form::file('cover_image',null,['class'=>'form-control'])}}

</div>

<div class="form-group">


  {{Form::submit('upload',['class'=>'btn btn-info'])}}

</div>
{!!Form::close()!!}
@endsection
