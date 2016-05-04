<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 09-04-2016
 * Time: 05:04 AM
 */
$host = "localhost";
$user  = "root";
$password =  "sreelal";
$database1 = "jobportal";
$database2 = "location";
$db1 = new mysqli($host, $user, $password, $database1);
/*if($db1->connect_errno > 0){
    die('Unable to connect to database' . $db1->connect_error);
}else{
    echo "Database jobportal is connected.";
}
*/
$db2 = new mysqli($host, $user, $password, $database2);
/*if($db2->connect_errno > 0){
    die('Unable to connect to database' . $db2->connect_error);
}else{
    echo "Database location is connected.";
}
*/
?>