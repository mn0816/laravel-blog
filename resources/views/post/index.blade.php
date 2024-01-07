@extends('layouts.app')

@section('title','Index')

@section('content')
    @forelse($all_posts as $post)
        <div class="p-3 border border-dark rounded mb-3">
            <p>
                <a href="{{route('post.show',$post->id)}}" class="text-decoration-none">{{ $post->title}}</a>
            </p>
            <a href="" class="text-decoration-none">{{ $post->user->name }}</a>
            <p>
                {{$post->description}}
            </p>
            <div class="text-end">
                @if ($post->user->id == Auth::user()->id)
                <a href="{{route('post.edit',$post->id)}}" class="btn btn-outline-warning btn-sm"> <i class="fa-solid fa-pen"></i></a>
                <form action="{{route('post.destroy',$post->id)}}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        <i class="fa-regular fa-trash-can"></i>

                    </button>
                    </form>
                @endif
                
            </div>
        </div>
        @empty

    <div style="margin-top:100px">
       <h2 class="text-muted text-center">No Posts Yet</h2>
       <p class="text-center">
           <a href="{{route('post.create')}}" class="text-decoration-none">Create a new post</a>
       </p>
    </div>
    @endforelse
@endsection