<!DOCTYPE html> 
<html>
<head>
  <title>@yield('title') - Twilio Verify</title>
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  @section('head')
  <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
  @show
</head>
<body>
<nav>
  <h1>Twilio Verify</h1>
  <ul>
    @if (Auth::check())
    <li>
      <span>Welcome, {{ Auth::user()->name }}</span>
    </li>
    <li><a href="{{ url('logout') }}">Log Out</a></li>
    @else
    <li><a href="{{ url('register') }}">Register</a></li>
    <li><a href="{{ url('login') }}">Log In</a></li>
    @endif
  </ul>
</nav>
<section class="content">
  <header>
    @yield('header')
  </header>
  @if ($errors->any())
    <ul class="flash">
    @foreach($errors->all(':message') as $message)
       <li>{{ $message }}</li>
    @endforeach
    </ul>
  @endif
  @if (Session::has('messages'))
    @foreach(session('messages')->all(':message') as $message)
      <div class="success">{{ $message }}</div>
    @endforeach
  @endif
  @yield('content')
</section>
  @yield('extra_scripts')
</body>
</html>
