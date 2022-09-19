<?php
session_start(); 

if(isset($_SESSION['error_login']))
{
    unset($_SESSION["error_disable"]);
} 
else
{
    $_SESSION["error_disable"] = "display: none";
}
    
?>
 

<html>
    <head>
        <title>About page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/index.css" media="all">
        
    </head>
    
    
    <body>
        
        <div id="sub_container">
        
        <div id="header">
        <a href="../index.php"><img style="margin-top: 20px;" src="../img/banner6.png"/></a>
        </div>
        
                <div class="top">
                    <a class="top_text" href="../index.php">Home</a>
                    <a class="top_text" href="https://drive.google.com/file/d/1XAl9qc-IIi_XyBSJrbPGrPVymKd15r1O/view?usp=sharing" target="_blank">Download</a>
                    <a class="top_text" href="login.php">Login</a>
                    <a class="stay_on" href="about.php">About</a>
                    <a class="top_text" href="../api/" target="_blank">API</a>
                </div>
        
        <div id="main_container">
            
            <div class="about">
                
                <a>Hello, I am Sharier Himu. Hon's 2nd year student of Botany at University of Barishal. This is my personal project that I am making a digital database listing the flora of University of Barishal campus. It is just the beginning. I want to digitalize the floral database of entire Barishal district. And I wish I will be successed oneday. Keep me in your prayers.</a>
                <br/><br/><br/>
                <a>Thank you.</a>
                <br/><br/>
                <a>Sharier Himu</a><br/>
                <a>B.Sc Botany, 2nd year</a><br/>
                <a>University of Barishal</a><br/>
                <a>Contact: himusharier@gmail.com</a>
                
            </div>
            
        </div>
        </div>
        
        <?php unset($_SESSION["error_login"]); ?>
        
    </body>
</html>