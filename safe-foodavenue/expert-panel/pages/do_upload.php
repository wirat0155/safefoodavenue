<?php
  include_once 'verify.php';

  function doResizeImage($target_file) {
    $images = $target_file;
    $new_images = $target_file;
    $width = 258; //*** Fix Width ***//
    $size = GetimageSize($images);
    $height = round($width * $size[1] / $size[0]);
    $images_orig = ImageCreateFromJPEG($images);
    $photoX = ImagesX($images_orig);
    $photoY = ImagesY($images_orig);
    $images_fin = ImageCreateTrueColor($width, $height);
    ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
    ImageJPEG($images_fin, $new_images);
    ImageDestroy($images_orig);
    ImageDestroy($images_fin);
  }

  if(file_exists($_FILES['file_input']['tmp_name'])) {
    $t = time();
    $current_folder = __DIR__;
    // $target_dir = $current_folder . "/uploads/img/";
    $target_dir = "/var/www/html/assets/img/uploads/";
    $target_file = $target_dir . $t . $_FILES["file_input"]["name"];
    $file_name = $t . $_FILES["file_input"]["name"];
    if (move_uploaded_file($_FILES["file_input"]["tmp_name"], $target_file)) {
      // Resizing Image
      // doResizeImage($target_file);

      // API Endpoint
      $endpoint = 'https://prepro.informatics.buu.ac.th/formalinapp_api/upload'; // Flask API
      // $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
      // $base_url = "https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue";
      $base_url = "http://localhost";

      $file_data = $base_url . "/assets/img/uploads/" . $file_name;
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => $endpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        // CURLOPT_POSTFIELDS => array('fileUpload'=> new CURLFILE($file_data)),
      ));

      // $response = curl_exec($curl);
      // curl_close($curl);
      // $result = json_decode($response, true);
    } else {
      echo "failed";
    }
  }

  $sql = "SELECT * FROM `sfa_menu`
    LEFT JOIN `sfa_restaurant` ON `sfa_menu`.`menu_res_id` = `sfa_restaurant`.`res_id`
    LEFT JOIN `sfa_zone` ON `sfa_restaurant`.`res_zone_id` = `sfa_zone`.`zone_id`
    LEFT JOIN `sfa_block` ON `sfa_restaurant`.`res_block_id` = `sfa_block`.`block_id`
    WHERE `menu_id` = " . $_POST["menu_id"]; 
  $arr_menu = mysqli_query($con, $sql);  
  $obj_menu = mysqli_fetch_array($arr_menu);
  $result = verify($_FILES["file_input"]["name"]);

  $result_of_formalin = $result["formalin(mg/kg)"];
  $formalin_status = $result_of_formalin >= 0.5 ? 1 : 2; // 1 คือ ไม่ปลอดภัย , 2 คือ ปลอดภัย

  // get formalin checklist name
  $for_fcl_id = $_POST["for_fcl_id"];
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
?>

<form action="index.php?content=save_formalin" method="post">
  <input type="hidden" name="menu_res_id" value="<?= $_POST["menu_res_id"] ?>">
  <input type="hidden" name="menu_id" value="<?= $_POST["menu_id"] ?>">
  <input type="hidden" name="for_fcl_id" value="<?= $_POST["for_fcl_id"] ?>">
  <input type="hidden" name="for_img_path" value="<?= $file_name ?>">
  <input type="hidden" name="for_test_date" value="<?= date("Y-m-d") ?>">
  <input type="hidden" name="Centroid1" value="<?= implode(",", $result["Centroid1"]) ?>"> 
  <input type="hidden" name="Centroid2" value="<?= implode(",", $result["Centroid2"]) ?>">
  <input type="hidden" name="for_radius_1" value="<?= $result["Radius1"] ?>">
  <input type="hidden" name="for_radius_2" value="<?= $result["Radius2"] ?>">
  <input type="hidden" name="for_value" id="for_value" value="<?= $result["formalin(mg/kg)"] ?>">
  <!-- <input type="hidden" name="for_status" value="<?= $formalin_status ?>"> -->

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
                <span class="text-primary">บล็อก</span> :  <?=  $obj_menu["block_title"] != ""? $obj_menu["block_title"] : "-"  ?> <br>
                <span class="text-primary">ร้านอาหาร</span> : <?= $obj_menu["res_title"] ?> <br>
                <span class="text-primary">วัตถุดิบ</span> : <?= $obj_menu["menu_name"] ?>
              </div>
              <div class="col-md-4 h2" style="text-align: left;vertical-align: top;">
                <span class="text-primary">โซน</span> : <?= $obj_menu["zone_title"] != ""? $obj_menu["zone_title"] : "-" ?> <br>
                <span class="text-primary">วันที่ตรวจ</span> : <?= to_format(date("Y-m-d")) ?>
              </div>
            </div>
            
            <div class="row justify-content-md-center py-2">
              <div class="col-md" style="text-align: center;">
                <img src="<?= $file_data ?>">
              </div>
            </div>

            <!-- <div class="row justify-content-md-center">
              <div class="col-md h3" style="text-align: center;">
                <span class="text-primary">Formalin</span>: <?= $result["formalin(mg/kg)"] ?> ppm <br>
                ค่าที่ออกมาเป็น "Centroid1": [ [ 0, 0 ] ] ทำให้ต้องเพิ่ม index
                <span class="text-primary">Centroid 1</span>: <?= implode(",", $result["Centroid1"]) ?> <br>
                <span class="text-primary">Centroid 2</span>: <?= implode(",", $result["Centroid2"]) ?> <br>
                <span class="text-primary">Radius 1</span>: <?= $result["Radius1"] ?> <br>
                <span class="text-primary">Radius 2</span>: <?= $result["Radius2"] ?> <br>
              </div>
            </div> -->

            <!-- <div class="row justify-content-md-center">
              <div class="col-md" style="text-align: center;">
                <?php 
                  if($formalin_status == 1) {
                    echo "<div class='h1 py-4 text-danger'>พบฟอร์มาลีนในระดับที่อันตราย</div>";
                  } else {
                    echo "<div class='h1 py-4 text-success'>พบฟอร์มาลินในปริมาณที่ปลอดภัย</div>";
                  }
                ?>
              </div>
            </div> -->

            <div class="p-3">
              <img src="<?= "../assets/img/uploads/" . $file_name ?>" alt="Formalin image" style="max-width: 250px;">
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="for_status" id="safe" value="2" checked onchange="change_formalin_status(2)">
              <label class="form-check-label" for="safe">
                ปลอดภัย
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="for_status" id="danger" value="1" onchange="change_formalin_status(2)">
              <label class="form-check-label" for="danger">
                พบฟอร์มาลีน
              </label>
            </div>

            <div class="row justify-content-md-center">
              <div class="col-md h2 py-4 " style="text-align: center;">
                <span class="text-primary">ผู้เชี่ยวชาญ</span> : <?= $_SESSION["us_fullname"] ?>
              </div>
            </div>

            <div class="row justify-content-md-center mb-5">
              <div class="col-md" style="text-align: center;">
                <button type="submit" class="btn btn-success px-4 mx-2">บันทึก</button>
                <a href="index.php?content=upload&menu_id=<?= $_POST["menu_id"] ?>">
                  <button type="button" class="btn btn-secondary px-4 mx-2">ยกเลิก</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  function change_formalin_status(for_status) {
    // ไม่ปลอดภัย
    if (for_status == 1)  {
      $("#for_value").val(0.9);
    }
    // ปลอดภัย
    else {
      $("#for_value").val(0.1);
    }
  }
</script>