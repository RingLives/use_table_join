<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\PostModel;
use Auth;

class ShareController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function store(Request $request) {
		$this->print_me($request->all());
	}
}