<?php
include_once('config.php');
$value = $_GET['query'];
$formfield = $_GET['type']; // type of validation to do

// Check Valid or Invalid user name when user enters user name in username input field.
if ($formfield == "username") {

	 if($value=="")
    echo "Name Cant be empty";
 else if (strlen($value) < 3) {
echo "Must be 3+ letters";
} 
}

// Check Valid or Invalid password when user enters password in password input field.
if ($formfield == "password") {
    if($value=="")
    echo "password cant be empty";
 else
if (strlen($value) < 8) {
echo "Password too short";
} 
}

// Check Valid or Invalid email when user enters email in email input field.
if ($formfield == "email") {
    $sql = "SELECT email FROM login WHERE email = '$value'";
    $select = mysqli_query($db1, $sql);

    if($value=="")
    echo "Enter your email";
 else if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value) ||  (mysqli_num_rows($select) > 0)) {
echo "Invalid email or Email already taken";
} 
}

// Check Valid or Invalid website address when user enters website address in website input field.
if ($formfield == "website") {
if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $value)) {
echo "Invalid website";
} 
}

// long text validation
if ($formfield == "longtext") {
if (strlen($value) <30 ) {
echo "Must be 30+ letters";
} 
}

// address validation
if ($formfield == "address") {
    if($value=="")
        echo "Enter your address";
    else
    if (strlen($value) <20 ) {
        echo "Must be 20+ letters";
    }
}

//digit validation
if ($formfield == "digit") {
    if(!is_numeric($value))
   {
       echo "Input should be numeric";
   }
}

//small text validation
if ($formfield == "text") {
if (strlen($value) <10 ) {
echo "Must be 10+ letters";
} 
}

//mobile no validation
if ($formfield == "mobilenum") {
	$mob="/^[1-9][0-9]*$/"; // this is a regular expresssion
	if($value=='')
		echo "Enter your phone number";

else if ( ( !preg_match($mob, $value) ) || ( strlen($value) < 10 )) {
echo "Enter a valid phone number";
} 
}

// company name validation
if ($formfield == "company") {
    if($value=='' && (strlen($value)<3)) {
        echo "Enter the company name";
    }
    elseif(!( ctype_alnum($value) ) ) {
        echo "Company name contain invalid letters";
    }

}

if ($formfield=="pincode") {
    if($value=="")
        echo "Pincode cant be empty";
    else if(!is_numeric($value))
    {
        echo "Pincode should be numeric";
    }
}

?>