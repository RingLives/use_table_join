<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LikeModel extends Model
{
	protected $table = 'likes';
    protected $fillable = [
        'likes', 'user_id', 'post_id',
    ];
}
