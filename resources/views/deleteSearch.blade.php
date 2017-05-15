@extends('layouts.master')

@section('deleteSearch')


<div class="panel panel-default">
  <center><h1> Delete Class  </h1></center>
  <form method='GET', action='deleteSearch'>

    {{csrf_field()}}
    <input type='hidden' name='searchId' value=''>

    <h2>Delete Class</h2>
    <div class="panel-body">
      <div class="form-group">
        <label for="username">Search Class to Delete</label>
        <input type="text" class="form-control" id="search" name="searchId" placeholder="Username", value='Search' >
      </div>
      <br>

      <button type="submit" class="btn btn-default" value='Search'>Search</button>
    </form>
    </div>
</div>

@endsection
