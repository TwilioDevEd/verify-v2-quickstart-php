@extends('base')

@section('title', 'Users')
@section('header')
  <h1>Users</h1>
@endsection


@section('content')
  <table>
    <thead>
    <tr>
      <th>Username</th>
      <th>Phone Number</th>
      <th>Verified</th>
    </tr>
    </thead>
    <tbody>
    @foreach(\App\User::all() as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->phone_number }}</td>
        <td>{{ $user->verified }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
@endsection
