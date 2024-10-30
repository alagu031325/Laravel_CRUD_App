<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(3);
        return view('index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                //image validation rule and it should be less than 2kb
                'image' => ['required','max:2028','image'],
                'title' => ['required','max:255'],
                'category_id' => ['required','integer'],
                'description' => ['required']
            ]
        );
        //we need to store the image in storage and then save the path to the database - also change the name of the image so that the names dont conflict even when different users upload images with same name
        $fileName = time().'_'.$request->image->getClientOriginalName();

        $filePath = $request->image->storeAs('uploads',$fileName); //uploads/filename

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->image = 'storage/'.$filePath; //storage/uploads/filename
        $post->save();

        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'title' => ['required','max:255'],
                'category_id' => ['required','integer'],
                'description' => ['required']
            ]
        );

        $post = Post::findOrFail($id);

        if($request->hasFile('image')){
            $request->validate(
                [
                    //image validation rule and it should be less than 2kb
                    'image' => ['max:2028','image'],
                ]
            );

            $fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->image->storeAs('uploads',$fileName); //uploads/filename

            //If validation is passed then we can delete the previous image and upload our new image
            File::delete(public_path($post->image));

            $post->image = 'storage/'.$filePath; //storage/uploads/filename
        }
      
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destroy_post = Post::findOrFail($id);
        $destroy_post->delete();
        return redirect()->route('posts.index');
    }

    /**
     * Soft delete resource from storage
     */
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('trashed',compact('posts'));
    }

    /**
     * Restore a soft deleted resource
     */
    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->back();
    }

    /**
     * Permanently delete a soft deleted resource
     */
    public function forceDelete($id)
    {
        //If id not found redirected to 404 page
        $post = Post::onlyTrashed()->findOrFail($id);
        //Delete image from local storage
        File::delete(public_path($post->image));
        //Delete entry from db permanently
        $post->forceDelete();
        return redirect()->back();
    }
}
