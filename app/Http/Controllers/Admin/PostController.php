<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('admin.posts.index',compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.posts.create',compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            "title"=>"required|min:5",
            "content"=>"required|min:20",
            "category_id"=>"nullable"
        ]);
        $post=new Post();
        $post->fill($data);
        $slug=Str::slug($post->title);
        $exists= Post::where("slug",$slug)->first();
        $counter=1;
        while ($exists) {
            $newSlug=$slug . "-" . $counter;
            $counter++;
            $exists=Post::where("slug",$slug)->first();
            if (!$exists) {
                $slug=$newSlug;
            }
        }
        $post->slug=$slug;
        $post->user_id=Auth::user()->id;
        $post->save();
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post=Post::where("slug",$slug)->first();
        return view("admin.posts.show",compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where("slug", $slug)->first();
        $categories = Category::all();
    
        return view("admin.posts.edit", [
          "post" => $post,
          "categories" => $categories
        ]);
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
        //
    }
}
