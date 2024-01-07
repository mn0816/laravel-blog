<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    private $post;
    public function __construct(Post $post){
    
        
        $this->post = $post;
    }

    public function index(){
        $all_posts = $this->post->latest()->get();
        return view ('post.index')
            ->with('all_posts',$all_posts);
    }

    public function create(){

        return view ('post.create');
    }

    public function store(Request $request){
        $this->post->title = $request->title;
        $this->post->description = $request->description;
        $this->post->image = $this->saveImage($request);
        $this->post->user_id = Auth::user()->id;
        $this->post->save();

        return redirect()->route('index');
    }
    public function saveImage($request){
        $image_name = time().".".$request->image->extension();

        $request->image->storeAs('public/images/',$image_name);
        #public/images/1703076562.jpeg
        #exact location of file; where i want to save file after upload
        
        return $image_name;
    }
    public function edit($id){
        $post = $this->post->findOrFail($id);

        return view('post.edit')->with('post',$post);
        }

    public function update($id, Request $request){
        $post = $this->post->findOrFail($id);

        $post->title = $request->title;
        $post->description = $request->description;
        if($request->image){
            $post->image = $this->saveImage($request);
        }
        
        $post->save();


        return redirect()->route('post.show', $id);

    }

    Public function show($id){
        $post = $this->post->findOrFail($id);

        return view('post.show')->with('post', $post);

    }

    public function destroy($id){
        $this->post->destroy($id);

        return redirect()->route('index');
    }
    }

