@extends('layouts.app')

@section('title', 'Create Item')

@section('content')
<h4>Create Item</h4>

<form method="POST" action="{{ route('items.store') }}">
  @csrf
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input name="name" value="{{ old('name') }}" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Category</label>
    <select name="category_id" class="form-control" required>
      <option value="">Choose</option>
      @foreach($categories as $cat)
        <option value="{{ $cat->id }}" @selected(old('category_id') == $cat->id)>{{ $cat->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label class="form-label">Stock</label>
    <input name="stock" type="number" value="{{ old('stock', 0) }}" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Information</label>
    <textarea name="information" class="form-control">{{ old('information') }}</textarea>
  </div>

  <div>
    <button class="btn btn-primary">Save</button>
    <a href="{{ route('items.index') }}" class="btn btn-link">Cancel</a>
  </div>
</form>
@endsection
