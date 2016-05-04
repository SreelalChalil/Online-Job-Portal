<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 10-04-2016
 * Time: 11:58 PM
 */
session_start();
include_once('config.php');
$query=mysqli_query($db1,"select * from jobs where eid = $_GET[eid]");
?>
<html>
<head>
    <title>View All Jobs</title>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
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
                <li class="active"><a href="#">Jobs of <?php echo $_GET['ename']; ?> </a></li>
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

<body>
<div class="container" id="viewmain">
    <br>
    <br>
    <h3>All Jobs of <?php echo $_GET['ename']; ?></h3><br>
    <button class="btn btn-warning" onclick="goBack()"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>

    <table class="table table-responsive" style="margin-top: 30px;">
        <th>Job Title</th>
        <th>Job Description</th>
        <th>Date of Posting</th>
        <th colspan="3">Actions</th>
        <?php
        while($result=mysqli_fetch_array($query)){
            echo "<tr> ";
            echo "<td>".$result['title']."</td>";
            echo "<td>".substr($result['jobdesc'],0,120)." ........</td>";
            echo "<td>".$result['postdate']."</td>";
            echo "<td> <button type='button' class='btn btn-success'> <a style='color: whitesmoke;'  href='view_jobs.php?jid=".$result['jobid']."'>View Job</a></button> </td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
</body>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<link href="../css/jobseeker.css" rel="stylesheet">
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>

