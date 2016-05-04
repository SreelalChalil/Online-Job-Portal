<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 14-04-2016
 * Time: 09:57 AM
 */
include_once('config.php');
include_once('notify.php');
notify();
?>
<HTML>
<head>
<style type="text/css">
    #content {
        text-align: center;
        position : absolute;
        top: 50%;
        margin-top: -50px;

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
                <li><a href="profile.php"><?php echo $_SESSION['name']; ?><span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="#">Change Logo</a></li>
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


<div class="container" style="margin-top: 50px; color: #eb9316">
    <h2> Change / Upload your company logo:</h2>
<div id="content">


    <form method="post" action="../upload_logo.php" enctype="multipart/form-data">
        <div class="form-group form-inline">
            <label for="file" class="control-label">Select the logo image:</label>
        <input type=file name="file" id="file" class="form-control">
        <button type="submit" id="submit" name="submit" class="btn bg-primary">Submit</button>
        </div>
    </form>
</div>
</div>
</body>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<link href="../css/employer.css" rel="stylesheet">
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</HTML>