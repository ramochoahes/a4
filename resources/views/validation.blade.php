@extends('layouts.master')<!--This tells it to use this in this file-->

@section('validation')

<!--Panel-->
  <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Welcome!</h3>
    </div>
    <div class="panel-body">
      <img src="/images/front.jpg" class="img-responsive" alt="Responsive image">
    </div>
  </div>
  <br>

<h1>Sign In</h1>
<!--Validation Form-->
<form class="form-inline" method='get' action="validation">
<input type='hidden' name='id3' value='username'>

  <div class="form-group">
    <label class="sr-only" for="exampleInputEmail3">Email address</label>
    <input type="email" name="username" class="form-control" id="username" placeholder="Email"> <!--name stores its ID in the _GET-->
  </div>
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword3">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-default">Sign in</button>
</form>
<br>

<!--Validation Message-->
@if(count($errors) > 0)
  <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
  </ul>
@endif
<br>
<br>
<br>
@endsection
