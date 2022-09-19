<?php
session_start();  

if(isset($_SESSION["up_signe"]))
{
    unset($_SESSION["sign_donee"]);
    $_SESSION["sign_errore"] = "display: none";
} 
elseif(isset($_SESSION["up_sign2e"]))
{
    unset($_SESSION["sign_errore"]);
    $_SESSION["sign_donee"] = "display: none";
}
else
{
    $_SESSION["sign_donee"] = "display: none";
    $_SESSION["sign_errore"] = "display: none";
}




if(isset($_GET['id'])){
    $getid = $_GET['id'];
    $_SESSION['pid'] = $getid;
unset($_SESSION["hidden"]);
    $_SESSION['cont'] = "height: 1000px";
}
elseif(isset($_SESSION['prvid']))
{
    $_SESSION['pid'] = $_SESSION['prvid'];
}
else {
    $_SESSION['pid'] = "0";
    $_SESSION['hidden'] = "display: none";
    $_SESSION['cont'] = "height: 480px";
}



$vgetid = $_SESSION['pid'];

$con = mysqli_connect("localhost","root","","taxbot_main_database")or die("cannot connect database server.");
$sql="SELECT * FROM testdata WHERE pid=$vgetid";

$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);

    while($rows=mysqli_fetch_array($result)){

   
   
    
?>


<html>
    <head>
        <title>Welcome!</title>
        <link rel="stylesheet" type="text/css" href="css/dashboard.css" media="all">
        
    </head>
    
    
    <body>
        
        <div id="sub_containered" style="<?php echo $_SESSION['cont']; ?>;">
        
        <div id="header">
        <a href="../index.php"><img style="margin-top: 20px;" src="../img/banner6.png"/></a>
        </div>
        
                <div class="top">
                    <a class="top_text" href="dashboard.php">Upload</a>
                    <a class="stay_on" href="editform.php">Edit</a>
                    <a class="logout" href="../index.php">Log Out!</a>
                    
                  
                </div>
        
            
        
        
        <div id="main_container">
            
            <div class="top-row">
                                    <div class="field-wrap">
            <form action="" method="get">
                <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Enter Plant ID:</label>
                <input type="text" name="id" autocomplete="off" autofocus required />
            </form>
                </div>
            </div>
            
            
            <div style="<?php echo $_SESSION['sign_donee']; ?>; margin-top: 20px;">
            <a style="text-align: center;font-size: 18px;font-weight: 600;width: 700px;color: #32b932;border-radius: 25px;">Successfully Updated!</a><br/><br/>
            </div>
            
            <div style="<?php echo $_SESSION['sign_errore']; ?>">
            <a style="text-align: center;font-size: 18px;font-weight: 600;width: 700px;color: #f44336;border-radius: 25px;">ERROR! Try Again...</a><br/><br/>
            </div>
             
        <div style="<?php echo $_SESSION['hidden']; ?>">
            
            
            <form action="php/editform.php" method="post" enctype="multipart/form-data">
            
            <div class="info_tab">
                                    <a style="font-size: 18px;">Form ID: <i><b><?php echo $rows['pid'] ?></b></i></a>
                                </div>
            <br/><br/><br/><br/>
            
                                <div class="top-row">
                                    <div class="field-wrap">
                                        <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Genus</label>
                                        <textarea name="genus" autocomplete="off"><?php echo $rows['genus'] ?></textarea>
                                    </div>
                                    
                                    <div class="field-wrap">
                                        <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Species</label>
                                        <textarea name="species" autocomplete="off"><?php echo $rows['species'] ?></textarea>
                                    </div>
                                    
                                    <div class="field-wrap">
                                        <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Family</label>
                                        <textarea name="family" autocomplete="off"><?php echo $rows['family'] ?></textarea>
                                    </div>
                                    
                                </div>
                
               
                
                <br/>
                
                <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Upload picture:</label><br/>
			<input type="file" name="pic" id="pic">
                
                
                <?php
        
       
$sql2="SELECT * FROM upimg WHERE pid=$vgetid";

$result2 = mysqli_query($con, $sql2);
$count2 = mysqli_num_rows($result2);


while($rows2=mysqli_fetch_array($result2)){
    $_SESSION['pid'] = $rows2['pid'];
        
        
        ?>
                
                <div style="float: left; margin-left: 50px; margin-top: 10px;">
                    <img height="100" src="../upsave/<?php echo $rows2['img'] ?>"/>
                    <br/>
                    <a style="font-size: 12px;" href="php/delete.php?id=<?php echo $rows2['id'] ?>">Delete</a>
                </div>
                
                <?php
}
            ?>
                 
                
                 <br/><br/><br/><br/><br/><br/><br/>
                
                <div style="clear: both;" class="top-row">
                    <br/>
                                    <div class="field-wrap">
                                        <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Common Name (English)</label>
                                        <textarea name="common" autocomplete="off"><?php echo $rows['common'] ?></textarea>
                                    </div>
                                    <div class="field-wrap">
                                        <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Local Name (Bangla)</label>
                                        <textarea name="local" autocomplete="off"><?php echo $rows['local'] ?></textarea>
                                    </div>
                    
                    <div class="field-wrap">
                                        <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Habit</label>
                                        <textarea name="habit" autocomplete="off"><?php echo $rows['habit'] ?></textarea>
                                    </div>
                                    <div class="field-wrap">
                                        <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Mode of Origin</label>
                                        <textarea name="origin" autocomplete="off"><?php echo $rows['origin'] ?></textarea>
                                    </div>
                                
                        
                                    <div class="field-wrap">
                                        <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Uses</label>
                                        <textarea name="uses" style="height: 80px;" autocomplete="off"><?php echo $rows['uses'] ?></textarea>
                                    </div>
                    
                    <div class="field-wrap">
                                        <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Additional Information</label>
                                        <textarea name="addinfo" style="height: 80px;" autocomplete="off"><?php echo $rows['addinfo'] ?></textarea>
                                    </div>
                                    
                                </div>
                
                
                <br/><br/>
                
                <button class="submit_button_style" type="submit">Submit</button>
        </form>
            
                
        </div>
            
            
            
        </div>
        </div>
        
        
        <?php
}

?>
        
        <?php       
        unset($_SESSION["up_signe"]);
        unset($_SESSION["up_sign2e"]);
        unset($_SESSION["sign_donee"]);
        unset($_SESSION["sign_errore"]);
        unset($_SESSION["prvid"]);
        unset($_SESSION["cont"]);
        ?>
        
    </body>
</html>