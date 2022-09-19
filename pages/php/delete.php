<?php
session_start(); 

  $db = mysqli_connect("localhost", "root", "", "taxbot_main_database");  

	$id = $_REQUEST['id'];
    $pid = $_SESSION['pid'];

$sql="SELECT img FROM upimg WHERE id = '$id'";

$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
    
    unlink("../../upsave/".$row['img']);
	
	// sending query
	mysqli_query($db, "DELETE FROM upimg WHERE id = '$id'")
        or die(mysqli_error());
    
        $_SESSION["up_signe"] = "done";
        header("Location: ../editform.php?id=$pid");
    
    

?>