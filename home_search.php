<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 07-04-2016
 * Time: 10:15 PM
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
$query = "select * from jobs where title LIKE '%" . $keyword . "%'";
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
    <th>Post Date</th>

    <?php
    echo "<h3> Search Results Matching :" . $keyword . "</h3>";

    while ($row = mysqli_fetch_array($result)) {
        $query2 = mysqli_query($db1, "select * from employer where eid = '$row[eid]'");
        $r2 = mysqli_fetch_array($query2);

        echo " <tr> ";
        /*for ($i=0; $i <3 ; $i++) {*/
        echo "<td>" . $r2['ename'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['postdate'] . "</td>";

        echo "</tr>";
    }
    echo "<h4> <a href='login.php'>Login to view more</a> </h4>";
    }

    }     ?>
</table>
</html>
