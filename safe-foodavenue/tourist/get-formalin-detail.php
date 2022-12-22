<?php 
    header('Content-Type: application/json');
    require ("../php/config.php");
    $sql = "SELECT * FROM sfa_block WHERE block_lat <> ''"; 
    $query = mysqli_query($con, $sql); 
    $arr =  array(); 
    //array_push($a,"blue","yellow");
    while($row = mysqli_fetch_array($query)){
        $temp = array();
        $bid  = $row["block_id"]; 
        $bsql = "SELECT * FROM sfa_restaurant NATURAL JOIN sfa_formalin WHERE block_id = $bid";  
        $bquery = mysqli_query($con, $bsql); 
        $flag = true;
        while($brow = mysqli_fetch_array($bquery)){
            if($brow["for_val"]*1000 > 100){ 
                $flag = false; 
                break;
            }
        }
        if($flag){
            array_push($temp, $row["block_id"], $row["block_title"], $row["block_lat"], $row["block_lon"], 1);
        }
        else{ 
            array_push($temp, $row["block_id"], $row["block_title"], $row["block_lat"], $row["block_lon"], 2);
        }
        array_push($arr, $temp);
       
    } 
    echo json_encode($arr);
?>