<style>
  .odd {
    background-color: #f4f6f9 !important;
  }
</style>

<?php
  // get year dropdown
  $sql = "SELECT DISTINCT `fcl_year` AS `fcl_year` 
  FROM `sfa_formalin_checklist` WHERE `fcl_gov_id` = " . $_SESSION['us_gov_id'] . "
  ORDER BY `fcl_year` DESC";

  $arr_year = mysqli_query($con, $sql);
  if (mysqli_num_rows($arr_year) == 0) {
    $obj_year = date("Y");
  } else {
    $obj_year = mysqli_fetch_assoc($arr_year);
  }
  $fcl_id = $obj_year["fcl_year"];
  $arr_year = mysqli_query($con, $sql);
        
  // get first fcl_id
  $res_id = $_GET["res_id"];

  $sql = "SELECT * FROM `sfa_formalin`
  LEFT JOIN `sfa_menu` ON `sfa_formalin`.`for_menu_id` = `sfa_menu`.`menu_id` 
  WHERE `sfa_menu`.`menu_id` IS NOT NULL 
  AND `sfa_formalin`.`for_fcl_id` = " . $fcl_id . "
  AND `sfa_formalin`.`for_res_id` = " . $res_id;
  $dbFormalin = mysqli_query($con, $sql);

  $sql = "SELECT * FROM `sfa_formalin`
  LEFT JOIN `sfa_menu` ON `sfa_formalin`.`for_menu_id` = `sfa_menu`.`menu_id` 
  WHERE `sfa_menu`.`menu_id` IS NOT NULL 
  AND `sfa_formalin`.`for_res_id` = " . $res_id;
  $dbFormalin = mysqli_query($con, $sql);

  $sql_res = "SELECT * FROM `sfa_restaurant` WHERE `res_id` = " . $res_id;
  $dbRestaurant = mysqli_query($con, $sql_res);
  $rowRestaurant = mysqli_fetch_assoc($dbRestaurant);
?>

<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">ผลการตรวจของร้านอาหาร</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
              <li class="breadcrumb-item active" aria-current="page">ผลการตรวจของร้านอาหาร</li>
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

      <div class="row">
          <div class="col-md px-5 pt-4">
            <h5 class="h1 d-inline-block mb-0 pr-3">ผลการตรวจสารฟอร์มาลินของร้านอาหาร <?= $rowRestaurant["res_title"] ?></h5>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-md-1 px-5 pt-4">
            <h6 class="h1 d-inline-block mb-0">ปีปฏิทิน</h6>
          </div>
          <div class="col-md-2 pt-4">
            <select name="fcl_year" id="fcl_year" class="select2 form-control">
                <?php
                while($obj_fcl_year = mysqli_fetch_assoc($arr_year)["fcl_year"]) {
                    $selected = $fcl_year == $obj_fcl_year? "selected" : "" ?>
                    <option value="<?php echo $obj_fcl_year ?>" <?php echo $selected ?>><?php echo $obj_fcl_year ?></option>
                <?php } ?>
            </select>
          </div>

          <div class="col-md-2 pt-4">
            <select name="fcl_id" id="fcl_id" class="select2 form-control">
            </select>
          </div>
          <div class="col-md-2 pt-4">
            <a href="" class="btn btn-primary">ค้นหา</a>
          </div>
        </div> -->

        <?php if (mysqli_num_rows($dbFormalin) > 0) : ?>
        <div class="py-4">
          <table class="table table-striped display nowrap" id="datatable-basic" style="max-width: 100%">
            <thead class="thead-light">
              <tr>
                <th style="width: 20%;">ลำดับที่</th>
                <th style="width: 20%;">ชื่อเมนู</th>
                <th style="width: 20%;">วันที่ตรวจ</th>
                <th style="width: 20%;">สถานะ</th>
              </tr>
            </thead>

            <tbody>
              <?php $n = 1; ?>
              <?php while ($row = mysqli_fetch_assoc($dbFormalin)) { ?>
                <tr>
                  <td><?= $n; ?></td>
                  <td class="limit-char"><?= $row["menu_name"]; ?></td>
                  <td><?= $row["for_test_date"]; ?></td>
                  <td>
                    <?php if($row["for_status"] == 1){ ?>
                      <div class="text-danger">ไม่ปลอดภัย</div>
                    <?php } ?>
                    <?php if($row["for_status"] == 2){ ?>
                      <div class="text-success">ปลอดภัย</div>
                    <?php } ?>
                  </td>
                </tr>
                <?php $n++; ?>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <?php else : ?>
          <div class="py-5">
            <center><h2>ไม่พบข้อมูลการตรวจสอบสารฟอร์มาลีน</h2></center>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include("footer.php"); ?>
</div>