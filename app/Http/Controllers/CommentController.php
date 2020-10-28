<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comment;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation for comment 
        $request->validate([
            'comment' => 'required',
        ]);

        //create comment entry in database
        Comment::create([
            'comment' => $request->comment,
            'user_id' => Auth::user()->id,
            'parent_id' => 0,
        ]);

        //redirect to home page
        return redirect('/home');
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
        //delete comment and subcomment
        Comment::where('id',$id)->orWhere('parent_id',$id)->delete();
        return redirect('/home');
    }

    public function replies(Request $request,$id)
    {
        //validation for comment 
        $request->validate([
            'comment' => 'required',
        ]);
        //create comment entry in database
        Comment::create([
            'comment' => $request->comment,
            'user_id' => Auth::user()->id,
            'parent_id' => $id,
        ]);
        //redirect to home
        return redirect('/home');
    }
}