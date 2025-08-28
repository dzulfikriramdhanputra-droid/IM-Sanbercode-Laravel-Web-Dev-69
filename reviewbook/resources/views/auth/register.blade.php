@extends('layouts.master')

@section('title')
    Register
@endsection
@section('content')

<form method="POST" action="">
    @csrf
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $errors)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @csrf
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <textarea name="email" class="form-control" name="email"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <textarea name="password" class="form-control" name="password"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <textarea name="password" class="form-control" name="password_confirmation"></textarea>
          </div>
        <button type="submit" class="btn btn-primary">Register</button>
      </form>

@endsection