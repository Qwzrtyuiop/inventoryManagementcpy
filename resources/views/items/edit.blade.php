@extends('layouts.app')

@section('title', 'Edit Item')

@section('content')
<h4>Edit Item</h4>

<form method="POST" action="{{ route('items.update', $item) }}">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label class="form-label">Name</label>
    <input name="name" value="{{ old('name', $item->name) }}" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Category</label>
    <select name="category_id" class="form-control" required>
      <option value="">Choose</option>
      @foreach($categories as $cat)
        <option value="{{ $cat->id }}" @selected(old('category_id', $item->category_id) == $cat->id)>{{ $cat->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label class="form-label">Stock</label>
    <input name="stock" type="number" value="{{ old('stock', $item->stock) }}" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Information</label>
    <textarea name="information" class="form-control">{{ old('information', $item->information) }}</textarea>
  </div>

  <div>
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('items.index') }}" class="btn btn-link">Cancel</a>
  </div>
</form>
@endsection
