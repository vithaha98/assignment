<?php

namespace App\Models;

use App\Models\Cates;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    protected $fillable = array('title','content','cate_id', 'user_id');
    public function user(){
        return $this->belongsTo(Users::class,'user_id');

    }
    public function cate(){
        return $this->belongsTo(Cates::class,'cate_id');
    }
}
