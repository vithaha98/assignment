<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(){
//        $users = Users::paginate(10);
        $users = Users::where('id',\Auth::user()->id)->first();
        return view('users.index',['users'=>$users]);
    }
    public function show(){
        $posts = posts::where('user_id', \Auth::user()->id)->paginate(10);

        return view('users.show',compact('posts'));
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
