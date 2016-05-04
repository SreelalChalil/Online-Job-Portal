<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 03-04-2016
 * Time: 03:41 PM
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
