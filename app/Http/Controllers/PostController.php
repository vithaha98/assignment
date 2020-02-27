<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Catogery;
use App\Models\posts;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
//        dd(\Auth::user()->id);4
        $posts = Posts::paginate(20);
//        $posts = posts::where('user_id', \Auth::user()->id)->paginate(10);
        return view('post.index',['posts'=>$posts]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Posts::find($id);
        return view('post.show',compact('posts'));
    }


    public function create()
    {
        $categories = Catogery::all(['id', 'name']);
        return view('post.create', compact('categories'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $data = request()->all(['title', 'content','cate_id']);
        $data['user_id'] = \Auth::user()->id;
        $post = Posts::create($data);


        return redirect()->route('posts.index');
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
        $categories = Catogery::all(['id', 'name']);
        $post = Posts::find($id);
        return view('post.edit', compact('categories','post'));
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
        $post = Posts::find($id);
        $data = request()->all(['title', 'content','cate_id']);
        $data['user_id'] = \Auth::user()->id;
        $post = Posts::create($data);


        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('posts')->where('id','=',$id)->delete();
        return redirect()->route('posts.index');
    }
    public function user(){
        return $this->belongsTo(Users::class);
    }
}
