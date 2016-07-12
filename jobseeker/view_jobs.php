<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 09-04-2016
 * Time: 09:19 PM
 * Online-Job-Portal - A web application built on PHP HTML & javascript
Copyright (C) 2016 Sreelal C

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

 */
include_once('../config.php');
session_start();
$jobid=$_GET['jid'];
$query=mysqli_query($db1,"select * from jobs where jobid = $jobid");
$result=mysqli_fetch_array($query);
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script type="text/javascript">
    function apply(jobid) {
    // alert(keyword);
    var xmlhttp;
    if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
    } else { // for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
    document.getElementById("applydiv").innerHTML = "Processing..";
    } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    document.getElementById("applydiv").innerHTML = xmlhttp.responseText;
    } else {
    document.getElementById("applydiv").innerHTML = "Error Occurred. <a href='profile.php'>Reload Or Try Again</a> the page.";
    }
    }
    xmlhttp.open("GET", "apply_job.php?jid=" + jobid , true);
    xmlhttp.send();
    }
    </script>
    <title>View Job </title>
</head>
<body>

<div id="nav">
    <nav>
        <div class="collapse navbar-collapse" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Portal</a>
            </div>
            <ul class="nav navbar-nav">
                <li ><a href="profile.php"><?php echo "$_SESSION[jsname]"; ?><span class="sr-only">(current)</span></a></li>
                <li><a href="#">Notifications</a></li>
                <li class="active"><a href="#"> View Job </a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Update Profile</a></li>
                        <li><a href="view_applied.php">View Applied Jobs</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="view_selected.php">View Selected Jobs</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left" role="search" method="get" action="search.php">
                <div class="form-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Search Jobs">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Account Overview</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Account Settings</a></li>
                    </ul>
                </li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div><!-- /.container-fluid -->

<div class="container">
<?php
    $qc=mysqli_query($db1,"select * from employer where eid=$result[eid]");
    $res=mysqli_fetch_array($qc);
?>


<center><h3>Details of <?php echo $result['title']; ?> by <?php echo $res['ename']; ?> </h3></center>
<button class="btn btn-warning btn-lg" onclick="goBack()"><span class="glyphicon glyphicon-arrow-left"></span> Back </button>
         <button type="button" class="btn btn-success btn-lg" onclick="apply(<?php echo $result['jobid']; ?>)">
         <span class='glyphicon glyphicon-ok'></span> Apply for this Job
         </button>
<div id="applydiv"></div>
<div class="page-header" style="background: midnightblue"></div>
    
<div id="tablecontent">
    <h3> Job Details: </h3>

    <table class="table table-responsive">
        <tr>
            <td class="tbold"> Company: </td>
            <td> <?php echo "<a href='view_emp.php?id=".$res['eid']."'>".$res['ename']."</a>"; ?></td>
        </tr>
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
            <td><?php echo $result['jprofile']; ?></td>
        </tr>

</table>
<div class="page-header" />

</div>
</body>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<link href="../css/jobseeker.css" rel="stylesheet">
<script type="text/javascript" src="../js/validate.js"></script>
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../location/location.js"></script>
</html>
