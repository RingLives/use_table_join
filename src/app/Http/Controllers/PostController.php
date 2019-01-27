<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\PostModel;
use App\Model\LikeModel;
use Auth;
use DB;

class PostController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($uuid = null){
        $posts = [];
        if(!isset($uuid) && empty($uuid)) {
    	   $posts = PostModel::join('users','users.id','posts.user_id')
        			->select('users.name','posts.*')
        			->orderBy('created_at','desc')
        			->get();

            $this->totalLikeByPostID($posts);


        }else if (isset($uuid) && !empty($uuid)) {
            $posts = PostModel::join('users','users.id','posts.user_id')
                    ->select('users.name','posts.*')
                    ->where('posts.user_id',$uuid)
                    ->orderBy('created_at','desc')
                    ->get();

            $this->totalLikeByPostID($posts);
        }else{}

    	return $posts;
    }

    /**
     * @return Void|mixed 
     */
    public function totalLikeByPostID($posts) {
        if(isset($posts) && !empty($posts)) {
            foreach ($posts as &$post) {
                $post->total_like = (LikeModel::where('post_id',$post->id)->select(DB::Raw('SUM(likes) as likes'))->first())->likes;
            }
        }
    }

	public function store(Request $request) {

		$data = $request->all();

		PostModel::create([
            'post' => $data['post'],
            'user_id' => Auth::User()->id,
        ]);

		return Redirect()->Route('home');
	}
}