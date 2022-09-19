<html>
    <head>
        <title>Welcome!</title>
        <link rel="stylesheet" type="text/css" href="css/print.css" media="all">
        
    </head>
    
    
    <body>
        
        <div id="sub_container">
        
        <div id="header">
        <a><img style="margin-top: 15px; margin-bottom: 5px;" src="../img/bannerX1.png"/></a>
        </div>
            
        
         
            
        
        
        <div id="main_container">
            
            
            
<?php
                                        
 $con = mysqli_connect("localhost","root","","taxbot_main_database")or die("cannot connect database server.");
     
$results_per_page = 14; // number of results per page
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $results_per_page;


$sql="SELECT * FROM testdata t1 INNER JOIN upimg t2 ON t1.pid = t2.pid ORDER BY t1.id ASC LIMIT $start_from, ".$results_per_page;
                                        
                                        
                                        
$result=mysqli_query($con, $sql);



while($rows=mysqli_fetch_array($result)){
                                        
?>
           
            
            
                                <div class="top-row">
                                    
                                    <div class="field-wrap">
    
                                        
                                            <div class="imgbox">
                                            <a><?php echo $rows['pid'] ?></a><br/>
                                            <img src="../upsave/<?php echo $rows['img'] ?>" style="width: 100px; padding: 3px;" />
                                            </div>
                                        
                                         
                                        <div class="desbox">
                                            <a><b>Sc. Name:</b> <i><?php echo $rows['genus'] ?> <?php echo $rows['species'] ?></i></a><br/>

                                            <a><b>Family Name:</b> <?php echo $rows['family'] ?></a><br/>

                                            <a><b>Common Name:</b> <?php echo $rows['common'] ?></a><br/>

                                            <a><b>Local Name:</b> <?php echo $rows['local'] ?></a><br/>

                                            <a><b>Habit:</b> <?php echo $rows['habit'] ?></a><br/>

                                            <a><b>Mode of Origin:</b> <?php echo $rows['origin'] ?></a><br/>

                                            <a><b>Uses:</b> <?php echo $rows['uses'] ?></a><br/>

                                            <a><b>Additional Information:</b> <?php echo $rows['addinfo'] ?></a><br/>
                                            
                                        </div>   

                        
                                    </div>
                                    
                                    
                                     
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
            
<?php
}
?>
                
            
            
             <div class="bottom">
                    
            <a>
                <?php 
$sql = "SELECT COUNT(pid) AS total FROM testdata";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
  
for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
            echo "<a href='print.php?page=".$i."'";
            if ($i==$page)  echo " class='curPage'";
            echo ">".$i."</a> "; 
}; 
?>
            </a>
                  
                </div>
            
            
               
                
            </div>
            
            
            
        </div>
        
        
       
        
        
        
        
        
    </body>
</html>