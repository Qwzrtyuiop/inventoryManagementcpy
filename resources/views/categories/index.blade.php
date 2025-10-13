@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4>Categories</h4>
  <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">Add Category</a>
</div>

<table class="table table-striped">
  <thead>
    <tr><th>#</th><th>Name</th><th>Actions</th></tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
      <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>
          <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
          <form method="POST" action="{{ route('categories.destroy', $category) }}" style="display:inline-block">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete category?')">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

{{ $categories->links() }}
@endsection
