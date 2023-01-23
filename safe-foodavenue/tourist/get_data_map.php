<?php 
    header('Content-Type: application/json');
    require ("../php/config.php");
   
    $response['data_res'] = array();

if(isset($_POST["res_location_type"])){

    $loc_id = $_POST["id"]; 

    if($_POST["res_location_type"] == "block_id"){

        try{
            $sql_block = "SELECT * FROM sfa_restaurant LEFT JOIN sfa_res_formalin_status
            ON sfa_restaurant.res_id = sfa_res_formalin_status.res_for_res_id WHERE res_block_id = ".$loc_id ." ";
            $query_block_check = mysqli_query($con, $sql_block);

            // echo json_encode($sql_block);
            //  exit();
            if($query_block_check){
        
               while ($row_res = $query_block_check->fetch_assoc()) {
   
                array_push($response["data_res"], $row_res);
            
              }
                echo json_encode($response);
              
            }else{
                throw new Exception('SQL ERROR');
            }

        }catch(Exception $event){

            echo json_encode($event->getMessage());

        }
    }else if($_POST["res_location_type"] == "res_id"){

        try{
            $sql_res = "SELECT * FROM sfa_restaurant LEFT JOIN sfa_res_formalin_status
            ON sfa_restaurant.res_id = sfa_res_formalin_status.res_for_res_id WHERE res_id = ".$loc_id ." ";
            $query_res = mysqli_query($con, $sql_res);
            
            if($query_res){
             
    
               while ($row_res = $query_res->fetch_assoc()) {
   
                array_push($response["data_res"], $row_res);
            
              }
                echo json_encode($response);
              
            }else{
                throw new Exception('SQL ERROR');
            }

        }catch(Exception $event){

            echo json_encode($event->getMessage());
            
        }
    }

}