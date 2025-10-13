@extends('layouts.app')

@section('title', 'Items')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4>Items</h4>
  <a href="{{ route('items.create') }}" class="btn btn-primary btn-sm">Add Item</a>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Category</th>
      <th>Stock</th>
      <th>Information</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($items as $item)
      <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->category->name ?? '-' }}</td>
        <td>{{ $item->stock }}</td>
        <td>{{ \Illuminate\Support\Str::limit($item->information, 80) }}</td>
        <td>
          <a href="{{ route('items.edit', $item) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
          <form method="POST" action="{{ route('items.destroy', $item) }}" style="display:inline-block">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete item?')">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

{{ $items->links() }}
@endsection
