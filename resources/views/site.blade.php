<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>LessonTap</title>
    <!--link rel="stylesheet" type="text/css" href="styles.css"-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  </head>

  <body>
    <header class="navbar-inverse"> <!--this mod gives you the full dscreen black navbar-->
      <div class="container">
        <nav>
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/">LessonTap</a>
            </div>
          </div><!-- /.container-fluid -->
        </nav>
      </div>
    </header>

    <div class="container">
      <!--Panel-->
      <div class="panel panel-default">
        <div class="panel-heading">
        <h3 class="panel-title">Cooking The Perfect Steak : Lesson 1</h3>
        </div>
        <div class="panel-body">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/AmC9SmCBUj4" frameborder="0" allowfullscreen></iframe>
        </div><!--?rel=0;&autoplay=1-->
      </div>

      <!--Checkboxes-->
      <form action="site">
        <h2>Choose the step that does not belong?</h2>
        <input type="checkbox" name="chk" value="0"> Add lots of salt & pepper<br><!--name needs to sent to DB-->
        <input type="checkbox" name="chk" value="1"> Remove from fridge 20 minutes before you cook them<br>
        <input type="checkbox" name="chk" value="2"> Add olive oil to a hot pan <br>
        <input type="checkbox" name="chk" value="3"> Lay steaks away from you in pan<br>
        <input type="checkbox" name="chk" value="4"> Sear steak all around including the sides<br>
        <input type="checkbox" name="chk" value="5"> Tilt pan to sear steak better<br>
        <input type="checkbox" name="chk" value="6"> Add crushed garlic<br>
        <input type="checkbox" name="chk" value="7"> Add fresh thyme, more olive oil, and butter to baste<br>
        <input type="checkbox" name="chk" value="8"> Add one bay leaf<br>
        <input type="checkbox" name="chk" value="9"> Cook until done, pull out, and let rest<br>
        <input type="submit" value="Submit" name='chksub'>
      </form>


      @if(Input::get('chk')!=8&&(Input::get('chk')!=null))

        <h1> {{$wrong}} </h1>

      @endif

      @if(Input::get('chk')==8&&(Input::get('chksub')!=null))

        <h1> {{$correct}} </h1>

          <div class="radio">
            <label>
              <h4>Continue?</h4>
                <form action=''>
                <input type="radio" name="Yes" value="Yes"> Yes<br>
                <input type="radio" name="No"  value="No" > No<br>
                <br>
                <input type="submit" value="Submit">
                </form>
            </label>
          </div>

      @endif
