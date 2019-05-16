@extends('base')

@section('title', 'Log In')
@section('header')
  <h1>Log In</h1>
@endsection

@section('content')
  <form method="post">
    @csrf
    <label for="name">Username</label>
    <input name="name" id="username" required>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>
    <input type="submit" value="Log In">
  </form>
@endsection
