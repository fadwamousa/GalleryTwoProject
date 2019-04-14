<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use Auth;
use Validator;

class AlbumsController extends Controller
{
    public function index(){
      $albums = Album::with('photos')->get();
      return view('albums.index',compact('albums'));
    }

    public function create(){
      return view('albums.create');
    }

    public function store(Request $request){

      $validate = Validator::make($request->all(),
                 [
                   'name'         => 'required',
                   'description'  => 'required',
                   'cover_image'  => 'image|max:1999'
                 ]);

    $fileNameWithExtension = $request->file('cover_image')->getClientOriginalName();
    $filename              = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
    $extension             = $request->file('cover_image')->getClientOriginalExtension();
    $filenameToStore       = $filename.'_'.time().'.'.$extension;

    $path                  = $request->file('cover_image')->storeAs('public/cover_images',$filenameToStore);

    $album        = new Album();
    $album->name  = $request->input('name');
    $album->description  = $request->input('description');
    $album->cover_image  = $filenameToStore;
    $album->save();

    return redirect('/')->with('success','Album Created');


    }

    public function show($id){

      $album = Album::with('photos')->find($id);
      return view('albums.show')->with('album',$album);

    }

}
