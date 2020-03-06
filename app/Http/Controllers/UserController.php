<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Posts;
use App\Models\Users;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
//    public function __construct()
//    {
//        $this->middleware(['auth']);
//    }
    public function index(){
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
    public function edit( $id){
        $users =  Users::find($id);
        if (\Auth::user()->is_admin === config('common.role.admin') || \Auth::user()->id === $post->user_id  ){
            return view('users.edit', compact('users'));
        }
    }
    public function update(UserRequest $request,$id){
//        dd($request);
        $users = Users::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->dob = $request->input('dob');
        $users->save();
        return redirect()->route('users.index');

    }
//    public function posts(){
////        khai bao khoa chinh id
//        //khai bao khoa ngoai user_id bang posts
//        return $this->hasMany(Posts::class, 'user_id','id');
//    }
}
