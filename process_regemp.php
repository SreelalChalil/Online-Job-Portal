<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 30-03-2016
 * Time: 01:56 PM
 */
include_once('config.php');
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