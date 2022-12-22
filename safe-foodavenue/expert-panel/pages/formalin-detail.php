<?php 
  
  $sql = "
    SELECT * 
    FROM sfa_formalin 
    WHERE menu_id = ".$_GET["menu_id"]." 
    AND res_id = ".$_GET["res_id"]." 
  ";
  $query = mysqli_query($con, $sql);  
  $formalinData = mysqli_fetch_array($query);

  $sql = "
    SELECT * FROM sfa_user WHERE us_id = ".$formalinData["expe_id"]."
  ";
  $query = mysqli_query($con, $sql);  
  $userData = mysqli_fetch_array($query);
  
  // https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue
  $base_url = "..";
  $file_data = $base_url."/assets/img/uploads/".$formalinData["for_img_path"];

  $sql = "
    SELECT * 
    FROM sfa_menu 
    LEFT JOIN sfa_restaurant ON sfa_menu.res_id = sfa_restaurant.res_id
    WHERE menu_id = ".$_GET["menu_id"]." 
    AND sfa_menu.res_id = ".$_GET["res_id"]." 
  "; 

  $query = mysqli_query($con, $sql);  
  $menuData = mysqli_fetch_array($query);

  $sql = "
    SELECT * 
    FROM sfa_block 
    LEFT JOIN sfa_zone ON sfa_block.zone_id = sfa_zone.zone_id
    WHERE block_id = ".$menuData["block_id"]." 
  ";
  $queryBlock = mysqli_query($con, $sql);
  $blockData = mysqli_fetch_array($queryBlock);

?>

<div class="container">

    <div class="row justify-content-md-center py-5">
      <div class="col-md h2" style="text-align: center;">

        <div class="card shadow-xl">
          <div class="card-header bg-primary text-white text-center h1">
            ผลการวิเคราะห์สารฟอร์มาลิน <br>
            รอบการตรวจครั้งที่ 1/2022
          </div>
          <div class="card-body">

            <div class="row justify-content-md-center">
              <div class="col-md-4 h2" style="text-align: left;vertical-align: top;">
                <span class="text-primary">บล็อก</span> :  <?= $blockData["block_title"] ?> <br>
                <span class="text-primary">ร้านอาหาร</span> : <?= $menuData["res_title"] ?> <br>
                <span class="text-primary">เมนูที่ตรวจ</span> : <?= $menuData["menu_name"] ?>
              </div>
              <div class="col-md-4 h2" style="text-align: left;vertical-align: top;">
                <span class="text-primary">โซน</span> : <?= $blockData["zone_title"] ?> <br>
                <span class="text-primary">วันที่ตรวจ</span> : <?= date("F d, Y", strtotime($formalinData["for_test_date"]))?>
              </div>
            </div>
            
            <div class="row justify-content-md-center py-2">
              <div class="col-md" style="text-align: center;">
                <img src="<?= $file_data ?>">
              </div>
            </div>

            <div class="row justify-content-md-center">
              <div class="col-md h3" style="text-align: center;">
                <span class="text-primary">Formalin</span>: <?= $formalinData["for_value"] ?> ppm <br>
                <span class="text-primary">Centroid 1</span>: <?= $formalinData["x_center_1"].", ".$formalinData["y_center_1"] ?> <br>
                <span class="text-primary">Centroid 2</span>: <?= $formalinData["x_center_2"].", ".$formalinData["y_center_2"] ?> <br>
                <span class="text-primary">Radius 1</span>: <?= $formalinData["for_radius_1"] ?> <br>
                <span class="text-primary">Radius 2</span>: <?= $formalinData["for_radius_2"] ?> <br>
              </div>
            </div>

            <div class="row justify-content-md-center">
              <div class="col-md" style="text-align: center;">
                <?php 
                  if($formalinData["for_status"] == 1) {
                    echo "<div class='h1 py-4 text-danger'>รอตรวจสอบ</div>";
                  } else {
                    echo "<div class='h1 py-4 text-success'>พบฟอร์มาลินในปริมาณที่ปลอดภัย</div>";
                  }
                ?>
              </div>
            </div>

            <div class="row justify-content-md-center">
              <div class="col-md h2 py-4 " style="text-align: center;">
                <span class="text-primary">ผู้เชี่ยวชาญ</span> : <?= $userData["us_fname"]." ".$userData["us_lname"] ?>
              </div>
            </div>

            <div class="row justify-content-md-center mb-5">
              <div class="col-md" style="text-align: center;">
                <a href="index.php?content=list-menu&res_id=<?= $_GET["res_id"] ?>&fcl_id=<?= $_GET["fcl_id"] ?>">
                  <button type="button" class="btn btn-secondary px-4 mx-2">กลับ</button>
                </a>
              </div>
            </div>

          </div>
        </div>
        
      </div>
      
    </div>

    
  </div>