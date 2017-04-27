<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use App\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', ['images' => Image::all()]);
    }

    public function showImage($id)
    {
        return view('singleImage', ['image' => Image::find($id), 'comments' => Comment::where('image_id', $id)->get()]);
    }

    public function showUser($id)
    {
        return view('singleImage');
    }
}
