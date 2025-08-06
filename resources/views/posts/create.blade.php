@extends('layouts/app')

@section('content')
<h2 class="mb-4">New Post</h2>

<form action="{{ route('posts.store') }}" method="POST" novalidate>
  @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" id="title" name="title" value="{{ old('title') }}"
           class="form-control @error('title') is-invalid @enderror" required>
    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="mb-3">
    <label for="body" class="form-label">Body</label>
    <textarea id="body" name="body" rows="6"
              class="form-control @error('body') is-invalid @enderror" required>{{ old('body') }}</textarea>
    @error('body')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <button class="btn btn-success">Publish</button>
</form>
@endsection 