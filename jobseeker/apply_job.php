<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 13-04-2016
 * Time: 01:38 PM
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