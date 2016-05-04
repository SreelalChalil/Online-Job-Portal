<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 09-04-2016
 * Time: 09:19 PM
 */
include_once('config.php');
session_start();
$jobid=$_GET['jid'];
$query=mysqli_query($db1,"select * from jobs where jobid = $jobid");
$result=mysqli_fetch_array($query);
?>
<html>
<META HTTP-EQUIV="refresh" CONTENT="15">
<head>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script type="text/javascript">
    function deletejob(jobid) {
    // alert(keyword);
    var xmlhttp;
    if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
    } else { // for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
    document.getElementById("tablecontentt").innerHTML = "Processing..";
    } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    document.getElementById("tablecontent").innerHTML = xmlhttp.responseText;
    } else {
    document.getElementById("tablecontent").innerHTML = "Error Occurred. <a href='managejobs.php'>Reload Or Try Again</a> the page.";
    }
    }
    xmlhttp.open("GET", "deletejob.php?jid=" + jobid , true);
    xmlhttp.send();
    }
    </script>
    <title> view Jobs </title>
</head>
<body>

<div id="nav">
    <nav>
        <div class="collapse navbar-collapse" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Portal</a>
            </div>

            <ul class="nav navbar-nav">
                <li><a href="profile.php"><?php echo $_SESSION['name']; ?><span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="#">View Jobs</a></li>
                <li><a href="#">Notifications</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="post_jobs.php">Post Jobs</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="managejobs.php">Manage Jobs</a></li>

                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Account Overview</a></li>
                        <li><a href="#">Account Settings</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Edit Profile</a></li>
                    </ul>
                </li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div><!-- /.container-fluid -->


<div class="container">
    <center><h2>view Job </h2></center>

    <button class="btn btn-warning" onclick="goBack()"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to Manage Jobs</button>

<div id="tablecontent">
    <h3> Job Details: </h3>
    <table class="table table-responsive">
        <tr>
            <td class="tbold">Designation:</td>
            <td><?php echo $result['title']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Date of Posting:</td>
            <td><?php echo $result['postdate']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Number of Vacancies: </td>
            <td><?php echo $result['vacno']; ?> </td>
        </tr>
        <tr>
            <td class="tbold">Job Description:</td>
            <td><?php echo $result['jobdesc']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Required Experience:</td>
            <td><?php echo $result['experience']." "; ?>Years</td>
        </tr>
        <tr>
            <td class="tbold">Basic Pay:</td>
            <td><?php echo $result['basicpay']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Functional Area:</td>
            <td><?php echo $result['fnarea']; ?></td>
        </tr>
        <tr>
            <td class="tbold"> Location:</td>
            <td><?php echo $result['location']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Industry:</td>
            <td><?php echo $result['industry']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Required UG Qualification:</td>
            <td><?php echo $result['ugqual']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Required PG Qualification:</td>
            <td><?php echo $result['pgqual']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Desired Candidate Profile:</td>
            <td><?php echo $result['profile']; ?></td>
        </tr>

    </table>
<table class="table">
    <tr>
        <td>
            <button type="button" class="btn btn-danger" onclick="deletejob(<?php echo $result['jobid']; ?>)">
                <span class='glyphicon glyphicon-trash'></span> Delete Job
            </button>
        </td>
    </tr>
</table>
</div> <!-- table content -->
    <div class="page-header" />

</div>
</body>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<link href="../css/employer.css" rel="stylesheet">
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>