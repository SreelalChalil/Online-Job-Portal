<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 24-03-2016
 * Time: 7:20 PM
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
include_once('config.php');
session_start();
$id = $_SESSION['id'];
//echo $id;
if(isset($_SESSION['id'])&& ($_SESSION['type']="jobseeker"))
{
    $q = "select * from login join jobseeker on login.log_id=jobseeker.log_id WHERE login.log_id = $id";
//echo $q;
    $result = mysqli_query($db1, $q);// or die("Selecting user profile failed");
    $row = mysqli_fetch_array($result);
  //  echo $row['log_id'];
    $_SESSION['jsname']=$row['name'];
    $_SESSION['jsid']=$row['user_id'];
}
else
{
    header('location:../login.php?msg=please_login');
}
?>
<html>
<head>
<title>Profile - <?php echo $row['name']; ?></title>
    <script type="text/javascript">
        function advsearch() {
            var comp=document.getElementById("company").value;
            var location=document.getElementById("location").value;
            var desig=document.getElementById("desig").value;
            var skills=document.getElementById("skills").value;
            // alert(keyword);
            var xmlhttp;
            if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
                    document.getElementById("subcontent").innerHTML = "Searching..";
                } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("subcontent").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("subcontent").innerHTML = "Error Occurred. <a href='profile.php'>Reload Or Try Again</a> the page.";
                }
            }
            xmlhttp.open("GET", "adv_search.php?com=" + comp +"&loc=" + location +"&desig=" + desig + "&skills="+ skills, true);
            xmlhttp.send();
        }
    </script>
</head>
<body>

<div id="nav">
    <nav>
        <div class="collapse navbar-collapse" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Portal</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="profile.php">Profile<span class="sr-only">(current)</span></a></li>
                <li><a href="#">Notifications</a></li>
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
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search Jobs">
                </div>
                <button type="button" class="btn btn-default" onclick="search();">Search</button>
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
<!------------------------------------------------------------------------------- -->
<div class="container-fluid" id="content">

    <aside class="col-sm-3" role="complementary">
        <div class="region region-sidebar-first well" id="sidebar">
           <h3 style="color: #009999" class="text-center" > Welcome <?php echo $row['name']; ?> </h3>
        </div>

        <!-- profile pic -->
        <div class="thumbnail text-center">
            <div class="img thumbnail">
                <?php if($row['photo']!="") {
                    echo "<img src = '../uploads/images/".$row['photo']."' class='img-circle' >";
                }else echo" <img src='../images/paris.jpg'>";
                ?>
        </div>
            <strong><?php echo $row['name']; ?> </strong>
            <!-- Button trigger modal -->
          <p> <a href="chane_image.php"><button type="button" class="btn btn-default" >Change Image </button></a>
        <!-- profile pic --->
</aside>
    <!------------------------------------------------------------------------------- -->

<div id="header">
<h3> Find jobs, edit your profile or update your current resume for better jobs!</h3>
</div>

<section class="col-sm-7">
    <div id="searchcontent">
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#details">Your Profile</a></li>
    <li><a data-toggle="tab"  href="#recjobs">Recommended Jobs</a></li>
    <li><a data-toggle="tab" href="#resume">Update Resume</a></li>
    <li><a data-toggle="tab" href="#advsearch">Advanced Search</a></li>
</ul>

<div class="tab-content">
    <!------------------------------------------------------------------------------- -->
    <div id="details" class="tab-pane fade in active" style="margin-top: 50px;">
        <h3> Your Profile</h3>
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
    <!------------------------------------------------------------------------------- -->
    <div id="recjobs" class="tab-pane fade" style="margin-top: 20px;">

        <?php
        $ug=$row['basic_edu'];
        $pg=$row['master_edu'];
        $q=mysqli_query($db1,"select * from jobs where ugqual='$ug' OR pgqual = '$pg'");
        if(mysqli_num_rows($q)>0) {
            echo "<h3>These jobs are reccomended to you based on your profile:</h3>
        <table style='margin-top: 20px; background: transparent;' class='table table-sriped'>";
            echo " <th> Company</th> <th>Job Title</th> <th>Job Description</th>  <th>Date of Posting</th> <th colspan='3''>Actions</th>";

            while ($result2 = mysqli_fetch_array($q)) {
                $query2 = mysqli_query($db1, "select * from employer where eid = '$result2[eid]'");
                $r2 = mysqli_fetch_array($query2);

                echo " <tr> ";
                echo "<td>" . $r2['ename'] . "</td>";
                echo "<td>" . $result2['title'] . "</td>";
                echo "<td>" . substr($result2['jobdesc'],0,120) . " ......</td>";
                echo "<td width='20px'>" . $result2['postdate'] . "</td>";
                echo "<td> <a style='color: whitesmoke;'  href='view_jobs.php?jid=" . $result2['jobid'] . "'> <button type='button' class='btn btn-success'>View Job</button></a>  </td>";
                echo "</tr>";
            }
        }
        else{
           echo "<h3 style='color: #122b40; margin-top: 30px;'>No jobs are reccomended to you at this moment! </h3>";
        }
        ?>
        </table>
    </div>
    <!------------------------------------------------------------------------------- -->
    <div id="resume" class="tab-pane fade">
        <div>
    <form action="../upload.php" enctype="multipart/form-data" method="post">
       <?php if($row['Resume']==""){
    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Note:</strong> You have'nt uploaded a resume file yet! Upload a attractive resume file for a better job!</p>
        </div>";
}?>

        <h4>Upload your updated resume file:</h4>
        <hr style="background-color: darkslateblue;">
        <div class="form-group" >
            <label class="form-group col-sm-3" for="file" style="font-size:16px; ">Select your resume file:</label>
             <div class="col-sm-7 form-inline">
                 <input type="file" name="file" id="resumefile" class="form-control">
                 <button class="btn btn-success" type="submit" name="submit" value="submit">Upload Resume</button>
             </div>
        </div>
    </form>
        <div class="page-header"></div>
        <?php if($row['Resume']!="") {
                echo "<a href = '../uploads/resume/".$row['Resume']."' > Download Your Current Resume File </a >";
         }?>

        <br>

    </div>
    </div> <!-- resume -->
    <!------------------------------------------------------------------------------- -->

    <div id="advsearch" class="tab-pane fade">
       <div class="container-fluid" id="advsearch" >
           <h2>Search for jobs</h2>
           <form role="form">
              <table>
                  <tr >
                      <td class="tbold">Company Name:</td>
                      <td><input type="text" class="form-control" id="company" name="company" required placeholder="Company Name:"> </td>
                  </tr>
                  <tr>
                    <td class="tbold">Location:</td>
                      <td>
                         <input type="text" class="form-control" id="location" name="location" placeholder="Your Prefered Location">
                      </td>
                  </tr>
                  <tr>
                      <td class="tbold">Job Title:</td>
                     <td><input type="text" class="form-control" id="desig" name="desig" required placeholder="Job Title/ Designation"></td>
                  </tr>
                  <tr>
                    <td class="tbold">Skills:</td>
                     <td><input type="text" class="form-control" id="skills" name="skills" required placeholder="Key Skills"></td>
                  </tr>

                  <tr>
                      <td class="tbold">Industy type:</td>
                      <td><input type = "text" class="form-control" id="industry" name="industry" placeholder="Industry Type"></td>

                  </tr>
                  <tr>
                      <td></td>
                      <td><button type="button" onclick="advsearch()" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Search Jobs</button></td>
                  </tr>
              </table>

           </form>
       </div>
        <hr>
        <div id="subcontent">

        </div>
    </div>
    <!------------------------------------------------------------------------------- -->
</div> <!-- tab contents -->
    </div><!-- closing searchcontent -->
</section> <!-- section 2 ends here -->

</div> <!-- main content div -->

</body>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<link href="../css/jobseeker.css" rel="stylesheet">
<script src="search.js"></script>
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>
