<?php


include_once ('database_connection.php');

if(isset($_GET['keyword'])){
    $keyword = 	trim($_GET['keyword']) ;
$keyword = mysqli_real_escape_string($dbc, $keyword);



$query = "select * from testdata where genus like '%$keyword%' or species like '%$keyword%' or family like '%$keyword%' or common like '%$keyword%' or local like '%$keyword%' or habit like '%$keyword%' or origin like '%$keyword%' or uses like '%$keyword%' or addinfo like '%$keyword%' ORDER BY id DESC";

//echo $query;
$result = mysqli_query($dbc,$query);
if($result){
    if(mysqli_affected_rows($dbc)!=0){
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
     echo '<div class="responstable"><table><tr><td><a href="index.php?id='.$row['pid'].'">'.$row['genus'].' '.$row['species'].'</a></td></tr></tbody></table></div>';
    }
        
    }else {
        echo '<div>No Results for : "'.$_GET['keyword'].'" <br/><br/><a href="#">+ Request to add</a></div>';
    }
  
}
}else {
    echo 'Parameter Missing';
}




?>