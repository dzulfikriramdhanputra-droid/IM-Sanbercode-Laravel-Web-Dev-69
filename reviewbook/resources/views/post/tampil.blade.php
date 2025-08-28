@extends('layouts.master')

@section('title')
    Tampil Post
@endsection
@section('content')

<a href="/post/create" class="btn btn-primary my-3"></a>

<div class="row">
    @forelse ($post as $item)
        <div class="col-4">
            <div class="card">
                <img src="{{asset('image/'.$item->image)}}" class="card-img-top" height="300px" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{$item->title}}</h5>
                    <p class="card-text">{{str::limit($item->content, 100)}}</p>
                    <div class="d-grid gap-2">
                        <a href="/post/{{$item->id}}" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="d-grid gap-2">
                                <a href="/post/{{$item->id}}" class="btn btn-info">Edit</a>
                            </div>
                            <div class="col">
                                <form action="/post{{$item->id}}" method="post">
                                @csrf
                                @method("DELETE")
                                <div class="d-grip gap-2">
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <h1>Belum ada Post</h1>
    @endforelse
</div>

@endsection