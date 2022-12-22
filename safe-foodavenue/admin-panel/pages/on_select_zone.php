<?php 
  
  require("../../php/config.php"); 

  // [txtZoneId] => 3
  $selected_block = "";
  if(isset($_POST["res_id"])){
    $sql = " SELECT * FROM sfa_restaurant NATURAL JOIN sfa_res_category NATURAL JOIN sfa_block NATURAL JOIN sfa_entrepreneur WHERE res_id=".$_POST["res_id"];
    $dbRestaurant = mysqli_query($con, $sql);
    if(mysqli_num_rows($dbRestaurant) > 0){
      $rowRes = mysqli_fetch_array($dbRestaurant);
      $selected_block = $rowRes["block_id"];
    }
  }

  $sql = " SELECT * FROM sfa_block WHERE zone_id = '".$_POST["txtZoneId"]."' ";
  $dbBlock = mysqli_query($con, $sql);

  $result = "<option value='' selected disabled>เลือกบล็อก</option>";
  while ($row = mysqli_fetch_array($dbBlock)) {
    
    $selected = "";
    if($selected_block !== ""){
      $selected = $row["block_id"] == $selected_block ? "selected" : "";
    }

    $result .= "
      <option value='".$row["block_id"]."' ".$selected.">
        ".$row["block_title"]."
      </option> 
    ";
  }

  echo $result;

?>