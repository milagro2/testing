<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();

        return view('posts.index', compact('posts'));
    }



    public function create()
    {
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }
    public function store(StorePostRequest $request) 
    {
        $data = $request->validated();
        $data['text'] = $request->input('time', '');
        unset($data['time']);
        Post::create($data); 
    
        return redirect()->route('posts.index');
    }
    


    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $post->update([
            'begintijd' => $request->input('begintijd'),
            'eindtijd' => $request->input('eindtijd'),
            'category_id' => $request->input('category_id'),
        ]);
    
        return redirect()->route('posts.index');
    }
    

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
