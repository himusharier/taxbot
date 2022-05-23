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
        <title>Login page</title>
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
                    <a class="top_text" href="#">Catagory</a>
                    <a class="stay_on" href="login.php">Login</a>
                    <a class="top_text" href="about.php">About</a>
                    <a class="top_text" href="../api/">API</a>
                </div>
        
        <div id="main_container">
            
            <div style="margin-top: 120px;">
                <a style="<?php echo $_SESSION['error_disable']; ?>" class="error_message"><?php echo $_SESSION['error_login']; ?></a><br/><br/>
            <form action="php/login.php" method="post">
                <input type="text" name="passcode" placeholder="Enter the passcode!" autocomplete="off" autofocus />
                <button class="submit_button_style" type="submit">Submit</button>
            </form>
            </div>
            
        </div>
        </div>
        
        <?php unset($_SESSION["error_login"]); ?>
        
    </body>
</html>