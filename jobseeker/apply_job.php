<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 13-04-2016
 * Time: 01:38 PM
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
$jobid=$_GET['jid'];
$jsid=$_SESSION['jsid'];
$date=date("d-m-y");
//echo  $jobid;
$q1=mysqli_query($db1,"select * from application where job_id =$jobid AND user_id = $jsid");
if(mysqli_num_rows($q1)>=1){
    echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Note:</strong> You have already applied for this job!</p>
        </div>";
}
else{
    /*$q3=mysqli_query($db1,"SELECT eid from jobs where jobid = '$jobid'");
    $q3result=mysqli_fetch_array($q3);
    $emp_id=$q3result['eid']; */
    //echo $emp_id;
    $q2=mysqli_query($db1,"insert into application (user_id,emp_id,job_id,date_applied) VALUES ($jsid,(SELECT eid from jobs where jobid = $jobid),$jobid,'$date')");
   // echo mysqli_error($db1);
    if($q2){
        echo " <div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Note:</strong> You have successfully applied for this job!</p>
        </div>";

    }
    else{
        echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Oops!:</strong>Sorry ! Failed to apply for this job!</p>
        </div>";
    }


}
?>