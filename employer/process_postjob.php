<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 08-04-2016
 * Time: 07:44 PM
 */
include_once('config.php');
session_start();
$eid=$_SESSION['eid'];
$desig=$_POST['desig'];
$vacno=$_POST['vacno'];
$desc=$_POST['jobdesc'];
$exp=$_POST['exp'];
$money=$_POST['money'];
$salary=$_POST['pay'];
$fnarea=$_POST['fnarea'];
$countryid=$_POST['country'];
$stateid=$_POST['state'];
$cityid=$_POST['city'];
$indtype=$_POST['indtype'];
$ug=$_POST['ugcourse'];
$pg=$_POST['pgcourse'];
$profile=$_POST['profile'];
$date=date('d-m-y');
$pay=$money." ".$salary;
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
mysqli_close($db2);
mysqli_select_db($db1,"jobportal");

$query4="insert into jobs (eid,title,jobdesc,vacno,experience,basicpay,fnarea,location,industry,ugqual,pgqual,profile,postdate )VALUES ('$eid','$desig','$desc','$vacno','$exp','$pay','$fnarea','$location','$indtype','$ug','$pg','$profile','$date')";

if (!mysqli_query($db1,$query4))
{
 echo("Error description: " . mysqli_error($db1));
}
else{
    header('location:profile.php?msg=jobposted');
}
?>