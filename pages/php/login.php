<?php
session_start();


if(!$_POST["passcode"])
{
	$_SESSION['error_login'] = "Passcode is required!";
	header("location: ../login.php"); // fill email
}

elseif (!empty($_POST['passcode'])) 
{
	$db = mysqli_connect("localhost", "root", "", "taxbot_main_database");
 
    $password = mysqli_real_escape_string($db, $_POST['passcode']); 

    $sql = "SELECT * FROM user WHERE password_x = '$password'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			
	
        if ($row['password_x'] == $password ) 	//find data into database
        {   
            unset($_SESSION["error_login"]);
            $_SESSION['passbot7'] = $row['password'];
	        header("location: ../dashboard.php");
        }
    
        else  
        {
	       $_SESSION['error_login'] = "Wrong passcode!";	//can not find you
            header("location: ../login.php");
        }
    
    
}



?>