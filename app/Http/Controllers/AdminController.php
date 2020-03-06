<?php

namespace App\Http\Controllers;

use App\Http\Requests\CateRequest;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UserRequest;
use App\Models\Catogery;
use App\Models\Comment;
use App\Models\Posts;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::all();
        $users = Users::all();
        $categories = Catogery::all();
        return view('admin.index',['posts'=>$posts,'users'=>$users,'cates'=>$categories]);
    }
    public function post_index(){
        $posts = Posts::paginate(10);

        return view('admin.posts.index',['posts'=>$posts]);
    }
    public function users_index(){
        $users = Users::paginate(10);
        return view('admin.users.index',['users'=>$users]);
    }
    public function cates_index(){
        $cates = Catogery::paginate(10);
        return view('admin.categories.index',['cates'=>$cates]);
    }
    public function comment_index(){
        $comment = Comment::paginate(10);
        return view('admin.comments.index',['comments'=>$comment]);
    }
    public function create_user(){
        return view('admin.users.create');
    }
    public function create_post(){
    $categories = Catogery::all(['id', 'name']);
    return view('admin.posts.create', compact('categories'));
    }
    public function  create_cates(){
        return view('admin.categories.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_user($id){
        $users= Users::findOrFail($id);
        return view('admin.users.edit',compact('users'));
    }

    public function edit_cates($id){
        $cates= Catogery::findOrFail($id);
        return view('admin.categories.edit',compact('cates'));
    }
    public function update_cates(CateRequest $request, $id){
        $cates = Catogery::findOrFail($id);
        $cates->name = $request->input('name');
        $cates->save();
        return redirect()->route('admin.cates');
    }
    public function update_user(UserRequest $request,$id){
        $users = Users::findOrFail($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->dob = $request->input('dob');
        $users->save();
        return redirect()->route('admin.users');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function posts_store(PostRequest $request)
    {
        $data = request()->all(['title', 'content','cate_id']);
        $data['user_id'] = \Auth::user()->id;
        $post = Posts::create($data);
        return redirect()->route('admin.posts');
    }
    public function users_store(UserRequest $data)
    {
        //
        Users::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'dob' =>$data['dob'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect()->route('admin.users');
    }
    public function cates_store(CateRequest $request){
        $data = \request()->all(['name']);
        $cates = Catogery::create($data);
        return redirect()->route('admin.cates');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function comments_destroy($id){
        $comment = Comment::findOrFail($id);
        $comment->delete();
    }
    public function cates_destroy($id){
        $cates = Catogery::findOrFail($id);
        $cates->delete();
    }
    public function users_destroy($id){
        $users = Users::findOrFail($id);
        $users->delete();
    }
}

