<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 10-04-2016
 * Time: 04:46 PM
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
$empid=$_GET['id'];
$query=mysqli_query($db1,"select * from employer where eid = $empid");
$result=mysqli_fetch_array($query);
?>
<html>
<head>
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
                <li class="active"><a href="#"> View Employer </a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Update Profile</a></li>
                        <li><a href="#">View Applied Jobs</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">View Selected Jobs</a></li>
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

<body>
<div class="container">
<div class="container" style="margin-top: 30px;" id="tablecontent">
    <h2>Employer: <?php echo $result['ename']; ?></h2>
<table class="table table-responsive">
    <tr>
        <td class="tbold">Employer Name:</td>
        <td><strong><?php echo $result['ename']; ?></strong> &nbsp;&nbsp;<a href="jobs_by_emp.php?eid=<?php echo $empid; ?>&ename=<?php echo $result['ename']; ?>" style="font-size: 16px;"> View All jobs of this employer </a></td>
    </tr>
    <tr>
        <td class="tbold">Employer Type:</td>
        <td><?php echo $result['etype']; ?></td>
    </tr>
    <tr>
        <td class="tbold">Industry:</td>
        <td><?php echo $result['industry']; ?></td>
    </tr>
    <tr>
        <td class="tbold">Address:</td>
        <td><?php echo $result['address']; ?></td>
    </tr>
    <tr>
        <td class="tbold">Pincode:</td>
        <td><?php echo $result['pincode']; ?></td>
    </tr>
    <tr>
        <td class="tbold">Executive Name:</td>
        <td><?php echo $result['executive']; ?></td>
    </tr>
    <tr>
        <td class="tbold">Phone Number:</td>
        <td><?php echo $result['phone']; ?></td>
    </tr>
    <tr>
        <td class="tbold">Main Location:</td>
        <td><?php echo $result['location']; ?></td>
    </tr>
    <tr>
        <td class="tbold">About Company:</td>
        <td><?php echo $result['profile']; ?></td>
    </tr>
</table>


</div>
</div> <!-- container -->
</body>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<link href="../css/jobseeker.css" rel="stylesheet">
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>