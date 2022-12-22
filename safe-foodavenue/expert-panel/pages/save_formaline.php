<?php 

session_start();

// Array
// (
//     [id_user] => 2
//     [username] => จุฑามาศ ทับทอง
//     [password] => expert_1234
//     [role] => 2
// )

// Array
// (
//     [txtResId] => 1
//     [txtMenuId] => 1
//     [txtImageName] => 1659451317formalin400.png
//     [txtDate] => 2022-08-02
//     [txtCentroid1] => 84,58
//     [txtCentroid2] => 178,64
//     [txtRadius1] => 21
//     [txtRadius2] => 22
//     [txtFormalin] => 0.16
//     [txtFormalinStatus] => 2
// )

$sql = "
  SELECT * 
  FROM sfa_formalin_checklist 
  WHERE ('".$_POST["txtDate"]."' BETWEEN fcl_startdate AND fcl_enddate)
";
$result = mysqli_query($con, $sql);
$checklist = mysqli_fetch_array($result);

$txtFormalinChecklist = mysqli_num_rows($result) > 0 ? $checklist["fcl_id"] : "0";
$txtCentroid1 = explode(",", $_POST["txtCentroid1"]);
$txtCentroid2 = explode(",", $_POST["txtCentroid2"]);

$sql = "
  INSERT INTO sfa_formalin (
    res_id, menu_id, expe_id, for_img_path, 
    fcl_id, for_test_date, for_status, for_value, 
    x_center_1, y_center_1, for_radius_1, 
    x_center_2, y_center_2, for_radius_2
  ) VALUES (
    '".$_POST["txtResId"]."', '".$_POST["txtMenuId"]."', '".$_SESSION["id_user"]."', '".$_POST["txtImageName"]."',
    '".$txtFormalinChecklist."', '".$_POST["txtDate"]."', '".$_POST["txtFormalinStatus"]."', '".$_POST["txtFormalin"]."', 
    '".$txtCentroid1[0]."', '".$txtCentroid1[1]."', '".$_POST["txtRadius1"]."', 
    '".$txtCentroid2[0]."', '".$txtCentroid2[1]."', '".$_POST["txtRadius2"]."'
  )
";

if(mysqli_query($con, $sql)) {
  echo "
    <script>
      alert('บันทึกข้อมูลเรียบร้อย');
      window.location = 'index.php?content=list-menu&res_id=".$_POST["txtResId"]."';
    </script>
  ";
} else {
  echo "Insert Error with<br>";
  echo "<pre>";
  print_r($sql);
  echo "</pre>";
}

?>