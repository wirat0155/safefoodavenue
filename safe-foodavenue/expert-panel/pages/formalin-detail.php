<?php 
  // get formalin data
  $for_id = $_GET["for_id"];
  $sql = "SELECT * FROM `sfa_formalin` 
  LEFT JOIN `sfa_menu` ON `sfa_formalin`.`for_menu_id` = `sfa_menu`.`menu_id`
  LEFT JOIN `sfa_restaurant` ON `sfa_formalin`.`for_res_id` = `sfa_restaurant`.`res_id`
  LEFT JOIN `sfa_zone` ON `sfa_restaurant`.`res_zone_id` = `sfa_zone`.`zone_id`
  LEFT JOIN `sfa_block` ON `sfa_restaurant`.`res_block_id` = `sfa_block`.`block_id`
  LEFT JOIN `sfa_user` ON `sfa_formalin`.`for_expe_id` = `sfa_user`.`us_id`
  WHERE `sfa_formalin`.`for_id` = " . $for_id;
  $arr_formalin = mysqli_query($con, $sql);
  $obj_formalin = mysqli_fetch_assoc($arr_formalin);


  // get formalin checklist name
  $for_fcl_id = $obj_formalin["for_fcl_id"];
  $sql = "SELECT `fcl_year` FROM `sfa_formalin_checklist` WHERE `fcl_id` = " . $for_fcl_id;
  $arr_formalin_checklist = mysqli_query($con, $sql);
  $obj_formalin_checklist = mysqli_fetch_assoc($arr_formalin_checklist);
  $fcl_year = $obj_formalin_checklist["fcl_year"];
  $sql = "SELECT `fcl_id` FROM `sfa_formalin_checklist` WHERE `fcl_year` = " . $fcl_year;
  $arr_formalin_checklist = mysqli_query($con, $sql);
  $i = 1;
  while ($obj_formalin_checklist = mysqli_fetch_assoc($arr_formalin_checklist)) {
    if ($obj_formalin_checklist["fcl_id"] == $for_fcl_id) {
      break;
    }
    $i++;
  }
  $file_data = "../assets/img/uploads/" . $obj_formalin["for_img_path"];
?>

<div class="container">
    <div class="row justify-content-md-center py-5">
      <div class="col-md h2" style="text-align: center;">

        <div class="card shadow-xl">
          <div class="card-header bg-primary text-white text-center h1">
            ผลการวิเคราะห์สารฟอร์มาลิน <br>
            รอบการตรวจครั้งที่ <?php echo $i ?>/<?php echo $fcl_year ?>
          </div>
          <div class="card-body">

            <div class="row justify-content-md-center">
              <div class="col-md-4 h2" style="text-align: left;vertical-align: top;">
                <span class="text-primary">บล็อก</span> :  <?= $obj_formalin["block_title"] != "" ? $obj_formalin["block_title"] : "-" ?> <br>
                <span class="text-primary">ร้านอาหาร</span> : <?= $obj_formalin["res_title"] ?> <br>
                <span class="text-primary">เมนูที่ตรวจ</span> : <?= $obj_formalin["menu_name"] ?>
              </div>
              <div class="col-md-4 h2" style="text-align: left;vertical-align: top;">
                <span class="text-primary">โซน</span> : <?= $obj_formalin["zone_title"] != "" ? $obj_formalin["zone_title"] : "-" ?> <br>
                <!-- <span class="text-primary">วันที่ตรวจ</span> : <?= date("F d, Y", strtotime($obj_formalin["for_test_date"]))?> -->
                <span class="text-primary">วันที่ตรวจ</span> : <?= to_format($obj_formalin["for_test_date"]) ?>
              </div>
            </div>
            
            <div class="row justify-content-md-center py-2">
              <div class="col-md" style="text-align: center;">
                <img src="<?= $file_data ?>">
              </div>
            </div>

            <div class="row justify-content-md-center">
              <div class="col-md h3" style="text-align: center;">
                <span class="text-primary">Formalin</span>: <?= $obj_formalin["for_value"] ?> ppm <br>
                <span class="text-primary">Centroid 1</span>: <?= $obj_formalin["for_x_center_1"].", " . $obj_formalin["for_y_center_1"] ?> <br>
                <span class="text-primary">Centroid 2</span>: <?= $obj_formalin["for_x_center_2"].", " . $obj_formalin["for_y_center_2"] ?> <br>
                <span class="text-primary">Radius 1</span>: <?= $obj_formalin["for_radius_1"] ?> <br>
                <span class="text-primary">Radius 2</span>: <?= $obj_formalin["for_radius_2"] ?> <br>
              </div>
            </div>

            <div class="row justify-content-md-center">
              <div class="col-md" style="text-align: center;">
                <?php 
                  if($obj_formalin["for_status"] == 1) {
                    echo "<div class='h1 py-4 text-danger'>พบฟอร์มาลีนในระดับที่อันตราย</div>";
                  } else {
                    echo "<div class='h1 py-4 text-success'>พบฟอร์มาลินในปริมาณที่ปลอดภัย</div>";
                  }
                ?>
              </div>
            </div>

            <div class="row justify-content-md-center">
              <div class="col-md h2 py-4 " style="text-align: center;">
                <span class="text-primary">ผู้เชี่ยวชาญ</span> : <?= $obj_formalin["us_fname"] . " " . $obj_formalin["us_lname"] ?>
              </div>
            </div>

            <div class="row justify-content-md-center mb-5">
              <div class="col-md" style="text-align: center;">
                <a href="index.php?content=list-menu&res_id=<?= $obj_formalin["res_id"] ?>">
                  <button type="button" class="btn btn-secondary px-4 mx-2">กลับ</button>
                </a>
              </div>
            </div>

          </div>
        </div>
        
      </div>
      
    </div>

    
  </div>