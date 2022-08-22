<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AppealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('appeals', Post::class);

        $posts = Post::get();
        $progress = $posts->where('status','=','progress')->count();
        $inProgress = $posts->where('status','=','inProgress')->count();
        $success = $posts->where('status','=','success')->count();
        return view('appeals.index', ['posts' => $posts],['progress' => $progress,'inProgress' => $inProgress,'success'=> $success]);
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
        //
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
    public function update(Request $request,$post)
    {

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

    public function showProgress()
    {
        $this->authorize('appeals', Post::class);
        $posts = Post::where('status','=','progress')->get();
        $progress = $posts->where('status','=','progress')->count();
        return view('appeals.progress', ['posts' => $posts,'progress' => $progress]);
    }
    public function showInProgress()
    {
        $this->authorize('appeals', Post::class);
        $posts = Post::where('status','=','inProgress')->get();
        $inProgress = $posts->where('status','=','inProgress')->count();
        return view('appeals.inProgress', ['posts' => $posts,'inProgress' => $inProgress]);
    }
    public function showSuccess()
    {
        $this->authorize('appeals', Post::class);
        $posts = Post::where('status','=','success')->get();
        $success = $posts->where('status','=','success')->count();
        return view('appeals.success', ['posts' => $posts,'success' => $success]);
    }
}
