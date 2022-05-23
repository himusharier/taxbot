<?php
session_start();

if(isset($_SESSION["up_sign"]))
{
    unset($_SESSION["sign_done"]);
    $_SESSION["sign_error"] = "display: none";
} 
elseif(isset($_SESSION["up_sign2"]))
{
    unset($_SESSION["sign_error"]);
    $_SESSION["sign_done"] = "display: none";
}
else
{
    $_SESSION["sign_done"] = "display: none";
    $_SESSION["sign_error"] = "display: none";
}


$conc = mysqli_connect("localhost","root","","xylem")or die("cannot connect database server.");
$sqlc="SELECT pid FROM testdata";

$resultc = mysqli_query($conc, $sqlc);
$countc = mysqli_num_rows($resultc);
$countnum = ($countc - 1);

    
?>


<html>
    <head>
        <title>Welcome!</title>
        <link rel="stylesheet" type="text/css" href="css/dashboard.css" media="all">
        
    </head>
    
    
    <body>
        
        <div id="sub_container">
        
        <div id="header">
        <a href="../index.php"><img style="margin-top: 20px;" src="../img/banner6.png"/></a>
        </div>
        
                <div class="top">
                    <a class="stay_on" href="dashboard.php">Upload</a>
                    <a class="top_text" href="editform.php">Edit</a>
                    <a class="logout" href="../index.php">Log Out!</a>
                    <a style="float: right; font-size: 12px; text-decoration: underline; color: #4e4e4e;" href="print.php" target="_blank">Database<br/>[Total Entry: <?php echo $countnum ?>]</a>
                    
                  
                </div>
         
            
        
        
        <div id="main_container">
            
            <div style="<?php echo $_SESSION['sign_done']; ?>">
            <a style="text-align: center;font-size: 18px;font-weight: 600;width: 700px;color: #32b932;border-radius: 25px;">Successfully Uploaded!</a><br/><br/>
            </div>
            
            <div style="<?php echo $_SESSION['sign_error']; ?>">
            <a style="text-align: center;font-size: 18px;font-weight: 600;width: 700px;color: #f44336;border-radius: 25px;">ERROR! Try Again...</a><br/><br/>
            </div>
            
            
            <form action="php/updata.php" method="post" enctype="multipart/form-data">
            
            <div class="info_tab">
                                    <a>Upload Form:</a>
                                </div>
            <br/><br/><br/><br/>
            
                                <div class="top-row">
                                    
                                    <div class="field-wrap">
                                        <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Genus</label>
                                        <textarea name="genus" autocomplete="off"></textarea>
                                    </div>
                                    
                                    <div class="field-wrap">
                                        <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Species</label>
                                        <textarea name="species" autocomplete="off"></textarea>
                                    </div>
                                    
                                    <div class="field-wrap">
                                        <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Family</label>
                                        <textarea name="family" autocomplete="off"></textarea>
                                    </div>
                                    
                                </div>
                
               
                
                <br/>
                
                <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Upload picture:</label><br/>
			<input type="file" name="pic" id="pic" required />
                
                
                 <br/><br/>
                
                <div class="top-row">
                                    <div class="field-wrap">
                                        <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Common Name (English)</label>
                                        <textarea name="common" autocomplete="off"></textarea>
                                    </div>
                                    <div class="field-wrap">
                                        <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Local Name (Bangla)</label>
                                        <textarea name="local" autocomplete="off"></textarea>
                                    </div>
                    
                    <div class="field-wrap">
                                        <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Habit</label>
                                        <textarea name="habit" autocomplete="off"></textarea>
                                    </div>
                                    <div class="field-wrap">
                                        <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Mode of Origin</label>
                                        <textarea name="origin" autocomplete="off"></textarea>
                                    </div>
                                
                        
                                    <div class="field-wrap">
                                        <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Uses</label>
                                        <textarea name="uses" style="height: 80px;" autocomplete="off"></textarea>
                                    </div>
                    
                    <div class="field-wrap">
                                        <label style="font-size: 12px; color: rgb(119, 119, 119); float: left; margin-left: 40px;">Additional Information</label>
                                        <textarea name="addinfo" style="height: 80px;" autocomplete="off"></textarea>
                                    </div>
                                    
                                </div>
                
                
                <br/><br/>
                
                <button class="submit_button_style" name="subbutton" id="subbutton" type="submit">Submit</button>
        </form>
            
            
            
            
        </div>
        </div>
        
        <?php 
        unset($_SESSION["up_sign"]);
        unset($_SESSION["up_sign2"]);
        unset($_SESSION["sign_done"]);
        unset($_SESSION["sign_error"]);
        ?>
        
    </body>
</html>