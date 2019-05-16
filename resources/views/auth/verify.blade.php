@extends('base')

@section('title', 'Verify')

@section('header')
  <h1>Verify</h1>
@endsection

@section('content')
  <form accept-charset="UTF-8" method="post">
    <div class="row">
      <div class="col-25">
        <label>Enter your code:</label></div>
      <div class="col-75">
        <input name="code" id="code" type="number"></select>
      </div>
    </div>
    <div class="row">
      <button name="button" type="submit">Verify</button>
    </div>
    @csrf
  </form>
  <hr/>
  <h4>Didn't you receive the code?</h4>
  <form accept-charset="UTF-8" method="post" action="{{ url('/resend') }}">
    <div class="row">
      <div class="col-75">
        <label><input type="radio" name="channel" value="sms" checked />SMS</label>
        <label><input type="radio" name="channel" value="call" />Call</label>
      </div>
      <div class="col-25">
        <button name="form-submit" type="submit">Resend</button>
      </div>
    </div>
    @csrf
  </form>
@endsection
