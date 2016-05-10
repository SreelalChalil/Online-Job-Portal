<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 14-04-2016
 * Time: 02:08 PM
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
