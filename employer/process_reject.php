<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 14-04-2016
 * Time: 02:08 PM
 */
session_start();
include_once('config.php');
//echo "reject is working";
$user_id=$_GET['user'];
$emp_id=$_GET['emp'];
$job_id=$_GET['job'];
$q=mysqli_query($db1,"select * from application where job_id=$job_id and user_id= $user_id");
$result=mysqli_fetch_array($q);
if(mysqli_num_rows($q)>0 && $result['status']!=2){
    $q2=mysqli_query($db1,"update application set status = 2 where job_id=$job_id and user_id= $user_id");
    if($q2){
        echo " <div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Sucess!</strong> This user application is rejected</p>
        </div>";
    }
    else{
        echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Sorry!</strong> Something Went Wrong</p>
        </div>";
    }
}
else{
    echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Sorry!</strong> This user is already rejected</p>
        </div>";
}
?>