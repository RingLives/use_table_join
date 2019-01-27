<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
	protected $table = 'posts';
    protected $fillable = [
        'post', 'user_id', 'images',
    ];
}
