<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Events\PostCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->paginate(3); 
        return view('posts.index',['posts' =>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();   
        return view('posts.create', compact('users'));
    }

    public function store(Request $request)

    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->slug = $request->input('slug');
        $post->user_id = Auth::id();
       

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('image', 'public');
            $post->image = $imagePath;
        } 

        // $user = User::find(1); 
        // $user = User::find($post->user_id);

        // Retrieve the authenticated user
        $user = $request->user();

        // $post = $user ->posts()->create([
        // 'title' =>$post->title,
        // 'body' => $post->body,
        // 'slug' => $post->slug,
        // 'user_id'=>$post->user_id,
        // 'image'=>$post->image
        // ]);

        $post->save();
        event(new PostCreated($post));

        // 

       
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('posts.edit',['post' =>$post]);
    }

    
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        if ($request->user()->id !== $post->user_id) {
            return redirect()->route('posts.index')->with('message', 'You are not authorized to edit this post.');

        }

        $post->save();

    return redirect()->route('posts.index')->with('success', 'User updated successfully!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        // $post = Post::withTrashed()->find($id);
        $post = Post::findOrFail($id);
        $post->delete();
    return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
}


}
