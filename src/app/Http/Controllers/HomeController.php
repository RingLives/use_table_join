<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\PostModel;

class HomeController extends Controller
{
    public $post_object;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostController $PostController)
    {
        $this->middleware('auth');
        $this->post_object = $PostController;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = $this->post_object->index();
        return view('home', compact('posts'));
    }
}
