<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Catogery;
use App\Models\Comment;
use App\Models\posts;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{




    public function index(){
            $posts = Posts::paginate(10);
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
        $posts = Posts::where('id', $id)->with('comment')->first();
//        dd($posts->comment);
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
    public function comment(Request $request,$id){
        $request->validate([
            'content' => 'required'
        ],[
            'required' => 'Comment vào bạn êiiiiiii'
        ]);
        $comment = \request()->all('content');
        $comment['user_id'] = \Auth::user()->id;
        $comment = new Comment($comment);
        $post = Posts::find($id);
        $post->comment()->save($comment);
        return back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categories = Catogery::all(['id', 'name']);
        $post = Posts::find($id);
        if (\Auth::user()->is_admin === config('common.role.admin') || \Auth::user()->id === $post->user_id  ){
            return view('post.edit', compact('categories','post'));
        }

        return redirect()->route('posts.index');
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
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->cate_id = $request->input('cate_id');
        $post->save();
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
