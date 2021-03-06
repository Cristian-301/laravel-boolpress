<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\InfoPost;
use App\Tag;
use App\Image;
use Illuminate\Support\Str;


class PostController extends Controller
{

    private $postValidation = [
        'title' => 'required|max:150',
        'subtitle' => 'required|max:250',
        'text' => 'required',
        'author' => 'required',
        'publication_date' => 'required',
        'post_status' => 'required',
        'comment_status' => 'required'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        // dd($posts);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $images = Image::all();
        return view('posts.create', compact('tags', 'images'));
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
        // dd($data);
        $request->validate($this->postValidation);

        $newPost = new Post();
        $newPost->fill($data);
        $newPost['slug'] = Str::slug($newPost->title, '-');
        $newPostSaveResult = $newPost->save();
        // dd($newPost);
        
        $data['post_id'] = $newPost->id;
        $newInfoPost = new InfoPost();
        $newInfoPost->fill($data);
        
        $newInfoPost->save();

        if($newPostSaveResult) {
            if(!empty($data['tags'])) {
                $newPost->tags()->attach($data['tags']);
            }
        }

        if($newPostSaveResult) {
            if(!empty($data['images'])) {
                $newPost->images()->attach($data['images']);
            }
        }

        return redirect()->route('posts.index')->with('message', 'Post ' . $newPost->name . 'creato correttamente!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // dd($post);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {   
        $tags = Tag::all();
        $images = Image::all();
        
        return view('posts.edit', compact('post', 'tags', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        // dd($data);
        $request->validate($this->postValidation);
        $post->update($data);

        $infoPost = InfoPost::where('post_id', $post->id)->first();
        $data['post_id'] = $post->id;
        $infoPost->update($data);
        // $post->infoPost->update($data);

        if(empty($data['tags'])) {
            $post->tags()->detach();
        } else {
            $post->tags()->sync($data['tags']);
        }

        if(empty($data['images'])) {
            $post->images()->detach();
        } else {
            $post->images()->sync($data['images']);
        }

        return redirect()->route('posts.index')->with('message', 'Post cancellato correttamente!' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('message', 'Post cancellato correttamente!' );
    }
}
