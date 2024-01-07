@extends('layouts.app')

@section('title','Show page')

@section('content')
    <div class=" d-flex align-items-center">
    @if($user->image)
    <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Picture" class="profile-image">
    @else
    <h1><i class="fa-solid fa-image fa-3x"></i></h1>
    @endif
    
        <div style="margin-left: 20px;" class="ms-6">
            <p class="display-6  mb-2">{{$user->name}}</p>
            <form action="{{ route('profile.edit', ['id' => $user->id]) }}" method="GET">
                @csrf        
                <button type="submit" class="btn btn-primary">Edit Profile</button>
            </form>
        </div>        
    </div>

    <div class="mt-3">
        <ul class="list-group">
            @if($user && $user->comments)
            @foreach ($user->comments as $comment)
               <li class="list-group-item">
                    <p class="small text-muted p-o m-0">{{$comment->user->name}} &middot; {{$comment->created_at->diffForHumans()}}</p>

               {{ $comment->body }}

               </li>
            @endforeach
            @endif
        </ul>
    </div>



@endsection