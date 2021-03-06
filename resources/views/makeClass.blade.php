@extends('layouts.master')

@section('makeClass')

<div class="panel panel-default">
  <center><h1>Create Your Class </h1></center>
  <form method='get', action='makeClass'>

    {{csrf_field()}}

    <h2>Teacher Information</h2>
    <div class="panel-body">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" >
      </div>

      <h2>Class Description</h2>
      <textarea class="form-control" rows="3" id="description" name="description" ></textarea>

      <br><br>
      <fieldset>
          <p>
             <label>Select Category</label>
             <select id = "category" name="category">
               <option value = "Culinary">Culinary</option>
               <option value = "Golf">Golf</option>
               <option value = "Martial Arts">Martial Arts</option>
               <option value = "Other">Other</option>
               <option selected='selected'></option>
             </select>
          </p>
      </fieldset>
      <br>
      <div class="form-group">
        <label for="exampleInputFile">Image</label>
        <input type="file" id="other" name="other" value=''>
        <p class="help-block">Example block-level help text here.</p>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    </div>
</div>

<!--Validation Message-->
@if(count($errors) > 0)
  <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
  </ul>
@endif

@endsection
