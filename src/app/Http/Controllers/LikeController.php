<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\PostModel;
use App\Model\LikeModel;
use Auth;

class LikeController extends Controller
{
	CONST LIKE = 1;

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function store(Request $request) {

		$data = $request->all();

		$exits_like = LikeModel::where([
						['post_id',$data['post_id']],
						['user_id',Auth::User()->id]
					])
					->exists();

		if($exits_like === false) {
			LikeModel::create([
	            'likes' => self::LIKE,
	            'post_id' => $data['post_id'],
	            'user_id' => Auth::User()->id,
	        ]);
		}
		return Redirect()->Back();		
	}
}