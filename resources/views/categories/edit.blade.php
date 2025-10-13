@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
<h4>Edit Category</h4>

<form method="POST" action="{{ route('categories.update', $category) }}">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label class="form-label">Name</label>
    <input name="name" value="{{ old('name', $category->name) }}" class="form-control" required>
  </div>

  <div>
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('categories.index') }}" class="btn btn-link">Cancel</a>
  </div>
</form>
@endsection
