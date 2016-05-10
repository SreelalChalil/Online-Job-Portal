<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 26-03-2016
 * Time: 8:40 PM
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