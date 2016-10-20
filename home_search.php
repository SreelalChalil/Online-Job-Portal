<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 07-04-2016
 * Time: 10:15 PM
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
include_once("config.php");
$keyword= $_GET['key'];
if($keyword==""){
    echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Oops!</strong> Please enter a search term</p>
        </div>";

}
else{
$query = "select * from jobs  join employer  on jobs.eid = employer.eid  where title LIKE '%" . $keyword . "%' or employer.ename LIKE '%".$keyword."%' or employer.profile LIKE '%" . $keyword . "%'" ;
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
<div class="table-responsive">
<table class="table table-striped">
    <th>Company</th>
    <th>Position</th>
    <th>Post Date</th>
    <th>Candidate Profile</th>
    <?php
    echo "<h3 style='color:green'> Search Results Matching :" . $keyword . "</h3> ";

    while ($row = mysqli_fetch_array($result)) {
        //$query2 = mysqli_query($db1, "select * from employer where eid = '$row[eid]'");
        //$r2 = mysqli_fetch_array($query2)
        echo " <tr> ";
        echo "<td>" . $row['ename'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['postdate'] . "</td>";
        echo "<td>" . substr($row['jprofile'],0,120) . "......</td>";  
        echo "</tr>";
    }
    echo "<h4> <a href='login.php'>Login to view more</a> </h4>";
    }

    }     ?>
</table>
 </div>
</html>
