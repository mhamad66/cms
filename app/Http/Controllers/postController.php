<?php

namespace App\Http\Controllers;

use App\category;
use App\Http\Requests\postRequest;
use App\Http\Requests\postUpdateRequest;
use App\post;
use Illuminate\Http\Request;
use App\tag;
use Illuminate\Support\Facades\Storage;

class postController extends Controller
{


    public function __construct()
    {

        $this->middleware('checkCategory')->only('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', category::all())->with('tags', tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(postRequest $request)
    {
        $post = post::create([
            'title'=> $request->title,
            'description'=>$request->description,
            'content'=> $request->content,
            'image'=>$request->image->store('images', 'public'),
            'category_id'=>$request->categoryID
        ]);
      if($request->tags){
        $post->tags()->attach($request->tags);
      }
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('posts.create')->with([
            'post' => $post,
            'categories' => category::all(),
            'tags'=> tag::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(postUpdateRequest $request, post $post)
    {
        $data = $request->only(['title', 'description', 'content']);
        if ($request->hasFile('image')) {
            $image = $request->image->store('images', 'public');
            storage::disk('public')->delete($post->image);
            $data['image'] = $image;
        }
        if($request->tags){
            $post->tags()->sync($request->tags);
                }
        $post->update($data);
        session()->flash('success', 'posts update successfuly');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =  Post::withTrashed()->where('id', $id)->first();
        if ($post->trashed()) {
            Storage::delete($post->image);
            $post->forceDelete();
        } else {
            $post->delete();
        }
        return redirect(route('posts.index'));
    }
    public function trashed()
    {
        $trashed = post::onlyTrashed()->get();
        return view('posts.index')->withPosts($trashed);
    }
    public function restore($id)
    {
        post::withTrashed()->where('id', $id)->restore();
        return redirect(route('posts.index'));
    }

}
