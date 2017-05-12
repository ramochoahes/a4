@extends('layouts.master')

@section('makeClass')

<div class="panel panel-default">
  <center><h1>Create Your Class </h1></center>
  <form method= 'GET', action='makeClass'>

    <h2>Teacher Information</h2>
    <div class="panel-body">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="username" class="form-control" id="username" placeholder="Username" value='My Name'>
      </div>

      <h2>Class Description</h2>
      <textarea class="form-control" rows="3" id="description" value='Text'></textarea>

      <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="category" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" value='Other'>
          Category
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a href="#">Culinary</a></li>
          <li><a href="#">Music</a></li>
          <li><a href="#">Sports</a></li>
          <li><a href="#">Tutoring</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Other</a></li>
        </ul>
      </div>
      <br>

      <div class="form-group">
        <label for="exampleInputFile">Image</label>
        <input type="file" id="image" value='Image'>
        <p class="help-block">Example block-level help text here.</p>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    </div>
</div>

@foreach ($allData as $data)

    <h2>{{$data['username']}}</h2>
    {{$data['id']}}
    <img src='{{$data['other']}}'>

@endforeach




@endsection
