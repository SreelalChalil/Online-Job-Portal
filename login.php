<?php
/**
* Created by PhpStorm.
* User: Sreelal
* Date: 2-04-2016
* Time: 8:03 PM
*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Signin</title>
      <?php
      if(isset($_GET['msg']) && ($_GET['msg']=="failed")){
          ?>
          <script type='text/javascript'>alert("Login Failed: Invalid Username or Password!");</script>
          <?php
      }
      else if(isset($_GET['msg']) && ($_GET['msg']=="registered"))
      {
          ?>
      <script type='text/javascript'>alert("Successfully registered, Please login now!");</script>
          <?php
      }
      else if(isset($_GET['msg']) && ($_GET['msg']=='please_login'))
          {
          ?>
          <script type="text/javascript">alert("Please Login First to access your profile!");</script>
          <?php
      }
      ?>
  </head>

<nav class="navbar" id="insidenav">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Job Portal</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Login</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
    <span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="register_user.php">Jobseeker</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="register_emp.php">Company</a></li>
        </ul>
      </li>
      </ul>
  </div>
</nav>
  <body>
    <div class="container col-sm-5 pull-right">
        <form class="form-signin" action="process_login.php" method="post">
            <h2 class="form-signin-heading">Please sign in</h2>
             <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email">
             <label for="inputPassword" class="sr-only">Password</label>
                 <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
             <div class="checkbox">
                 <label><input type="checkbox" value="remember-me"> Remember me </label>
                         <a href="forget.php">/Forgot Password</a>
             </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </div>

<div class="col-sm-10">
    <br> <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
<div class="container col-sm-10 pull-right" >

    <div class="row">
        <div class="askreg">
            <div class="col-lg-3">
                <br>
            </div>
        <div class="col-lg-4 ">
            <h2>Find Jobs</h2>
            <p> Helps passive and active jobseekers find better jobs.
                Get connected with over 45000 recruiters.
                Apply to jobs in just one click.
                Apply to thousands of jobs posted daily.
            </p>
            <p><a class="btn btn-default" href="register_user.php">Register Today<span class="glyphicon glyphicon-arrow-right"></span> </a></p>
        </div>
            </div>
        <div class="askreg">
        <div class="col-lg-4 ">
            <h2>Looking for the right candidate?</h2>
            <p> Post a job in easy steps and start receiving applications the same day.
                Find the right candidates easily and quickly through our Search feature.
            </p>
            <p><a class="btn btn-default" href="register_emp.php">Register Your Company <span class="glyphicon glyphicon-arrow-right"></span> </a></p>
        </div>
        </div>
    </div>
</div>

  </body>

<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
<link href="css/signin.css" rel="stylesheet">
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>
