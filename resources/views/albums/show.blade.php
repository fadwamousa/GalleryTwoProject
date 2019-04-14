@extends('layouts.app')
@section('title','Show Page')
@section('content')

<h3>{{$album->name}}</h3>
<a class="button secondary" href="{{url('/')}}">GO BACK</a>
<a class="button" href="{{url('/photos/create/'.$album->id)}}">upload photo to album</a>
<hr>
@if(count($album->photos) > 0)
  <?php
    $colcount = count($album->photos);
    $i = 1;
  ?>
  <div id="albums">
    <div class="row text-center">
      @foreach($album->photos as $photo)
        @if($i == $colcount)
           <div class='medium-4 columns end'>
             <a href="{{url('/photos/'.$photo->id)}}">
                <img class="thumbnail" src="{{asset('storage/photos/'.$photo->album_id.'/'.$photo->photo)}}" alt="{{$photo->title}}">
              </a>
             <br>
             <h4>{{$photo->title}}</h4>
        @else
        <div class='medium-4 columns end'>
          <a href="{{url('/photos/'.$photo->id)}}">
             <img class="thumbnail" src="{{asset('storage/photos/'.$photo->album_id.'/'.$photo->photo)}}" alt="{{$photo->title}}">
           </a>
          <br>
          <h4>{{$photo->title}}</h4>
        @endif
        @if($i % 3 == 0)
        </div></div><div class="row text-center">
        @else
          </div>
        @endif
        <?php $i++; ?>
      @endforeach
    </div>
  </div>
@else
  <p>No Photos To Display</p>
@endif

@endsection
