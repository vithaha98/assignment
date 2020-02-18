<?php

namespace App\Http\Controllers;
use App\Models\posts;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Homecontroller extends BaseController
{
    //
    public function index(){
        $posts = posts::paginate(10);
        return view('index',['posts'=>$posts]);
    }
}
