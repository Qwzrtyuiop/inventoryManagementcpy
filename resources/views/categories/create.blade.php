@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
<h4>Create Category</h4>

<form method="POST" action="{{ route('categories.store') }}">
  @csrf
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input name="name" value="{{ old('name') }}" class="form-control" required>
  </div>

  <div>
    <button class="btn btn-primary">Save</button>
    <a href="{{ route('categories.index') }}" class="btn btn-link">Cancel</a>
  </div>
</form>
@endsection
