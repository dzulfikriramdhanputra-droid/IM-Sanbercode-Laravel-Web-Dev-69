@extends('layouts.master')

@section('title')
    Edit Profile
@endsection
@section('content')

<h1>Buat Profile</h1>

<form method="POST" action="/genre">
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
          <label class="form-label">Age</label>
          <input type="text" class="form-control" name="age">
        </div>
        <div class="mb-3">
          <label class="form-label">Bio</label>
          <textarea name="bio" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

@endsection