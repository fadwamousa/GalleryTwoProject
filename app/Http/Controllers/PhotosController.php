<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Photo;
use Auth;
use Validator;

class PhotosController extends Controller
{
  public function create($album_id){
    return view('photos.create')->with('album_id',$album_id);
  }

  public function store(Request $request){

    $this->validate($request,
    [
      'title'          => 'required',
      'description'    => 'required',
      'photo'          => 'required|max:1999'
    ]);

    $fileNameWithExtension = $request->file('photo')->getClientOriginalName();
    $filename              = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
    $extension             = $request->file('photo')->getClientOriginalExtension();
    $filenameToStore       = $filename.'_'.time().'.'.$extension;

    $path                  = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'),$filenameToStore);

    $album                 = new Photo();
    $album->title          = $request->input('title');
    $album->description    = $request->input('description');
    $album->photo          = $filenameToStore;
    $album->size           = $request->file('photo')->getClientSize();
    $album->album_id       = $request->input('album_id');
    $album->save();

    return redirect('/albums')->with('success','Photo Created');

  }


  public function show($id){

    $photo = Photo::findOrFail($id);
    return view('photos.show',compact('photo'));

  }

  public function destroy($id){
    $photo = Photo::findOrFail($id);
    if(Storage::delete('/public/photos/'.$photo->album_id.'/'.$photo->photo)){

      $photo->delete();
      return redirect('/')->with('success','Photo Deleted');

    }
  }
}
