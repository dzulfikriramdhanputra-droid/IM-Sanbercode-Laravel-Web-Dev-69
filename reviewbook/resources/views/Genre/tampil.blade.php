@extends('layouts.master')

@section('title')
    Tampil Genre
@endsection
@section('content')

<a href="/genre/create" class="btn btn-primary btn-sm my-2">Tambah</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($genres as $item)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$items->name}}</td>
            <td>
                <form action="/genre/{{$items->id}}" method="POST">
                  @csrf
                  @method("DELETE")
                  <a href="/genre/{{$items->id}}" class="btn btn-info btn-sm">Detail</a>
                  <a href="/genre/{{$items->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                  <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                </form>
            </td>
          </tr>
        @empty
            <tr>
                <td>Tidak ada data genre</td>
            </tr>
        @endforelse

    </tbody>
  </table>

@endsection