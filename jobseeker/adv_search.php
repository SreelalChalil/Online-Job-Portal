<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 13-04-2016
 * Time: 08:11 AM
 */
session_start();
include_once("config.php");
$company=$_GET['com']; //company name
$location=$_GET['loc'];
$desig=$_GET['desig'];
$skills=$_GET['skills'];
if($company=="" || $location =="" || $desig =="" ||  $skills==""){
    echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Oops!</strong> Please Fill the form!</p>
        </div>";

}
else{
$query = "select * from jobs  where title = '$desig'  or (location LIKE '%" . $location . "%') or (profile LIKE '%" . $skills . "%') ";
$result = mysqli_query($db1, $query);

if (mysqli_num_rows($result) == 0)
{
    echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Sorry!</strong> No jobs found matching your search, try something else</p>
        </div>";
}
else {
?>

<html>
<table class="table table-striped">
    <th>Company</th>
    <th>Position</th>
    <th style="width: 20px;">Description:</th>
    <th>Post Date</th>

    <?php
    echo "<h4> Search Results Matching :";
    if($company!="") echo $company.", ";
    if($location!="") echo $location.", ";
    if($desig!="") echo $desig.", ";
    if($skills!="") echo $skills.". ";
    echo "</h4>";

    while ($row = mysqli_fetch_array($result)) {
        $query2 = mysqli_query($db1, "select * from employer where eid = '$row[eid]'");
        $r2 = mysqli_fetch_array($query2);

        echo " <tr> ";
        /*for ($i=0; $i <3 ; $i++) {*/
        echo "<td> <a href='view_emp.php?id=".$r2['eid']."'>" . $r2['ename'] . "</a></td>";
        echo "<td> <a href='view_jobs.php?jid=". $row['jobid']."'>". $row['title'] . "</a></td>";
        echo "<td>" . substr($row['jobdesc'],0,70)." "."......." ."</td>";
        echo "<td>" . $row['postdate'] . "</td>";

        echo "</tr>";
    }

    }

    }     ?>
</table>
</html>