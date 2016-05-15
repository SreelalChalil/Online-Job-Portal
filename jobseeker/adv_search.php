<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 13-04-2016
 * Time: 08:11 AM
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
$query = "select * from jobs  where title = '$desig'  or (location LIKE '%" . $location . "%') or (jprofile LIKE '%" . $skills . "%') ";
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
    <th>Company:</th>
    <th>Position:</th>
    <th>Description:</th>
    <th>Post Date:</th>

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