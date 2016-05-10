<?php
/**
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
session_start();
include_once('config.php'); //connects to the database
if (isset($_POST['email'])){
    $email = $_POST['email'];
    $query="select * from login where email='$email'";
    $result   = mysqli_query($db1,$query);
    $count=mysqli_num_rows($result);
    // If the count is equal to one, we will send message other wise display an error message.
    $sentmail=0;
    if($count==1)
    {
        $rows=mysqli_fetch_array($result);
        $pass  =  $rows['password'];//FETCHING PASS
        //echo "your pass is ::".($pass)."";
        $to = $rows['email'];
        //echo "your email is ::".$email;
        //Details for send
        //ing E-mail
        $from = "Job Portal";
        $url = "http://www.jobportal.com/";
        $body  =  "Your Password Recovery
		-----------------------------------------------
		Url : $url;
		email Details is : $to;
		Here is your password  : $pass;
		Sincerely,
		Coding Cyber";
        $from = "help@jobportal.com";
        $subject = "JobPortal Password recovered";
        $headers1 = "From: $from\n";
        $headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
        $headers1 .= "X-Priority: 1\r\n";
        $headers1 .= "X-MSMail-Priority: High\r\n";
        $headers1 .= "X-Mailer: Just My Server\r\n";
        $sentmail = mail ( $to, $subject, $body, $headers1 );
    } else {
        if ($_POST ['email'] != "") {
            echo '<span style="color: #ff0000;"> Not found your email in our database</span>';
		}
    }
    //If the message is sent successfully, display success message otherwise display an error message.
    if($sentmail==1)
    {
        echo "<span style='color: #ff0000;'> Your Password Has Been Sent To Your Email Address.</span>";
    }
    else
    {
        if($_POST['email']!="")
            echo "<span style='color: #ff0000;'> Cannot send password to your e-mail address.Problem with sending mail...</span>";
    }
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Forgot Password</title>
</head>
<body>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <label> Enter your User ID : </label>
    <input id="username" type="text" name="email" />
    <input id="button" type="submit" name="button" value="Sent My Password" />
</form>
</body>
</html>