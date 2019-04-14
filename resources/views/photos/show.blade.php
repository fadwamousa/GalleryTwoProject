@extends('layouts.app')

@section('content')

<h3>{{$photo->title}}</h3>
<p>{{$photo->description}}</p>

<a href="{{url('/albums/'.$photo->album_id)}}">Back to Gallery</a>
<hr>
<img src="{{asset('/storage/photos/'.$photo->album_id.'/'.$photo->photo)}}" alt="{{$photo->title}}" width="450">
<br> <br>
{!!Form::open(['method'=>'DELETE','action'=>['PhotosController@destroy',$photo->id]])!!}
{{Form::submit('DELETE',['class'=>'btn btn-danger'])}}
{!!Form::close()!!}
@endsection
