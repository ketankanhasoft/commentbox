<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /* get comment with the replies and User*/ 
        $comments=Comment::with('replies','user')
                        ->where(['parent_id'=>0])
                        ->orderBy('created_at','desc')
                        ->get();
        return view('home',compact('comments'));
    }
}
