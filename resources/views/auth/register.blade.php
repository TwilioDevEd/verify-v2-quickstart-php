@extends('base')
@section('head')
    @parent
    <link rel="stylesheet" href="{{ asset('css/intlTelInput.css') }}"/>
@endsection

@section('title', 'Register')

@section('header')
<h1>Register</h1>
@endsection

@section('content')
<form method="post">
  <label for="name">Username</label>
  <input name="name" id="username" required />
  <label for="password">Password</label>
  <input type="password" name="password" id="password" required />
  <label for="phone_number">Phone number</label>
  <input type="tel" name="phone_number" id="phone_number" required />
  <label for="channel">Verification method:</label>
  <label><input type="radio" name="channel" value="sms" checked />SMS</label>
  <label><input type="radio" name="channel" value="call" />Call</label>
  <button name="form-submit" type="submit">Sign Up</button>
  @csrf
</form>
@endsection

@section('extra_scripts')
  <script src="{{ asset('js/intlTelInput.js') }}"></script>
  <script>
    var input = document.querySelector("#phone_number");
    window.intlTelInput(input, {
      hiddenInput: "full_phone",
      preferredCountries: ["us", "gb", "co", "de"],
      utilsScript: "{{ asset('js/utils.js') }}"
    });
  </script>
@endsection