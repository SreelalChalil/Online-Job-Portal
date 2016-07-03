<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 14-04-2016
 * Time: 03:17 PM
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
$q = mysqli_query($db1,"select * from login join jobseeker on login.log_id=jobseeker.log_id WHERE jobseeker.user_id = $_GET[jsid]");
$row=mysqli_fetch_array($q);
?>
<html>
<head>
    <title>view Jobseeker</title>
    <style type="text/css">
        #insidenav{
            background: #dd4814;
            color: white;
            font-size: 13px;
        }
        nav a{
            font-size: 16px;
            font-family: ubuntu;
            color: white;
        }
        nav ul li {
            font-size: 16px;
            font-family: ubuntu;
        }
        nav ul li.active{
            background: whitesmoke;
        }
        nav ul li.active a{
            color:#dd4814;;
        }
        table.table{
            background: transparent;
        }
        td.tbold{
            font-weight: bold;
        }
        table{
            background: transparent;
        }
        #viewmain{
            margin-top: 30px;
        }
        span.badge{
            background: white;
            color: black;
        }
        .thumbnail {
            width: auto;
            height: auto;
            border: none;
            border-radius: 0;
            background: transparent;


        }
        .thumbnail img {
            width: 300px;
            height: 300px;
            margin-bottom: 5px;
        }
    </style>
</head>
<div id="nav">
    <nav>
        <div class="collapse navbar-collapse" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Portal</a>
            </div>

            <ul class="nav navbar-nav">
                <li><a href="profile.php"><?php echo $_SESSION['name']; ?><span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="#">View Jobseeker Profile</a></li>
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
<div class="container-fluid" id="content">
<!-- ---------------------------------------------- nav ends ----------------------------------------------------------------------------->

    <aside class="col-sm-3" role="complementary">
        <div class="region region-sidebar-first well" id="sidebar">
            <h3 style="color: #009999" class="text-center" > User:<?php echo " ".$row['name']; ?> </h3>
        </div>

        <!-- profile pic -->
        <div class="thumbnail text-center">
            <div class="img thumbnail">
                <?php if($row['photo']!="") {
                    echo "<img src = '../uploads/images/".$row['photo']."' class='img-rounded' >";
                }else echo" <img src='../images/user_fallback.png'>";
                ?>
            </div>
            <strong><?php echo $row['name']; ?> </strong>
            <!-- Button trigger modal -->

            <p> <?php if($row['Resume']!="") {
                    echo "<button type='button' class='btn bg-primary' ><a href = '../uploads/resume/".$row['Resume']."' style='color:white;' >
                    Download Resume File </a ></button>";
                }?>
                <!-- profile pic --->
    </aside>

    <div class="col-sm-7">
        <div id="details"  style="margin-top: 50px;">
            <h3> User Details:</h3>
            <table class="table" >
                <tr >
                    <td class="tbold">Full Name:</td>
                    <td><?php echo $row['name']; ?></td>

                </tr>
                <tr>
                    <td class="tbold">Email:</td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
                <tr>
                    <td class="tbold">Phone:</td>
                    <td><?php echo $row['phone']; ?></td>
                </tr>
                <tr>
                    <td class="tbold">Location:</td>
                    <td><?php echo $row['location']; ?></td>
                </tr>
                <tr>
                    <td class="tbold">Experience (Years):</td>
                    <td><?php echo $row['experience']; ?></td>
                </tr>
                <tr>
                    <td class="tbold">Skills:</td>
                    <td><?php echo $row['skills']; ?></td>
                </tr>
                <tr>
                    <td class="tbold">UG Qualification:</td>
                    <td><?php echo $row['basic_edu']; ?></td>
                </tr>
                <tr>
                    <td class="tbold">PG Qualification:</td>
                    <td><?php echo $row['master_edu']; ?></td>
                </tr>
            </table>
        </div> <!-- profile -->

    </div>
</div>

</body>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
