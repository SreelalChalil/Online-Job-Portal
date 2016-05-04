<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 11-04-2016
 * Time: 04:14 PM
 */
session_start();
include_once('config.php');
if(isset($_POST['Done']))
{    $allowedExts = array("pdf", "doc", "docx");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);
    $filename=$_FILES["data"]["name"];
    $folder="uploads/resume/";
    move_uploaded_file($_FILES["data"]["tmp_name"], "$folder".$_FILES["data"]["name"]);
    $cmd="UPDATE `jobseeker` SET `resume`='$imagename'id='$uid'";
    $done=mysqli_query($db1,$cmd);
    if($done)
    {
        echo "Saved!!";
    }
    else
    {
        echo "Not saved!!!";
    }
}

?>