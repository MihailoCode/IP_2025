<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $fillable = ['body','user_id','post_id','created_at'];

    public function user()    { return $this->belongsTo(User::class); }
    public function post()    { return $this->belongsTo(Post::class); }
    public function likes()   { return $this->morphMany(Like::class,'likeable'); }
}
