@extends('layouts.app')

@section('content')
<h2 class="mb-4">Admin Dashboard</h2>

{{-- Promote Users --}}
<h4>Promote User to Admin</h4>
<form action="{{ route('admin.promote') }}" method="POST" class="row row-cols-lg-auto g-3 align-items-center mb-4">
  @csrf
  <div class="col-12">
    <input type="number" name="user_id" class="form-control" placeholder="User ID">
  </div>
  <div class="col-12">
    <button class="btn btn-warning">Promote</button>
  </div>
</form>

{{-- Deleted Posts --}}
<h4 class="mt-4">Deleted Posts</h4>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th><th>Title</th><th>Author</th><th>Deleted At</th><th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @forelse($deletedPosts as $post)
      <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->user->name }}</td>
        <td>{{ $post->deleted_at->format('d M Y H:i') }}</td>
        <td>
          <form action="{{ route('admin.destroyPost',$post->id) }}" method="POST" onsubmit="return confirm('Permanently delete post?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger">Delete</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="5" class="text-center">No deleted posts</td></tr>
    @endforelse
  </tbody>
</table>

{{-- Deleted Comments --}}
<h4 class="mt-4">Deleted Comments</h4>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th><th>Comment</th><th>User</th><th>Deleted At</th><th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @forelse($deletedComments as $comment)
      <tr>
        <td>{{ $comment->id }}</td>
        <td>{{ Str::limit($comment->body,80) }}</td>
        <td>{{ $comment->user->name }}</td>
        <td>{{ $comment->deleted_at->format('d M Y H:i') }}</td>
        <td>
          <form action="{{ route('admin.destroyComment',$comment->id) }}" method="POST" onsubmit="return confirm('Permanently delete comment?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger">Delete</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="5" class="text-center">No deleted comments</td></tr>
    @endforelse
  </tbody>
</table>
@endsection