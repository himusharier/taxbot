<?php
session_start();


$db = mysqli_connect("localhost", "root", "", "taxbot_main_database");


if(isset($_POST['subbutton']))
{

    $_SESSION['genus'] = $_POST["genus"];
    $_SESSION['species'] = $_POST["species"];
    $_SESSION['family'] = $_POST["family"];
    $_SESSION['common'] = $_POST["common"];
    $_SESSION['local'] = $_POST["local"];
    $_SESSION['habit'] = $_POST["habit"];
    $_SESSION['origin'] = $_POST["origin"];
    $_SESSION['uses'] = $_POST["uses"];
    $_SESSION['addinfo'] = $_POST["addinfo"];
    
    $ipgenus = mysqli_real_escape_string($db, $_SESSION['genus']);
    $ipspecies = mysqli_real_escape_string($db, $_SESSION['species']);
    $ipfamily = mysqli_real_escape_string($db, $_SESSION['family']);
    $ipcommon = mysqli_real_escape_string($db, $_SESSION['common']);
    $iplocal = mysqli_real_escape_string($db, $_SESSION['local']);
    $iphabit = mysqli_real_escape_string($db, $_SESSION['habit']);
    $iporigin = mysqli_real_escape_string($db, $_SESSION['origin']);
    $ipuses = mysqli_real_escape_string($db, $_SESSION['uses']);
    $ipaddinfo = mysqli_real_escape_string($db, $_SESSION['addinfo']);
    

    $pid = rand(1000,1000000);
    
    $sql = "SELECT pid FROM testdata WHERE pid = '$pid'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    if($pid == $row['pid'])
    {
        $again = rand(1000,1000000);
        $pid = $again;
        
        if($pid == $row['pid'])
        {
            header("updata.php");
        }
    }
    
    

        $file = uniqid().time().rand(1000,100000);
        $file_type = pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION);
        $save_file = $file.".".$file_type;
        $file_loc = $_FILES['pic']['tmp_name'];
        $save = "../../upsave/".$save_file;
	
	   // make file name in lower case
	   $lowerchr = strtolower($file);
       // make file name in lower case
       
       $new_file_name = $lowerchr.".".$file_type;
	
	   $final_file=str_replace(' ','-',$new_file_name);

    
    // Compress image
        function compressIMG($source, $destination, $quality) {

            $info = getimagesize($source);

            if ($info['mime'] == 'image/jpeg') 
                $image = imagecreatefromjpeg($source);

            elseif ($info['mime'] == 'image/png') 
                $image = imagecreatefrompng($source);
            
            elseif ($info['mime'] == 'image/gif') 
                $image = imagecreatefromgif($source);

            imagejpeg($image, $destination, $quality);
            
            return $destination; 

        }
        
        
        if(compressIMG($file_loc, $save, 60))
	   {
            $sql2 = "SELECT * FROM upimg";
            $result2 = mysqli_query($db, $sql2);
            $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
            
            $input2 = "INSERT INTO upimg (pid, img) VALUES ('$pid', '$final_file')";
            mysqli_query($db, $input2);
            $_SESSION["up_sign"] = "done";
            header("location: ../dashboard.php");
	   }
	   else
	   {
            $_SESSION['up_sign2'] = "error";
            $_SESSION['prvid'] = $pid;
            header("location: ../dashboard.php");
	   }
    
    
    


$input = "INSERT INTO testdata (pid, genus, species, family, common, local, habit, origin, uses, addinfo) VALUES ('$pid', '$ipgenus', '$ipspecies', '$ipfamily', '$ipcommon', '$iplocal', '$iphabit', '$iporigin', '$ipuses', '$ipaddinfo')";
    
    if(mysqli_query($db, $input)){
        $_SESSION["up_sign"] = "done";
        header("location: ../dashboard.php");
    }
    else {
        $_SESSION["up_sign2"] = "error";
        header("location: ../dashboard.php");
    }
    
    
    
}

?>