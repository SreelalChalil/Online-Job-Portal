<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 14-04-2016
 * Time: 08:38 AM
 */
session_start();
$jsid=$_SESSION['jsid'];
include_once('config.php');
$q1=mysqli_query($db1,"select * from application WHERE user_id=$jsid");
?>
<html>
<head>
    <title>View Applied Jobs</title>
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
                <li class="active"><a href="#"> View Applied Job </a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Update Profile</a></li>
                        <li><a href="#">View Applied Jobs</a></li>
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
<div class="container-fluid">
    <h3 class="text-center" style="margin-top: 50px; color: #265a88">You Applied for these jobs</h3>
     <?php if(mysqli_num_rows($q1)>0) { ?>
<table class="table table-responsive" style="margin-top: 30px;">
        <th>Employer</th>
        <th>Job Title</th>
        <th style="width: 70px">Job Description</th>
        <th>Date of Posting</th>
        <th>Date on Applied</th>
        <th colspan="3">Actions</th>
        <?php
        while($row=mysqli_fetch_array($q1)) {
            $job_id=$row['job_id'];
            $q2=mysqli_query($db1,"select * from jobs where jobid = $job_id");
            while ( $result = mysqli_fetch_array($q2) ) {
                $comp=mysqli_query($db1,"select * from employer WHERE eid = $result[eid]");
                $rowcomp=mysqli_fetch_array($comp);
                echo " <tr> ";
                echo "<td> <a href='view_emp.php?id=".$rowcomp['eid']."'>".$rowcomp['ename']."</a>";
                echo "<td>" . $result['title'] . "</td>";
                echo "<td>" . substr($result['jobdesc'],0,120) ." .......</td>";
                echo "<td>" . $result['postdate'] . "</td>";
                echo "<td>" . $row['date_applied']."</td>";
                echo "<td> <button type='button' class='btn btn-success'> <a style='color: whitesmoke;'  href='view_jobs.php?jid=" . $result['jobid'] . "'>View Job</a></button> </td>";
                echo "</tr>";
            }
        }
        ?>
</table>
    <?php } else {  echo " <div class='container'> <div class='alert alert-warning alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Note:</strong> You have'nt applied for any jobs yet!</p>
        </div> </div>";
        }
     ?>
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