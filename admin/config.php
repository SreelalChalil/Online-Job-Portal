<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 19-03-2016
 * Time: 05:04 AM
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