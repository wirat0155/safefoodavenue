<!-- 
/*
* list_menu
* list_menu
* @input -
* @output -
* @author Jutamas Thaptong 62160079
* @Create Date 2565-06-20
*/ 
-->

<style>
  .odd {
    background-color: #f4f6f9 !important;
  }
</style>

<?php
$res_id = $_GET["res_id"];

$sql = "SELECT * FROM sfa_menu WHERE res_id=" . $res_id . " ORDER BY menu_id DESC";
$query = mysqli_query($con, $sql);

//รับวันที่ปัจจุบัน
// date_default_timezone_set("Asia/Bangkok");
// $date_now = date("Y-m-d");

//เช็ควันที่ในฐานข้อมูล
// $sql_dateCount = "SELECT * FROM sfa_formalin_checklist 
//     WHERE ('$date_now' BETWEEN fcl_startdate  AND fcl_enddate) AND fcl_status = '1'";
// $query_date = mysqli_query($con, $sql_dateCount);

$sql = "SELECT * FROM `sfa_restaurant` WHERE res_id = " . $res_id . " ";
$dbRestaurant = mysqli_query($con, $sql);
$rowRestaurant = mysqli_fetch_array($dbRestaurant);

?>

<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">รายการเมนู</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
              <li class="breadcrumb-item active" aria-current="page">รายการเมนู</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="?content=add-menu&res_id=<?= $res_id ?>&fcl_id=<?= $row_formalin["fcl_id"] ?>" class="btn btn-sm btn-neutral">เพิ่มเมนูอาหาร</a>
          <a href="?content=history-formalin&res_id=<?= $res_id ?>" class="btn btn-sm btn-neutral">ดูผลตรวจ</a>
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
            <h1>ชื่อร้าน : <?= $rowRestaurant["res_title"] ?></h1>
          </div>
        </div>

        <div class="table-responsive py-4">
          <table class="table table-striped stripe" id="datatable-basic">
            <thead class="thead-light">
              <tr>
                <th style="width: 20%;">ลำดับที่</th>
                <th style="width: 20%;">ชื่อเมนู</th>
                <th style="width: 20%;">สถานะ</th>
                <th style="width: 20%;">รูปภาพ</th>
                <th style="width: 20%;">Action</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $n = 1;
              while ($row = mysqli_fetch_array($query)) {

                $sql = "SELECT * FROM sfa_formalin WHERE res_id = " . $res_id . " AND menu_id = " . $row["menu_id"] . "  ";
                $dbFormalin = mysqli_query($con, $sql);

                $rowFormalin = mysqli_fetch_array($dbFormalin);
                $formalin_status = 0;
                if (mysqli_num_rows($dbFormalin) > 0) {
                  $formalin_status = $rowFormalin["for_status"] == 1 ? 1 : 2;
                }

              ?>
                <tr>
                  <td><?php echo $n; ?></td>
                  <td><?php echo $row["menu_name"]; ?></td>
                  <td>
                    <?php if ($formalin_status == 0) { ?>
                      <div style="color: #888;">รอตรวจสอบ</div>
                    <?php } ?>
                    <?php if ($formalin_status == 1) { ?>
                      <div class="text-danger">ไม่ปลอดภัย</div>
                    <?php } ?>
                    <?php if ($formalin_status == 2) { ?>
                      <div class="text-success">ปลอดภัย</div>
                    <?php } ?>
                  </td>
                  <td>
                    <div class="mx-2">

                      <?php
                      $sql = " SELECT * FROM sfa_formalin WHERE menu_id='" . $row["menu_id"] . "'";
                      $query_formalin = mysqli_query($con, $sql);
                      $row_formalin = mysqli_fetch_array($query_formalin);

                      if (mysqli_num_rows($query_formalin) > 0) {
                        $x1 = $row_formalin['x_center_1'];
                        $x2 = $row_formalin['x_center_2'];
                        $y1 = $row_formalin['y_center_1'];
                        $y2 = $row_formalin['y_center_2'];
                        $r1 = $row_formalin['for_radius_1'];
                        $r2 = $row_formalin['for_radius_2'];
                        $fn = $row_formalin['for_img_path'];

                        // https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/expert-panel/pages/circle_img.php?x1=
                        $imagePath = "./pages/circle_img.php?x1=" . $x1 . "&y1=" . $y1 . "&r1=" . $r1 . "&x2=" . $x2 . "&y2=" . $y2 . "&r2=" . $r2 . "&fn=" . $fn;

                        echo '<img src="' . $imagePath . '">';
                      }
                      ?>

                  </td>
                  <td>
                    <div class="row">
                      <?php if ($formalin_status == 2) { ?>

                        <div class="mx-2">
                          <a href="index.php?content=formalin-detail&menu_id=<?= $row["menu_id"] ?>&res_id=<?= $res_id ?>&fcl_id=<?= $row_formalin["fcl_id"] ?>">
                            <button class="btn btn-info" style="font-size: 20px;line-height: 0.75;" title="ดูรายละเอียดผลตรวจ"><i class="fa fa-search"></i></button>
                          </a>
                        </div>

                      <?php } else { ?>

                        <div class="mx-2">
                          <a href="./?content=upload&menu_id=<?= $row["menu_id"] ?>&res_id=<?= $res_id ?>&fcl_id=<?= $row_formalin["fcl_id"] ?>">
                            <button class="btn btn-primary" style="font-size: 20px;line-height: 0.75;" title="อัพโหลดผลตรวจ"><i class="ni ni-camera-compact"></i></button>
                          </a>
                        </div>

                      <?php } ?>

                      <div class="mx-2">
                        <a href="./?content=do_delete_menu&menu_id=<?= $row["menu_id"] ?>&res_id=<?= $res_id ?>&fcl_id=<?= $row_formalin["fcl_id"] ?>" " title=" ลบผลตรวจ" onclick="return confirm('ต้องการลบผลตรวจที่เลือก?');">
                          <button class="btn btn-danger" style="font-size: 20px;line-height: 0.75;">
                            <i class="ni ni-fat-remove"></i>
                          </button>
                        </a>
                      </div>

                    </div>
                  </td>
                </tr>
              <?php
                $n++;
              } // End while 
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include("footer.php"); ?>
</div>