@extends('layouts.app')

@section('content')
<h2 class="mb-4">All Posts</h2>

@auth
  <div class="mb-3 text-end">
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Write Post</a>
  </div>
@endauth

@foreach($posts as $post)
  <div class="card mb-3">
    <div class="card-body">
      <h4><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h4>
      <p class="text-muted mb-1">
        by {{ $post->user->name }} • {{ $post->created_at->diffForHumans() }}
      </p>
      <p class="mb-1">{{ Str::limit($post->body,120) }}</p>
      <div>
        <span class="me-2">{{ $post->likes->count() }} 👍</span>
        @auth
          <form action="{{ route('posts.like',$post->id) }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-sm {{ $post->likes->where('user_id',auth()->id())->count() ? 'btn-secondary' : 'btn-outline-secondary' }}">
              {{ $post->likes->where('user_id',auth()->id())->count() ? 'Unlike' : 'Like' }}
            </button>
          </form>
        @endauth
      </div>
    </div>
  </div>
@endforeach
@endsection