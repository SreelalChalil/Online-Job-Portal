

// AJAX code to check input field values when onblur event triggerd.
function validate(type,field, query) {
var xmlhttp;
if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} else { // for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
document.getElementById(field).innerHTML = "Validating..";
} else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
document.getElementById(field).innerHTML = xmlhttp.responseText;
} else {
document.getElementById(field).innerHTML = "Error Occurred. <a href='index.php'>Reload Or Try Again</a> the page.";
}
}
xmlhttp.open("GET", "/job_portal/js/valid.php?type=" + type + "&query=" + query, true);
xmlhttp.send();
}

/* function numValidate(txtid,erlabel)
    {
         var ok=0;
         var a=document.getElementById(txtid).value;
       
       for(var i=0;i<=a.length-1;i++)
        {
        var j=a.charCodeAt(i);
           for(var k=48;k<=57;k++)
        {
          ok=0;
          if(k==j)
          {
            ok=1;
            break ;
          }
        }
       
      }
      if(ok==0)
      {
       document.getElementById("erlabel").innerHTML="Error: Name cant be empty!";
        document.getElementById(txtid).value="";
        for(var i=0;i<a.length-1;i++)
        {
         var j=a.charCodeAt(i);
           for(var k=48;k<=57;k++)
          {
          ok=0;
          if(k==j)
          {
           document.getElementById(txtid).value+=a.charAt(i);
           }
         } 
        }
      }
    }
    
    
    function countChars(countfrom,displayto) {
  var len = document.getElementById(countfrom).value.length;
  if(len < 8)
  {
  alert("Maximum 8 Digits Needed");
  document.getElementById('data').value="";
  }
  */
  function validateRadio(name,errorfeild){

if ( ( document.getElementsByName(name)[0].checked == false ) && (document.getElementsByName(name)[1].checked == false ) )
  { document.getElementById(errorfeild).innerHTML="Select an option";}
else{
      document.getElementById(errorfeild).innerHTML="";
}
}

