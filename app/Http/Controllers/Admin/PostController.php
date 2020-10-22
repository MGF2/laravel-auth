<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $tags = Tag::all();
        return view('admin.posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
          'title' => 'required|min:5|max:100',
          'body' => 'required|min:5|max:500'
        ]);
        $data['user_id'] = Auth::id();
        $data['slug']=Str::slug($data['title'],'-');
        $newPost = New Post;
        $newPost->fill($data);
        $saved = $newPost->save();
        // dd($saved);
        if ($saved) {
          return redirect()->route('posts.index');
        }
        //da spostare sopra prima dell if e mettere nella edit
        // $postNew = new Post;
        // $postNew = fill($data);
        // $saved = $postNew->save();
        // $id_post = $postNew->id;
        // $postNew->tags()->attach($data['tags']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $data['slug']=Str::slug($data['title'],'-');
        $post->update($data); //non serve il save
        return redirect()->route('posts.index')->with('status','Hai modificato il post'. $post->id);
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
        return redirect()->route('posts.index')->with('status','Hai cancellato il post'. $post->id);
    }
}
