<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 14-04-2016
 * Time: 10:00 AM
 */
session_start();
include_once('config.php');
// Upload and Rename File

if (isset($_POST['submit']))
{
    $filename = $_FILES["file"]["name"];
    $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
    $file_ext = substr($filename, strripos($filename, '.')); // get file name
    $filesize = $_FILES["file"]["size"];
    $allowed_file_types = array('.jpeg','.png','.jpg','.JPEG','.JPG');

    if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000))
    {
        // Rename file
        $newfilename = $_SESSION['name'].$_SESSION['eid'] . $file_ext;
        if (file_exists("uploads/logo/" . $newfilename))
        {
            // file already exists error
            unlink("uploads/logo/".$newfilename);
        }
        else {
            $imageInformation = getimagesize($_FILES['file']['tmp_name']);
            //print_r($imageInformation);

            $imageWidth = $imageInformation[0]; //Contains the Width of the Image

            $imageHeight = $imageInformation[1]; //Contains the Height of the Image

            if ($imageWidth <= 300 && $imageHeight <= 300) {


                move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/logo/" . $newfilename);
                mysqli_select_db($db1, "jobportal");
                $cmd = mysqli_query($db1, "update employer set logo = '$newfilename' WHERE eid=$_SESSION[eid]");
                if (!$cmd) {
                    echo("Error description: " . mysqli_error($db1));
                } else {
                    echo "File uploaded succesfully ; <a href='employer/profile.php'> Go back to profile </a>";
                }
            } else{
                echo "image size is too large";
            }
        }

    }
    elseif (empty($file_basename))
    {
        // file selection error
        echo "Please select a file to upload.";
    }
    elseif ($filesize > 200000)
    {
        // file size error
        echo "The file you are trying to upload is too large.";
    }
    else
    {
        // file type error
        echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
        unlink($_FILES["file"]["tmp_name"]);
    }
}

?>