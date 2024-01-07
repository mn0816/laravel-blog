@extends('layouts.app')

@section('title','edit post')

@section('content')  

   <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
       @csrf
       @method('PATCH')
       <div class="mb-3">
           <label for="title" class="form-label">Title</label>
           <input type="text" name="title" id="title" value="{{$post->title}}" class="form-control" placeholder="Title">
       </div>
       <div class="mb-3">
            <label for="descriptin" class="fom-label">Description</label>
            <textarea name="description" id="description" rows="3" class="form-control" placeholder="Description">{{$post->description}}</textarea>
       </div>
       <div class="mb-3">
             <img src="{{asset('/storage/images/'.$post->image)}}" style="height: 350px" alt="" class="img-thumbnail d-block">
             <label for="image" class="form-label">Image</label>
             <input type="file" name="image" id="imege" class="form-control">
             <div class="form-text">
                Accepted formats: jpeg, jpg, png, gif  <br>
                Maximum file size: 148mb
             </div>
       </div>
       <button type="submit" class="btn btn-warning px-5">Save</button>
   </form>

@endsection