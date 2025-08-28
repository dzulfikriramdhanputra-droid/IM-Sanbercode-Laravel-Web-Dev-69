<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\post;
use file;
use Illluminate\Routing\Controllers\HasMiddlerware;
use Illluminate\Routing\Controllers\Middlerware;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public static function middleware():array
    {
        return [
            new Middlerware('auth', except: ['index', 'show']),
        ];
    }

    public function index()
    {
        $post = post::all();
        return view('post.tampil', ['post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = category::all();
        return view('post.tambah', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required'
        ]);
        
    
        $newImageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('image'), $newImageName);

        $post = new post;

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category_id');
        $post->image = $newImageName;

        $post->save();

        return redirect('/post');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = post::find($id);
        return view('post.detail', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = category::all();
        $post = post::find($id);

        return view('post.edit', ['post'=>$post, 'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png|max:2048',
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required'
        ]);
        $post = post::find($id);

        if($request->has('image')){
            file::delete('image/'. $post->image);
            $newImageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('image'), $newImageName);

            $post->image = $newImageName;
        }

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category_id');

        $post->save();

        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = post::find($id);
        File::delete('image/'. $post->image);

        $post->delete();

        return redirect('/post');
    }
}
