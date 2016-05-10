<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 16-04-2016
 * Time: 10:16 AM
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
?>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
<nav class="navbar" id="insidenav">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Job Portal</a>
        </div>

        <ul class="nav navbar-nav">
            <li class="active"><a data-toggle="tab" href="#main1">Home</a></li>
            <li><a data-toggle="tab" href="#recent"">Recent Jobs</a></li>
            <li><a data-toggle="tab" href="#jobseeker">Job Seeker</a></li>
            <li><a data-toggle="tab" href="#">Company</a></li>
            <li><a data-toggle="tab" href="#contact">Contact Us</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="glyphicon glyphicon-user"></span> Register <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="register_user.php">Jobseeker</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="register_emp.php">Company</a></li>
                </ul>
            </li>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>
</body>
</html>