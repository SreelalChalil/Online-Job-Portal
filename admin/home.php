<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 16-04-2016
 * Time: 10:16 AM
 */
?>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
<nav class="navbar" id="insidenav">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Job Portal</a>
        </div>

        <ul class="nav navbar-nav">
            <li class="active"><a data-toggle="tab" href="#main1">Home</a></li>
            <li><a data-toggle="tab" href="#recent"">Recent Jobs</a></li>
            <li><a data-toggle="tab" href="#jobseeker">Job Seeker</a></li>
            <li><a data-toggle="tab" href="#">Company</a></li>
            <li><a data-toggle="tab" href="#contact">Contact Us</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="glyphicon glyphicon-user"></span> Register <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="register_user.php">Jobseeker</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="register_emp.php">Company</a></li>
                </ul>
            </li>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>
</body>
</html>