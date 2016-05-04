<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 26-03-2016
 * Time: 8:40 PM
 */
include_once('config.php');

$email=$_POST['email'];
$passd=$_POST['password'];
$query=mysqli_query($db1,"select * from login where email='$email'");
$result=mysqli_fetch_array($query,MYSQLI_ASSOC);

if(($result>0) && ( password_verify( $passd, $result['password'] ) ) ){
    if($result['usertype']=="jobseeker")
    {
        session_start();
        $_SESSION["id"] = $result['log_id'];
        $_SESSION["type"] = $result['usertype'];
        header('location:jobseeker/profile.php?msg=success');
    }
 elseif($result['usertype']=="employer")
 {
     session_start();
     $_SESSION["elogid"] = $result['log_id'];
     $_SESSION["type"] = $result['usertype'];
     $_SESSION["status"]=$result['status'];
     header('location:employer/profile.php?msg=success');
 }
}
else
{
header('location:login.php?msg=failed');
}
?>