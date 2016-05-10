<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 08-04-2016
 * Time: 05:34 PM
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $qadm=mysqli_query($db1,"select * from admin where adm_name = $user and adm_pass = $pass" );
   if(mysqli_num_rows($qadm)>0){
       header('location:home.php?msg=success');
   }

}
?>
<html>
<head>
<style type="text/css">
    #main{
        text-align: center;
        position : absolute;
        top: 50%;
        margin-top: -50px;
        margin-left: 50%;
    }
</style>
</head>
<body>
<div id="main">
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <h2>Authenticate</h2>
        <table style="align-self: center;">
             <tr>
                 <td>Username:</td>
                 <td><input type="password" name="user"> </td>
             </tr>

            <tr>
                <td>Password</td>
                <td><input type="password" name="pass"></td>
            </tr>
            <tr>
                <td><input type="submit"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
