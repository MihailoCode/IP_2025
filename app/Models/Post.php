<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['title','body','user_id','created_at'];

    public function user()    { return $this->belongsTo(User::class); }
    public function comments(){ return $this->hasMany(Comment::class); }
    public function likes()   { return $this->morphMany(Like::class,'likeable'); }
}
