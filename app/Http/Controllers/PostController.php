<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $posts = Post::all();
        // $users = User::all();

        // return view('posts.posts', ['posts' => $posts, 'users' => $users]);

        // $posts = Post::all();
        // return view('posts.posts', ['posts' => $posts]);

        //$user = User::find(1);
        //$user->mypost; // select * from post where user_id = $user->id

        //return view('posts.posts', ['user' => $user]);

       // $posts = Post::all(2)->user;
        //return view('posts.posts', ['posts' =>$posts]);


        // $user = Auth::user();

        // $id = Auth::id();

        // return $user;

        // $user = User::find(2);
        // return view('dashboard', ['user' =>$user]);
       //return $user->name;


        $users = User::all();

        //return $users->post;
        $posts = Post::all();

        $comments = Comment::all();
        // foreach($users as $user) {
        //     echo $user->id;
        // }
        return view('posts.allposts', ['users' => $users, 'posts' => $posts, 'comments' => $comments]);

    }

    public function friends() {
        return " Hello These are friends function from controller";
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
    public function store(Request $request)
    {
        $user_id = Auth::id();
        $post = new Post;
        $post ->title = $request->title;
        $post->postbody = $request->postbody;
        $post->user_id = $user_id;
        $post->save();

        //return $request->title;

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post'=> $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
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
        
        $post = Post::find($id);
        $post->title = $request->title;
        $post->postbody = $request->postbody;
        

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
        Post::find($id)->delete();
        return redirect()->route('posts.index');
    }
}
