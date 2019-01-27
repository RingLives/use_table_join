<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\PostModel;
use Auth;

class ProfileController extends Controller
{
    public $post_object;

	public function __construct(PostController $PostController)
    {
        $this->middleware('auth');

        $this->post_object = $PostController;
    }

    public function index($uuid = null){
        $posts = [];
        if(!isset($uuid) && empty($uuid)) {

            $uuid = Auth::User()->id;
            $posts = $this->post_object->index($uuid);

        }else if (isset($uuid) && !empty($uuid)) {
            $posts = $this->post_object->index($uuid);
        }else{}    	

    	return view('profile',compact('posts'));
    }

	public function store(Request $request) {}
}