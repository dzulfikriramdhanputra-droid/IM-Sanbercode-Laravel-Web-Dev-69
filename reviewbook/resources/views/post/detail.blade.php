@extends('layouts.master')

@section('title')
    Detail Post
@endsection
@section('content')

<img src="{{asset('image/'. $post->image)}}" width="100%" height="500px" alt="">
<h1 class="text-primary">{{$post->title}}</h1>
<p>{{$post->content}}</p>

@endsection