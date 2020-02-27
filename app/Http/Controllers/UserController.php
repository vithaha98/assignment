<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $users = Users::paginate(10);
        return view('users.index',['users'=>$users]);
    }
    public function show(){
        $user = Users::with('posts')->get();
        dd($user);
        return redirect()->route('users.show');
    }
    public function create(){
        return view('users.create');
    }
    public function store(Request $request)
    {
        $request = request()->all();
        dd($request);
    }
//    public function posts(){
////        khai bao khoa chinh id
//        //khai bao khoa ngoai user_id bang posts
//        return $this->hasMany(Posts::class, 'user_id','id');
//    }
}
