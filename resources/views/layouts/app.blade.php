<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Inventory')</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ route('dashboard') }}">Inventory Management System</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        @if(session('admin_id'))
          <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('items.index') }}">Items</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('logs.index') }}">Logs</a></li>
        @endif
      </ul>

      <ul class="navbar-nav ms-auto">
        @if(session('admin_id'))
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="btn btn-outline-secondary btn-sm">Logout</button>
            </form>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if($errors->any())
      <div class="alert alert-danger">
          <ul class="mb-0">
              @foreach($errors->all() as $err)
                  <li>{{ $err }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    @yield('content')
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
