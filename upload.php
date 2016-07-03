<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 12-04-2016
 * Time: 03:38 PM
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
include_once('config.php');
// Upload and Rename File
if (isset($_POST['submit']))
{
    $filename = $_FILES["file"]["name"];
    $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
    $file_ext = substr($filename, strripos($filename, '.')); // get file name
    $filesize = $_FILES["file"]["size"];
    $allowed_file_types = array('.doc','.docx','.pdf');

    if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000))
    {
        // Rename file
        $newfilename = $_SESSION['jsname'].$_SESSION['jsid'] . $file_ext;
        if (file_exists("uploads/resume/" . $newfilename))
        {
            // file already exists error
            unlink("uploads/resume/".$newfilename);
        }

            move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/resume/" . $newfilename);
            mysqli_select_db($db1,"jobportal");
            $cmd=mysqli_query($db1,"update jobseeker set Resume= '$newfilename' WHERE user_id=$_SESSION[jsid]");
            if (!$cmd)
            {
                echo("Error description: " . mysqli_error($db1));
            }
            else{
               echo "File uploaded succesfully ; <a href='jobseeker/profile.php'> Go back to profile </a>";
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