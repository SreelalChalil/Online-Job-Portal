<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 03-04-2016
 * Time: 03:41 PM
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

    echo "<h1>World</h1>";
    $date=date('d-m-y');
    echo "<h2> Date:".$date."</h2>";
?>
<html>
<head>
    <script type="text/javascript">
        function show() {
            dob = document.getElementById("dob").value;
            alert(dob);
        }
    </script>
</head>
</html>
<body>
<input type="date" id="dob"> <button onclick="show()"></button>
</body>
