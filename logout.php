<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 02-04-2016
 * Time: 03:54 PM
 */

session_start();

// remove all session variables
unset($_SESSION[id]);
//session_unset();

// destroy the session
//session_destroy();

header('location:index.php?msg=success_logout');

?>