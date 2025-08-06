@extends('layouts.app')

@section('content')
<div class="card mb-4">
  <div class="card-body">
    <h2 class="mb-0">{{ $post->title }}</h2>
    <p class="text-muted">by {{ $post->user->name }} • {{ $post->created_at->format('d M Y, H:i') }}</p>
    <p>{{ $post->body }}</p>
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

<h4>Comments ({{ $post->comments->count() }})</h4>

@foreach($post->comments as $comment)
  <div class="card mb-2">
    <div class="card-body">
      <p class="mb-1">{{ $comment->body }}</p>
      <p class="text-muted small mb-1">{{ $comment->user->name }} • {{ $comment->created_at->diffForHumans() }}</p>
      <div>
        <span class="me-2">{{ $comment->likes->count() }} 👍</span>
        @auth
          <form action="{{ route('comments.like',$comment->id) }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-sm {{ $comment->likes->where('user_id',auth()->id())->count() ? 'btn-secondary' : 'btn-outline-secondary' }}">
              {{ $comment->likes->where('user_id',auth()->id())->count() ? 'Unlike' : 'Like' }}
            </button>
          </form>
        @endauth
      </div>
    </div>
  </div>
@endforeach

@auth
<hr>
<h5>Add a comment</h5>
<form action="{{ route('comments.store',$post->id) }}" method="POST" novalidate>
  @csrf
  <div class="mb-3">
    <textarea name="body" class="form-control @error('body') is-invalid @enderror" rows="3" required>{{ old('body') }}</textarea>
    @error('body')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <button class="btn btn-primary">Comment</button>
</form>
@else
<p class="mt-3">Please <a href="{{ route('login') }}">login</a> to comment.</p>
@endauth
@endsection