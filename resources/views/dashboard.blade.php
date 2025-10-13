@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card mb-3">
      <div class="card-body">
        <h5>Welcome, {{ session('admin_username') }}</h5>
        <p>Quick links:</p>
        <a href="{{ route('items.index') }}" class="btn btn-sm btn-outline-primary me-2">Manage Items</a>
        <a href="{{ route('categories.index') }}" class="btn btn-sm btn-outline-primary">Manage Categories</a>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="card text-center mb-3">
          <div class="card-body">
            <h3>{{ $counts['items'] }}</h3>
            <div>Items</div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center mb-3">
          <div class="card-body">
            <h3>{{ $counts['categories'] }}</h3>
            <div>Categories</div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center mb-3">
          <div class="card-body">
            <h3>{{ $counts['logs'] }}</h3>
            <div>Logs</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
