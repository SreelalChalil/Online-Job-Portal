<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 09-04-2016
 * Time: 12:04 PM
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
include_once('config.php');
$query=mysqli_query($db1,"select * from jobs where eid = $_SESSION[eid]");
//$result=mysqli_fetch_array($query);
//echo $result['title'];

?>
<html>
<META HTTP-EQUIV="refresh" CONTENT="60">
<head>
    <title>Manage  Jobs</title>
</head>
<div id="nav">
    <nav>
        <div class="collapse navbar-collapse" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Portal</a>
            </div>

            <ul class="nav navbar-nav">
                <li><a href="profile.php"><?php echo $_SESSION['name']; ?><span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="#">Manage Jobs</a></li>
                <li><a href="#">Notifications</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="post_jobs.php">Post New Jobs</a></li>
                        <li><a href="#">Manage Jobs</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Manage Applicants</a></li>
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
<body>
<h3 style="color: seagreen; margin-top: 50px; " class="text-center">Manage Your Posted Jobs</h3>
<div class="page-header" style="background: #f4511e"></div>
<?php if(mysqli_num_rows($query)>0) { ?>
<div class="container" id="viewmain">
    <table class="table table-responsive">
        <th>Job Title</th>
        <th>Job Description</th>
        <th>Date of Posting</th>
        <th colspan="3">Actions</th>
    <?php
    while($result=mysqli_fetch_array($query)){
   // $query2=mysqli_query($db1,"select * from employer where eid = '$result[eid]'");
   // $r2=mysqli_fetch_array($query2);

    echo" <tr> ";
        /*for ($i=0; $i <3 ; $i++) {*/
        echo "<td>".$result['title']."</td>";
        echo "<td>".substr($result['jobdesc'],0,130)." ..........</td>";
        echo "<td>".$result['postdate']."</td>";
        echo "<td>  <a style='color: whitesmoke;'  href='view.php?jid=".$result['jobid']."'><button type='button' class='btn btn-success'>View Job</button></a> </td>";
        echo "<td> <a style='color: whitesmoke;'  href='manage_applicants.php?jobid=".$result['jobid']."'><button type='button' class='btn btn-success'> View Applicants</button> </a></td>";
        echo "</tr>";
    }
?>
    </table>
</div>
<?php } else  echo " <div class='container'> <div class='alert alert-warning alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Note:</strong> You have'nt posted any jobs yet!</p>
        </div> </div>";
?>
</body>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<link href="../css/employer.css" rel="stylesheet">
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
