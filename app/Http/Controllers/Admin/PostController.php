<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        // $posts=Post::all();
        $posts = Post::where("user_id", Auth::user()->id)->get();

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
        $tags=Tag::all();
        return view('admin.posts.create',compact("categories","tags"));
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
            "category_id"=>"nullable",
            "tags"=>"nullable",
            "coverImg"=>"nullable|max:500"
        ]);
        $post=new Post();
        $post->user_id=1;
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
        if (key_exists("coverImg",$data)) {
            $post->coverImg=Storage::put("postCovers",$data["coverImg"]);
        }
        $post->save();
        if (key_exists("tags",$data)) {
            $post->tags()->attach($data["tags"]);
        }
       
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
        $tags=Tag::all();
        return view("admin.posts.edit", [
          "post" => $post,
          "categories" => $categories,
          "tags"=>$tags
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
        $data = $request->validate([
            "title" => "required|min:5",
            "content" => "required|min:20",
            "category_id" => "nullable|exists:categories,id",
            "tags" => "nullable|exists:tags,id",
            "coverImg"=>"nullable|image|max:500"
          ]);
      
          $post = Post::findOrFail($id);
         $post->update($data);
         if (key_exists("coverImg",$data)) {
            if ($post->coverImg) {
                Storage::delete($post->coverImg);
            }
            $coverImg= Storage::put("postCovers",$data["coverImg"]);
            $post->coverImg=$coverImg;
            $post->save();
         }
        
      
           $post->category_id = $data["category_id"];
         
      
         if (key_exists("tags", $data)) {
            $post->tags()->sync($data["tags"]);
         }
          return redirect()->route("admin.posts.show", $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        $post->tags()->detach();
        $post->delete();
        return redirect()->route("admin.posts.index");
    }
    
}
