<!-- 
/*
* history-formalin
* history-formalin
* @input -
* @output -
* @author Jutamas Thaptong 62160079
* @Create Date 2565-08-21
*/ 
-->

<style>
  .odd {
    background-color: #f4f6f9 !important;
  }
</style>

<?php
$res_id = $_GET["res_id"];

$sql = "
    SELECT * 
    FROM sfa_formalin 
    LEFT JOIN sfa_menu ON sfa_formalin.menu_id = sfa_menu.menu_id
    WHERE sfa_menu.menu_id IS NOT NULL 
    AND sfa_formalin.res_id = " . $res_id . " 
  ";
$dbFormalin = mysqli_query($con, $sql);

$sql_res = "SELECT * FROM `sfa_restaurant` WHERE res_id = " . $res_id . " ";
$dbRestaurant = mysqli_query($con, $sql_res);
$rowRestaurant = mysqli_fetch_array($dbRestaurant);
?>


<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">รอบการตรวจ</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
              <li class="breadcrumb-item"><a href="./">รายการเมนู</a></li>
              <li class="breadcrumb-item active" aria-current="page">รอบการตรวจ</li>
            </ol>
          </nav>
        </div>
        <!-- <div class="col-lg-6 col-5 text-right">
          <a href="?content=add-menu&res_id=<?= $res_id ?>&fcl_id=<?= $row_formalin["fcl_id"] ?>" class="btn btn-sm btn-neutral">เพิ่มเมนูอาหาร</a>
          <a href="?content=history-formalin&res_id=<?= $res_id ?>" class="btn btn-sm btn-neutral">ดูผลตรวจ</a>
        </div> -->
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

        <div class="row">
          <div class="col-md px-5 pt-4">
            <h6 class="h1 d-inline-block mb-0 pr-3">รอบการตรวจ</h6>
            <a href="#" class="btn btn-primary">ครั้งที่ 1</a>
            <a href="#" class="btn btn-secondary">ครั้งที่ 2</a>
          </div>
        </div>

        <div class="table-responsive py-4">
          <table class="table table-striped stripe" id="datatable-basic">
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
              <?php while ($row = mysqli_fetch_array($dbFormalin)) { ?>
                <tr>
                  <td><?= $n; ?></td>
                  <td><?= $row["menu_name"]; ?></td>
                  <td><?= $row["for_test_date"]; ?></td>
                  <td>
                    <?php if ($row["for_status"] == 1) { ?>
                      <div class="text-danger">ไม่ปลอดภัย</div>
                    <?php } ?>
                    <?php if ($row["for_status"] == 2) { ?>
                      <div class="text-success">ปลอดภัย</div>
                    <?php } ?>
                  </td>
                </tr>
                <?php $n++; ?>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include("footer.php"); ?>
</div>