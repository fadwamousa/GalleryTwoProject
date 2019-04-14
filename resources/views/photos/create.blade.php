@extends('layouts.app')
@section('content')
<h3>Create Photo Now </h3>
{!!Form::open(['method'=>'POST','action'=>'PhotosController@store','files' => true])!!}
<div class="form-group">


  {{Form::text('title',null,['class'=>'form-control','placeholder'=>'Your Name Album'])}}

</div>
<div class="form-group">


  {{Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Your Detail Album'])}}

</div>

<div class="form-group">


  {{Form::file('photo',null,['class'=>'form-control'])}}

</div>
{{Form::hidden('album_id',$album_id)}}

<div class="form-group">


  {{Form::submit('Create-Photo',['class'=>'btn btn-info'])}}

</div>
{!!Form::close()!!}
@endsection
