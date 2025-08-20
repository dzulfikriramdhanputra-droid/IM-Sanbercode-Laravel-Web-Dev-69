@extends('layouts.master')

@section('title')
    Register
@endsection
@section('content')
    <h1>Buat Account Baru!</h1>
    <h2>Sign Up form</h2>
    <form action="/kirim" method="POST">
        @csrf
        <label for=>First Name:</label> <br>
        <input type="text" name="FirstName:"> <br>
        <br>
        <label for=>Last Name:</label> <br>
        <input type="text" name="LastName:"> <br>
        <br>
        <label for=>Gender:</label> <br>
        <input type="radio" name="gender"> Male <br>
        <input type="radio" name="gender"> Female <br>
        <input type="radio" name="gender"> Others <br>
        <br>
        <label for=>Nationality:</label> <br>
        <select name="Negara">
            <option value="1">Indonesia</option>
            <option value="2">Jepang</option>
            <option value="3">Australia</option>
        </select>
        <br>
        <br>
        <label for=>Language Spoken:</label> <br>
        <input type="checkbox" name="todo"> Bahasa Indonesia <br>
        <input type="checkbox" name="todo"> English <br>
        <input type="checkbox" name="todo"> Other <br>
        <br>
        <label for=>Bio:</label> <br>
        <textarea name="Bio" cols="20" rows="10"></textarea> <br>
        <br>
        <input type="submit" value="Sign Up">
    </form>
@endsection