<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Image;
use App\Comment;

class CommentController extends Controller
{
  public function commentPost(Request $request){
    $statement = $request->statement;

    $comment = new Comment;
    $comment->user_id = Auth::id();
    $comment->image_id = $request->image_id;
    $comment->statement = $request->statement;
    $comment->save();

    return back()
        ->with('success','Comment Posted successfully.');
  }
}
