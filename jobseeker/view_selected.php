<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 15-04-2016
 * Time: 07:14 PM
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
session_start();
include_once('../config.php');
?>
<html>
<head>
    <script type="text/javascript">
        function rejectjob(jobid) {
            // alert(keyword);
            var xmlhttp;
            if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
                    document.getElementById("message").innerHTML = "Processing..";
                } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("message").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("message").innerHTML = "Error Occurred. <a href='profile.php'>Reload Or Try Again</a> the page.";
                }
            }
            xmlhttp.open("GET", "reject.php?jid=" + jobid , true);
            xmlhttp.send();
        }
    </script>

    <title>View Employer</title>
</head>
<div id="nav">
    <nav>
        <div class="collapse navbar-collapse" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Portal</a>
            </div>
            <ul class="nav navbar-nav">
                <li ><a href="profile.php"><?php echo "$_SESSION[jsname]"; ?><span class="sr-only">(current)</span></a></li>
                <li><a href="#">Notifications</a></li>
                <li class="active"><a href="#"> Selected Jobs </a></li>
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
<!------------------------------------------------------ navigation ends -------------------------------------------------------------------------->
<body>
<div class="container">
    <h3 class="text-center" style="margin-top: 50px;">You have got selection for these job</h3>
    <h4 class="text-center">You can reject a job offer if you are not interested.</h4>
    <div class="page-header" style="background: midnightblue"></div>
        <?php
        $q=mysqli_query($db1,"select * from selection where user_id=$_SESSION[jsid]");
        if(mysqli_num_rows($q)==0){
            echo " <div class='container'> <div class='alert alert-warning alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Note:</strong> You are not selected for any jobs yet!</p>
        </div> </div>";
        }
        else {
            echo "<table class=' table'> <th style='width:150px'>Employer</th><th>Job Title</th><th>Job Detail</th><th>Selection Date</th><th>Action</th>";
            while ($qrow = mysqli_fetch_array($q)) {
                $qdet=mysqli_query($db1,"select * from jobs where jobid=$qrow[job_id]");
                $jdet=mysqli_fetch_array($qdet);
                $qcom=mysqli_query($db1,"select * from employer where eid=$jdet[eid]");
                $com=mysqli_fetch_array($qcom);
                echo "<tr>";
                echo "<td> <a href='view_emp.php?id=".$com['eid']."'>".$com['ename']."</a>";
                echo "<td><a  href='view_jobs.php?jid=" . $jdet['jobid'] . "'>".$jdet['title']."</td>";
                echo "<td>".substr($jdet['jobdesc'],0,120)."........</td>";
                echo "<td>".$qrow['date']."</td>";
                echo "<td> <button class='btn btn-danger' onclick='rejectjob(".$qrow['sel_id'].");'>Reject Job </button> ";
                echo "<tr> <div id='message'></div></tr>";
            }
        }
        ?>
</div>
</body>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<link href="../css/jobseeker.css" rel="stylesheet">
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>