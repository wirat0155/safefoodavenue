<?php
$sql = "SELECT `menu_res_id` FROM `sfa_menu`
WHERE `sfa_menu`.`menu_id` = " . $_GET["menu_id"];
$arr_menu = mysqli_query($con, $sql);  
$obj_menu = mysqli_fetch_array($arr_menu);
$menu_res_id = $obj_menu["menu_res_id"];

function get_fcl_id($con) {
  $now_date = date('Y-m-d');
  $sql = "SELECT `fcl_id` FROM `sfa_formalin_checklist` 
  WHERE `fcl_status` = 1 AND
  `fcl_startdate` <= '" . $now_date . "'
  AND `fcl_enddate` >= '" . $now_date . "'";
  $arr_formalin_checklist = mysqli_query($con, $sql);  
  $obj_formalin_checklist = mysqli_fetch_array($arr_formalin_checklist);
  return $obj_formalin_checklist["fcl_id"];
}
$fcl_id = get_fcl_id($con);
?>

<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">อัพโหลดผลการตรวจสารฟอร์มาลิน</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
              <li class="breadcrumb-item active" aria-current="page">อัพโหลดผลการตรวจสารฟอร์มาลิน</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Content --> 
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card border-0">
        <div class="table-responsive py-4 px-4">
          <div class="row">
            <div class="col-md text-center">
              <h2>กรุณาอัพโหลดรูปภาพผลการตรวจ</h2>
              <h2>สารฟอร์มาลินอย่างชัดเจน</h2>
            </div>
          </div>
          <div class="row justify-content-md-center py-2">
            <div class="col-md-3 text-center">
              <img src="../assets/img/theme/scan_image.png" alt="" style="width:100%;">
            </div>
          </div>

          <div class="row justify-content-md-center py-4">
            <div class="col-md-2 text-center">
              <?php if ($fcl_id != ""): ?>
                <form action="index.php?content=do_upload" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="menu_id" value="<?php echo $_GET["menu_id"] ?>">
                  <input type="hidden" name="menu_res_id" value="<?php echo $menu_res_id ?>">
                  <input type="hidden" name="for_fcl_id" value="<?php echo $fcl_id ?>">
                  <input type="file" id="file_input" name="file_input">
                  <button onclick="return checkUpload()" type="submit" class="w-100 btn btn-lg btn-primary my-4">อัพโหลดรูปภาพ</button>
                </form>
              <?php else : ?>
                <h3 class="text-danger">ไม่สามารถตรวจฟอร์มาลีนได้ เนื่องจากไม่อยู่ในรอบการตรวจ</h3>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include("footer.php"); ?> 
</div>

<script>
  function checkUpload(){
    if ($("#file_input").get(0).files.length == 0) {
      alert("กรุณาเลือกไฟล์ที่ต้องการอัพโหลด")
      return false;
    }
  }
</script>