<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 10-04-2016
 * Time: 06:09 AM
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
session_start();
if(!isset($_SESSION['id'])){
    header('location:../login.php?msg=please_login');
}
elseif(!isset($_GET['jid'])){
    header('location:managejobs.php?msg=selectjob');
}
$query = "DELETE FROM jobs WHERE jobid=$_GET[jid]";
$result = mysqli_query($db1,$query);
if($result) {
    echo "<h3 style='color: green;'> Selected Job Is Successfully Deleted</h3>";
}
else{
    echo "<h3 style='color: red;'> Failed to delete the selected job!</h3>";
}
?>

