<?php
session_start () ;

unset($_SESSION["searchid"]);


if(isset($_GET['id'])){
    $getid = $_GET['id'];
    $_SESSION['upid'] = $getid;
unset($_SESSION["hidden"]);
}
else {
    $_SESSION['upid'] = "0";
    $_SESSION['hidden'] = "display: none";
}


 
$vgetid = $_SESSION['upid'];

$con = mysqli_connect("localhost","root","","xylem")or die("cannot connect database server.");
$sql="SELECT * FROM testdata WHERE pid=$vgetid";

$result=mysqli_query($con, $sql);
$count = mysqli_num_rows($result);



while($rows=mysqli_fetch_array($result)){
    
?>


<html>
    <head>
        <title>Home page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/index.css" media="all">
        
        <script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/jquery.watermark.js"></script>
<script type="text/javascript">
 
 
      $(document).ready(function() {

$("#faq_search_input").watermark("");

$("#faq_search_input").keyup(function()
{
var faq_search_input = $(this).val();
var dataString = 'keyword='+ faq_search_input;
if(faq_search_input.length>0)

{
$.ajax({
type: "GET",
url: "php/ajax-search.php",
data: dataString,
beforeSend:  function() {

$('input#faq_search_input').addClass('loading');

},
success: function(server_response)
{

$('#searchresultdata').html(server_response).show();
$('span#faq_category_title').html(faq_search_input);

if ($('input#faq_search_input').hasClass("loading")) {
 $("input#faq_search_input").removeClass("loading");
        } 

}
});
}return false;
});
});
	  
</script>
    </head>
    
    
    <body>
        
        <div id="sub_container">
        
        <div id="header">
        <a href="index.php"><img style="margin-top: 20px;" src="img/banner6.png"/></a>
        </div>
                <div class="top">
                    <a class="stay_on" href="index.php">Home</a>
                    <a class="top_text" href="#">Catagory</a>
                    <a class="top_text" href="pages/login.php">Login</a>
                    <a class="top_text" href="pages/about.php">About</a>
                    <a class="top_text" href="api/">API</a>
                </div>
        
        <div id="main_container">
            
            <div id="leftColumn">
                <form action="" method="post">
                    <label style="font-size: 13px; color: rgb(119, 119, 119); float: left; margin-left: 2px;"><b style="font-size: 16px;">Search Here:</b><br/>(e.g. scientific name, english name, local name, family, habit, uses etc)</label>
                    <input name="searchid" class="searchid" type="text" id="faq_search_input" autocomplete="off" autofocus />
                    <br/>
                </form>
                
                <div id="searchresultdata"> </div>
                
                
               
                
            </div> 
            
            
            <?php
        
        $con2 = mysqli_connect("localhost","root","","xylem")or die("cannot connect database server.");
$sql2="SELECT * FROM upimg WHERE pid=$vgetid";

$result2 = mysqli_query($con2, $sql2);
$count2 = mysqli_num_rows($result2);


while($rows2=mysqli_fetch_array($result2)){
    $_SESSION['pid'] = $rows2['pid'];
        
        
        ?>
            
            <div style="<?php echo $_SESSION['hidden']; ?>" id="rightColumn">
                <img width="250" src="upsave/<?php echo $rows2['img'] ?>"/>
            </div>
            
            <?php
}
            ?>
            
            
            <div style="<?php echo $_SESSION['hidden']; ?>" id="centerColumn">

                <a class="scname"><?php echo $rows['genus'] ?> <?php echo $rows['species'] ?></a><br/><br/>
                <a><b style="font-size:14px;">Family Name:</b> <?php echo $rows['family'] ?></a><br/><br/>
                <a><b style="font-size:14px;">Common Name:</b> <?php echo $rows['common'] ?></a><br/><br/>
                <a><b style="font-size:14px;">Local Name:</b> <?php echo $rows['local'] ?></a><br/><br/>
                <a><b style="font-size:14px;">Habit:</b> <?php echo $rows['habit'] ?></a><br/><br/>
                <a><b style="font-size:14px;">Mode of Origin:</b> <?php echo $rows['origin'] ?></a><br/><br/>
                <a><b style="font-size:14px;">Uses:</b> <?php echo $rows['uses'] ?></a><br/><br/>
                <a><b style="font-size:14px;">Additional Information:</b><br/><br/> <?php echo $rows['addinfo'] ?></a><br/>
             
            </div>
            
            
            
            
            
        
            
        </div>
        </div>
        
        <?php
}

?>
        
        
    </body>
</html>