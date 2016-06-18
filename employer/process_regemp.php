<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 30-03-2016
 * Time: 01:56 PM
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
include_once('../config.php');
$email=$_POST['email'];
$password=$_POST['pass1'];
$hash = password_hash($password, PASSWORD_DEFAULT);
$name=$_POST['compname'];
$type=$_POST['comtype'];
//echo $type;
$industry=$_POST['indtype'];
//echo $industry;
$addr=$_POST['addr'];
$pin=$_POST['pin_code'];
$person=$_POST['person'];
$phone=$_POST['phone'];
$countryid=$_POST['country'];
$stateid=$_POST['state'];
$cityid=$_POST['city'];

mysqli_select_db($db2,"location");

$query1=mysqli_query($db2,"select name from countries WHERE id = '$countryid'")  or die("Wrong Query");
$row = mysqli_fetch_assoc($query1);
$country= $row['name'];

$query2=mysqli_query($db2,"select name from states WHERE id = '$stateid'")  or die("Wrong Query");
$row = mysqli_fetch_assoc($query2);
$state= $row['name'];
//echo $state;

$query3=mysqli_query($db2,"select name from cities WHERE id = '$cityid'")  or die("Wrong Query");
$row = mysqli_fetch_assoc($query3);
$city= $row['name'];

$location=$country.",".$state.",".$city;

$query4="INSERT INTO login (email,password,usertype,status) VALUES ('$email','$hash','employer',0)";
    $result1 = mysqli_query($db1,$query4) or die("Cant Register , The user email may be already existing");
$query5 =  "INSERT INTO employer (log_id,ename,phone,location,etype,address,pincode,executive,industry)
                VALUES ((SELECT log_id FROM login WHERE email='$email'),'$name','$phone','$location','$type','$addr','$pin','$person','$industry')";

 //$result2 = mysqli_query($db1,$query5);
if (!mysqli_query($db1,$query5))
{
    echo("Error description: " . mysqli_error($db1));
}
else{
    header('location:login.php?msg=registered');
}
?>