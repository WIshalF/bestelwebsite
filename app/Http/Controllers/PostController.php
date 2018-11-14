<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $this->validate($request, array(
            'post' => 'required|max:20'
        ));
        Post::create($request->all());
        return redirect()->route('post.index')->with('message','Blog is gepost!');

//
//        $post = new Post;
//        $post->post = $request->input('post');
//
//        $post->save();
//
//        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post = Post::find($id);
        //check for correct user
        if(auth()->user()-> id !==$post->user_id){
            return view('/posts')->with('Error', 'Unauthorized');
        }
      return view('posts.edit',compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());
        return redirect()->route('post.index') ->with('message','Quote bewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index') ->with('message','Quote verwijderd :(');
    }
    public function scopeSearchBypost($query, $post)
    {
        if ($post!='') {
            $query->where(function ($query) use ($post) {
                $query->where("name", "LIKE","%$post%")
                    ->orWhere("email", "LIKE", "%$post%")
                    ->orWhere("blood_group", "LIKE", "%$post%")
                    ->orWhere("phone", "LIKE", "%$post%");
            });
        }
        return $query;
    }
}
