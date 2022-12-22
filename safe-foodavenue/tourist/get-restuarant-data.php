<?php 
    header('Content-Type: application/json');
    require ("../php/config.php");
    $sql = "SELECT * FROM sfa_restaurant WHERE block_id = ".$_POST["block_id"]." ";
    $query = mysqli_query($con, $sql); 

    $restuarantList = array();
    while($row = mysqli_fetch_array($query)){
      $temp = array();
      $res_title = $row["res_title"];

      $sql = "SELECT * FROM sfa_formalin WHERE res_id = ".$row["res_id"]." ";
      $resultFormalin = mysqli_query($con, $sql); 

      $flag = 0;
      if(mysqli_num_rows($resultFormalin) > 0){
        while($fRow = mysqli_fetch_array($resultFormalin)){
          $flag = 2;
          if($fRow["for_status"] == 1) { $flag = 1; break;}
          
          // if($fRow["res_id"]=="866"){
          //   array_push($restuarantList, $temp);
          // }
        }
      }

      
      if($flag == 2){ $res_result = "<div style='color:#5CBB99'>ปลอดภัย</div>  "; } 
      else{$res_result = "<div style='color:#666666'>รอตรวจสอบ</div> ";}
      // if($flag == 2){ $res_result = "<div style='color:#EA4335'>ไม่ปลอดภัย</div>"; } 


      array_push($temp, $res_title, $res_result);
      
  
      array_push($restuarantList, $temp);
    }

    echo json_encode($restuarantList);
?>
