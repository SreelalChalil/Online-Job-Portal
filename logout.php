<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 02-04-2016
 * Time: 03:54 PM
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

// remove all session variables
unset($_SESSION[id]);
//session_unset();

// destroy the session
//session_destroy();

header('location:index.php?msg=success_logout');

?>