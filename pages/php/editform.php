<?php 
session_start(); 

        $pid = $_SESSION['pid'];

$db = mysqli_connect("localhost", "root", "", "taxbot_main_database");

$sql = "SELECT * FROM testdata WHERE pid = '$pid'";
        $result = mysqli_query($db, $sql);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
if($count = 1)
    {
    
    if(isset($_POST["genus"]))
    {
        $_SESSION['genuse'] = $_POST["genus"];
    }
    else
    {
        $_SESSION['genuse'] = $row['genus'];
    }
    
    if(isset($_POST["species"]))
    {
        $_SESSION['speciese'] = $_POST["species"];
    }
    else
    {
        $_SESSION['speciese'] = $row['species'];
    }
    
    if(isset($_POST["family"]))
    {
        $_SESSION['familye'] = $_POST["family"];
    }
    else
    {
        $_SESSION['familye'] = $row['family'];
    }
    
    if(isset($_POST["common"]))
    {
        $_SESSION['commone'] = $_POST["common"];
    }
    else
    {
        $_SESSION['commone'] = $row['common'];
    }
    
    if(isset($_POST["local"]))
    {
        $_SESSION['locale'] = $_POST["local"];
    }
    else
    {
        $_SESSION['locale'] = $row['local'];
    }
    
    if(isset($_POST["habit"]))
    {
        $_SESSION['habite'] = $_POST["habit"];
    }
    else
    {
        $_SESSION['habite'] = $row['habit'];
    }
    
    if(isset($_POST["origin"]))
    {
        $_SESSION['origine'] = $_POST["origin"];
    }
    else
    {
        $_SESSION['origine'] = $row['origin'];
    }
    
    if(isset($_POST["uses"]))
    {
        $_SESSION['usese'] = $_POST["uses"];
    }
    else
    {
        $_SESSION['usese'] = $row['uses'];
    }
    
    if(isset($_POST["addinfo"]))
    {
        $_SESSION['addinfoe'] = $_POST["addinfo"];
    }
    else
    {
        $_SESSION['addinfoe'] = $row['addinfo'];
    }
    
    if(!empty($_FILES['pic']['name']))
    {
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

        
        $sql2 = "SELECT * FROM upimg";
        $result2 = mysqli_query($db, $sql2);
        
        
        if(compressIMG($file_loc, $save, 60))
	   {
            $input = "INSERT INTO upimg (pid, img) VALUES ('$pid', '$final_file')";
            mysqli_query($db, $input);
	   }
	   else
	   {
            $_SESSION['up_sign2e'] = "error";
            $_SESSION['prvid'] = $pid;
            header("location: ../editform.php");
	   }
        
        
    }
    else
    {
        $_SESSION['up_sign2e'] = "error";
        $_SESSION['prvid'] = $pid;
        header("location: ../editform.php");
    }
    
    
    
    $ipgenuse = mysqli_real_escape_string($db, $_SESSION['genuse']);
    $ipspeciese = mysqli_real_escape_string($db, $_SESSION['speciese']);
    $ipfamilye = mysqli_real_escape_string($db, $_SESSION['familye']);
    $ipcommone = mysqli_real_escape_string($db, $_SESSION['commone']);
    $iplocale = mysqli_real_escape_string($db, $_SESSION['locale']);
    $iphabite = mysqli_real_escape_string($db, $_SESSION['habite']);
    $iporigine = mysqli_real_escape_string($db, $_SESSION['origine']);
    $ipusese = mysqli_real_escape_string($db, $_SESSION['usese']);
    $ipaddinfoe = mysqli_real_escape_string($db, $_SESSION['addinfoe']);
    
    
	
        // Insert Data
        $input = "UPDATE testdata SET genus='$ipgenuse', species='$ipspeciese', family='$ipfamilye', common='$ipcommone', local='$iplocale', habit='$iphabite', origin='$iporigine', uses='$ipusese', addinfo='$ipaddinfoe' WHERE pid='$pid'";
    
    if(mysqli_query($db, $input))
        {
        $_SESSION["up_signe"] = "done";
        $_SESSION['prvid'] = $pid;
        header("location: ../editform.php?id=$pid");
        }
    else 
    {
        $_SESSION['up_sign2e'] = "error";
        $_SESSION['prvid'] = $pid;
        header("location: ../editform.php");
    }

    }
        
else 
    {
        $_SESSION['up_sign2e'] = "error";
        $_SESSION['prvid'] = $pid;
        header("location: ../editform.php");
    }



        unset($_SESSION["genuse"]);
        unset($_SESSION["speciese"]);
        unset($_SESSION["familye"]);
        unset($_SESSION["commone"]);
        unset($_SESSION["locale"]);
        unset($_SESSION["habite"]);
        unset($_SESSION["origine"]);
        unset($_SESSION["usese"]);
        unset($_SESSION["addinfoe"]);
        unset($_SESSION["pice"]);
       



?>