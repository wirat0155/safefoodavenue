<?php
require("../../php/config.php"); 
$selected_gov = "";
    if(isset($_POST["us_id"])){
    $sql = " SELECT * FROM sfa_user LEFT JOIN th_provinces 
    ON sfa_user.us_province_id = th_provinces.id 
    LEFT JOIN sfa_government ON sfa_government.gov_id = sfa_user.us_gov_id
    WHERE us_id=".$_POST["us_id"];
    $dbuser = mysqli_query($con, $sql);
    if(mysqli_num_rows($dbuser) > 0){
      $rowgov = mysqli_fetch_array($dbuser);
      $selected_gov = $rowgov["gov_id"];
    }
  }
  $sql = " SELECT * FROM sfa_government WHERE gov_province_id = '".$_POST["txtProvinceId"]."' ";
  $db= mysqli_query($con, $sql);

  $result = "<option value='' selected disabled>เลือกองค์กรปกครองส่วนท้องถิ่น</option>";
  while ($row = mysqli_fetch_array($db)) {
    $selected = "";
    if($selected_gov !== ""){
      $selected = $row["gov_id"] == $selected_gov ? "selected" : "";
    }

    $result .= "
      <option value='".$row["gov_id"]."' ".$selected.">
        ".$row["gov_name"]."
      </option> 
    ";
  }

  echo $result;
?>
 