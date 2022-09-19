<?php

header('Content-type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, X-Requested-With');

if(isset($_GET["search"])){
    $key = $_GET["search"];
}else{
    $key = null;
}

$con = mysqli_connect("localhost","root","","taxbot_main_database");

if(isset($key)){
    $sql="SELECT * FROM testdata t1 INNER JOIN upimg t2 ON t1.pid = t2.pid WHERE genus LIKE '%{$key}%' OR species LIKE '%{$key}%' OR family LIKE '%{$key}%' OR common LIKE '%{$key}%' OR local LIKE '%{$key}%' OR habit LIKE '%{$key}%' OR origin LIKE '%{$key}%' OR uses LIKE '%{$key}%' OR addinfo LIKE '%{$key}%'";
    $res=mysqli_query($con,$sql);
    $count=mysqli_num_rows($res);
    
    if($count){
        while($row=mysqli_fetch_assoc($res)){
            $sc_genus = trim($row['genus']);
            $sc_species = trim($row['species']);
    
          $data[] = [
            "scientific_name" => "$sc_genus $sc_species",
            "genus" => "$row[genus]",
            "species" => "$row[species]",
            "family" => "$row[family]",
            "common_name" => "$row[common]",
            "local_name" => "$row[local]",
            "habitat" => "$row[habit]",
            "origin" => "$row[origin]",
            "uses" => "$row[uses]",
            "others" => "$row[addinfo]",
            "picture" => "https://taxbot.himusharier.xyz/upsave/$row[img]"
          ];
    
    
        }
        echo json_encode(['status'=>'true','plants'=>$data, 'result'=>'found']);
    }else{
        echo json_encode(['status'=>'true','msg'=>'No data found', 'result'=>'not found']);
    }
    
}else{
    $sql="SELECT * FROM testdata t1 INNER JOIN upimg t2 ON t1.pid = t2.pid";
    $res=mysqli_query($con,$sql);
    $count=mysqli_num_rows($res);
    
    if($count){
        while($row=mysqli_fetch_assoc($res)){
            $sc_genus = trim($row['genus']);
            $sc_species = trim($row['species']);
    
          $data[] = [
            "scientific_name" => "$sc_genus $sc_species",
            "genus" => "$row[genus]",
            "species" => "$row[species]",
            "family" => "$row[family]",
            "common_name" => "$row[common]",
            "local_name" => "$row[local]",
            "habitat" => "$row[habit]",
            "origin" => "$row[origin]",
            "uses" => "$row[uses]",
            "others" => "$row[addinfo]",
            "picture" => "https://taxbot.himusharier.xyz/upsave/$row[img]"
          ];
    
    
        }
        echo json_encode(['status'=>'true','plants'=>$data, 'result'=>'found']);
    }else{
        echo json_encode(['status'=>'true','msg'=>'No data found', 'result'=>'not found']);
    }
}

?>