@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-5">
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="mb-3">Admin Login</h4>
        <form method="POST" action="{{ route('login.post') }}">
          @csrf
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input name="username" type="text" class="form-control" value="{{ old('username') }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="password" type="password" class="form-control" required>
          </div>
          <div class="d-grid">
            <button class="btn btn-primary">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
