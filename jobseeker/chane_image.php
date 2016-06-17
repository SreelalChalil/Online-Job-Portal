<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 13-04-2016
 * Time: 04:36 PM
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


<HTML>
<head>
    <style type="text/css">
        #content {
            text-align: center;
            position : relative;
            margin-top: 100px;

        }
        #insidenav{
            background: dodgerblue;
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
        nav ul  li.active{
            background: #428bca;
        }
        table.table{
            background: transparent;
        }
        td.tbold{
            font-weight: bold;
            width: 200px;
        }
        table{
            background: transparent;
        }
        label{
            width: inherit;
            background: transparent;
        }
        div.jumbotron{
            color: #2aabd2;
        }
        .thumbnail {
            width: auto;
            height: auto;
            border: none;
            border-radius: 0;
            background: transparent;

        }

        .thumbnail img {
            display: block;
            width: 300;
            height: 300;
            margin-bottom: 5px;
        }
    </style>
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
                <li class="active"><a href="#">Change Profile Image </a></li>
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



<div class="container" style="margin-top: 50px; color: #eb9316;">
    <h2> Change / Upload your profile image:</h2>
    <?php  $q = "select * from login join jobseeker on login.log_id=jobseeker.log_id WHERE login.log_id = $_SESSION[id]";
    //echo $q;
    $result = mysqli_query($db1, $q);// or die("Selecting user profile failed");
    $row = mysqli_fetch_array($result);
    ?>
    <div class="thumbnail text-center col-sm-3">
        <div class="img thumbnail">
            <?php if($row['photo']!="") {
                echo "<img src = '../uploads/images/".$row['photo']."' class='img-rounded' >";
            }else echo" <img src='../images/paris.jpg'>";
            ?>
            <p> Your Current image</p>
        </div>
    </div>

    <div id="content">
        <form method="post" action="../upload_image.php" enctype="multipart/form-data">
            <div class="form-group form-inline">
                <label for="file" class="control-label">Select your photo:</label>
                <input type=file name="file" id="file" class="form-control">
                <button type="submit" id="submit" name="submit" class="btn bg-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
</body>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">

<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</HTML>