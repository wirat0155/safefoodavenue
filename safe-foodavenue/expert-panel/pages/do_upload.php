<?php
  
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

  $t = time();
  $file_name = $t.trim(str_replace(" ", "-", $_FILES["fileUpload"]["name"]));
  $target_dir = "/home/web/manpower/public_html/safe-foodavenue/assets/img/uploads/";
  $target_file = $target_dir.$file_name;

  // echo $target_file;
  // echo $target_dir;
  
  if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {

    // Resizing Image
    doResizeImage($target_file);

    // API Endpoint
    $endpoint = 'https://prepro.informatics.buu.ac.th/formalinapp_api/upload'; // Flask API
    // $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
    $base_url = "https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue";
    // $target_dir = "/assets/img/uploads/";

    $file_data = $base_url."/assets/img/uploads/".$file_name;

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
      CURLOPT_POSTFIELDS => array('fileUpload'=> new CURLFILE($file_data)),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response, true);
    // print_r($response);
    // exit;
  } else {
    echo "failed";
  }
?>

<!-- Menu Data -->
<?php 

  $sql = "
    SELECT * 
    FROM sfa_menu 
    LEFT JOIN sfa_restaurant ON sfa_menu.res_id = sfa_restaurant.res_id
    WHERE menu_id = ".$_POST["txtMenuId"]." 
    AND sfa_menu.res_id = ".$_POST["txtResId"]." 
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
  
  $result_of_formalin = $result["formalin(mg/kg)"];
  $formalin_status = $result_of_formalin >= 0.5 ? 1 : 2; // 1 คือ ไม่ปลอดภัย , 2 คือ ปลอดภัย
?>

<form action="index.php?content=save_formaline" method="post">
        
  <input type="hidden" name="txtResId" value="<?= $_POST["txtResId"] ?>">
  <input type="hidden" name="txtMenuId" value="<?= $_POST["txtMenuId"] ?>">
  <input type="hidden" name="txtImageName" value="<?= $file_name ?>">
  <input type="hidden" name="txtDate" value="<?= date("Y-m-d") ?>">
  <!-- ค่าที่ออกมาเป็น "Centroid1": [ [ 0, 0 ] ] ทำให้ต้องเพิ่ม index -->
  <input type="hidden" name="txtCentroid1" value="<?= implode(",", $result["Centroid1"][0]) ?>"> 
  <input type="hidden" name="txtCentroid2" value="<?= implode(",", $result["Centroid2"]) ?>">
  <input type="hidden" name="txtRadius1" value="<?= $result["Radius1"] ?>">
  <input type="hidden" name="txtRadius2" value="<?= $result["Radius2"] ?>">
  <input type="hidden" name="txtFormalin" value="<?= $result["formalin(mg/kg)"] ?>">
  <input type="hidden" name="txtFormalinStatus" value="<?= $formalin_status ?>">

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
                <span class="text-primary">วันที่ตรวจ</span> : <?= date("F d, Y") ?>
              </div>
            </div>
            
            <div class="row justify-content-md-center py-2">
              <div class="col-md" style="text-align: center;">
                <img src="<?= $file_data ?>">
              </div>
            </div>

            <div class="row justify-content-md-center">
              <div class="col-md h3" style="text-align: center;">
                <span class="text-primary">Formalin</span>: <?= $result["formalin(mg/kg)"] ?> ppm <br>
                <!-- ค่าที่ออกมาเป็น "Centroid1": [ [ 0, 0 ] ] ทำให้ต้องเพิ่ม index -->
                <span class="text-primary">Centroid 1</span>: <?= implode(",", $result["Centroid1"][0]) ?> <br>
                <span class="text-primary">Centroid 2</span>: <?= implode(", ", $result["Centroid2"]) ?> <br>
                <span class="text-primary">Radius 1</span>: <?= $result["Radius1"] ?> <br>
                <span class="text-primary">Radius 2</span>: <?= $result["Radius2"] ?> <br>
              </div>
            </div>

            <div class="row justify-content-md-center">
              <div class="col-md" style="text-align: center;">
                <?php 
                  if($result_of_formalin == 1) {
                    echo "<div class='h1 py-4 text-danger'>รอการตรวจสอบ</div>";
                  } else {
                    echo "<div class='h1 py-4 text-success'>พบฟอร์มาลินในปริมาณที่ปลอดภัย</div>";
                  }
                ?>
              </div>
            </div>

            <div class="row justify-content-md-center">
              <div class="col-md h2 py-4 " style="text-align: center;">
                <span class="text-primary">ผู้เชี่ยวชาญ</span> : <?= $_SESSION["username"] ?>
              </div>
            </div>

            <div class="row justify-content-md-center mb-5">
              <div class="col-md" style="text-align: center;">
                <button type="submit" class="btn btn-success px-4 mx-2">บันทึก</button>
                <a href="index.php?content=upload&menu_id=<?= $_POST["txtMenuId"] ?>&res_id=<?= $_POST["txtResId"] ?>">
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