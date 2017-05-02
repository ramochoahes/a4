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
              <a class="navbar-brand" href="#">LessonTap</a>
            </div>
          </div><!-- /.container-fluid -->
        </nav>
      </div>
    </header>
    
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
      <form class="form-inline" action="index">
        <div class="form-group">
          <label class="sr-only" for="exampleInputEmail3">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email"> <!--name stores its ID in the _GET-->
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
    <!-- JavaScript library for Bootstrap use goes here before it -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </body>
</html>
