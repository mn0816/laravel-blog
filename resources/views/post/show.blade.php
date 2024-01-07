@extends('layouts.app')

@section('title','Show page')

@section('content')
    <div class="shadow p-5">
        <p class="display-6">{{ $post->title }}</p>
        <p class="text-muted">{{ $post->user->name }}</p>
        <p>{{ $post->description }}</p>

        <img src="{{ asset('/storage/images/'.$post->image) }}" alt="" class="w-100 img-thimbnail">
    </div>
    <form action="{{route('comment.store', $post->id)}}" method="post" class="mt-5">
        @csrf
        <div class="input-group">
            <input type="text" name="body" id="" class="form-control">
            <button type="submit" class="btn btn-primary">Post</button>
        </div>
    </form>

    <div class="mt-3">
        <ul class="list-group">
            @foreach ($post->comments as $comment)
               <li class="list-group-item">
                    <p class="small text-muted p-o m-0">{{$comment->user->name}} &middot; {{$comment->created_at->diffForHumans()}}</p>

               {{ $comment->body }}
               <form action="{{route('comment.destroy',$comment->id)}}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    @if ($comment->user->id == Auth::user()->id)
                       <button type="submit" class="btn btn-danger float-end">
                           <i class="fa-solid fa-trash"></i>
                       </button>
                    @endif
               </form>
               </li>
            @endforeach
        </ul>
    </div>

@endsection