@extends('layouts.app')

@section('title','create post')

@section('content')  

   <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
       @csrf
       <div class="mb-3">
           <label for="title" class="form-label">Title</label>
           <input type="text" name="title" id="title" class="form-control" placeholder="Title">
       </div>
       <div class="mb-3">
            <label for="descriptin" class="fom-label">Description</label>
            <textarea name="description" id="description" rows="3" class="form-control" placeholder="Description"></textarea>
       </div>
       <div class="mb-3">
             <label for="image" class="form-label">Image</label>
             <input type="file" name="image" id="imege" class="form-control">
             <div class="form-text">
                Accepted formats: jpeg, jpg, png, gif  <br>
                Maximum file size: 148mb
             </div>
       </div>
       <button type="submit" class="btn btn-primary px-5">Post</button>
   </form>

@endsection