@extends('layouts.app')

@section('title','edit profile')

@section('content')  

   <form action="{{route('profile.update',$user->id)}}" method="post" enctype="multipart/form-data">
       @csrf
       @method('PATCH')
       
       <div class="mb-3">
            <h1><i class="fa-solid fa-image fa-3x"></i></h1>
             <input type="file" name="image" id="imege" class="form-control">
             <div class="form-text">
                Accepted formats: jpeg, jpg, png, gif 
                Max size: 1MB or 1024KB
             </div>
       </div>

       <div class="mb-3">
           <label for="name" class="form-label">Name</label>
           <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control" placeholder="Name">
       </div>
       <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <textarea name="email" id="email" rows="1" class="form-control" placeholder="email">{{$user->description}}</textarea>
       </div>
       
       <button type="submit" class="btn btn-primary px-5">Save</button>
   </form>

@endsection