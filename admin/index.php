<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 08-04-2016
 * Time: 05:34 PM
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
