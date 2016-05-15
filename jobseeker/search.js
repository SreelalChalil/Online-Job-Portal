/**
 * Created by Sreelal on 12-04-2016.
 */

    function search() {
        var keyword=document.getElementById("keyword").value;
        // alert(keyword);
        var xmlhttp;
        if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
                document.getElementById("searchcontent").innerHTML = "Searching..";
            } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("searchcontent").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("searchcontent").innerHTML = "Error Occurred. <a href='profile.php'>Reload Or Try Again</a> the page.";
            }
        }
        xmlhttp.open("GET", "home_search.php?key=" + keyword , true);
        xmlhttp.send();
    }
