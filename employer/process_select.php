<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 14-04-2016
 * Time: 02:08 PM
 */
session_start();
include_once('config.php');
//echo "hello its working";
$user_id=$_GET['user'];
$emp_id=$_GET['emp'];
$job_id=$_GET['job'];
//echo $user_id . "  " . $emp_id ." " . $job_id;
$date=date('d-m-y');
$q=mysqli_query($db1,"select * from selection where job_id=$job_id and user_id= $user_id ");
if(mysqli_num_rows($q)>0){
    echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Sorry!</strong> This user is already Selected for the job</p>
        </div>";
}else{
    $q2=mysqli_query($db1,"insert into selection(user_id,emp_id,job_id,date,status) VALUES ($user_id,$emp_id,$job_id,'$date',1)");
    if($q2){
        echo " <div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Success!</strong> This user is succesfully selected for the job</p>
        </div>";
    }
    else{
        echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Sorry!</strong> Something Went Wrong! Try Again</p>
        </div>";
    }
}
?>
