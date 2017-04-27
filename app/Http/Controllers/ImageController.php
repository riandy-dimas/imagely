<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Image;

class ImageController extends Controller
{
  public function imageUploadPost(Request $request)
    {
      $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

      $image = new Image;
      $image->user_id = Auth::id();
      $image->image_name = $imageName;
      $image->save();

      return redirect('/home')
        ->with('success','Image Uploaded successfully.');
    }

  public function imageDelete(Request $request)
  {
    // dd('images' . $request->image_name);
    File::delete(('images/') . $request->image_name);

    Image::destroy($request->image_id);
    return redirect('/home')->with('success','Image Deleted successfully.');
  }
}
