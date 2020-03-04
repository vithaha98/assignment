<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['content', 'user_id'];
    //
    public function post(){
        return $this->belongsTo(Posts::class,'post_id');
    }

    public function users(){
        return $this->belongsTo(Users::class,'user_id');
    }
}
