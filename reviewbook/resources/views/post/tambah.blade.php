@extends('layouts.master')

@section('title')
    Tambah Post
@endsection
@section('content')
<form method="POST" action="/post" enctype="multipart/form-data">
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
        <label class="form-label">Genre</label>
        <select name="category_id" id="" class="form-control">
            <option value="">Pilih Genre</option>
            @forelse ($category as $item)
                <option value="">{{$item->name}}</option>
            @empty
                <option value="">genre belum ada</option>
            @endforelse
        </select>
      </div>
    <div class="mb-3">
      <label class="form-label">Post Title</label>
      <input type="email" class="form-control" name="title">
    </div>
    <div class="mb-3">
      <label class="form-label">Post Content</label>
      <textarea name="content" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="image">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection