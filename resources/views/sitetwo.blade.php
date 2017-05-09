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
        <h3 class="panel-title">Scrambled Eggs : Lesson 2</h3>
        </div>
        <div class="panel-body">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/PUP7U5vTMM0" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
      <!--Checkboxes-->
      <form action="sitetwo">
        <h3>What is the most important thing in cooking a scrambled egg? </h3>
        <input type="checkbox" name="chk" value="0"> Adding lots of olive oil first<br><!--name needed to send to DB-->
        <input type="checkbox" name="chk" value="1"> Stopping in it from over cooking<br>
        <input type="checkbox" name="chk" value="2"> Adding salt, pepper, mushrooms, and vine tomatoes<br>
        <input type="checkbox" name="chk" value="3"> Using a fresh sourdough bread<br><br>
        <input type="submit" value="Submit" name='chksub2'>
      </form>

      @if(Input::get('chk')!=1&&(Input::get('chk')!=null))

        <h1> {{$wrong}} </h1>

      @endif

      @if(Input::get('chk')==1&&(Input::get('chk')!=null))

        <h1> {{$correct}} </h1>

      @endif
