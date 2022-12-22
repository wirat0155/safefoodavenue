<!-- 
/*
* list_restaurant
* list_restaurant
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
<!-- Header -->
<div class="header bg-primary">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">รายการร้านอาหารที่อยู่ใกล้ฉัน</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
              <li class="breadcrumb-item active" aria-current="page">รายการร้านอาหาร</li>
            </ol>
          </nav>
        </div>
        <!-- <div class="col-lg-6 col-5 text-right">
              <a href="?content=add-restaurant" class="btn btn-sm btn-neutral">เพิ่มร้านอาหาร</a>
            </div> -->
      </div>
    </div>
  </div>
</div>

<?php
// จำนวนร้านที่รอตรวจสอบ
$lat = $_POST["lat"];
$long = $_POST["long"];
function get_allrestaurant($con)
{
  $sql = "SELECT count(res_id) as count_res FROM `sfa_restaurant`";
  $entries = mysqli_query($con, $sql);
  return $entries;
}
$db_restaurant = get_allrestaurant($con);
$row_restaurant = mysqli_fetch_array($db_restaurant)["count_res"];

// // จำนวนร้านอาหารที่ไม่ปลอดภัย
// function get_status_restaurant($con)
// {
//   $sql = "SELECT count(res_status) as count_row FROM `sfa_restaurant` where res_status = 0";
//   $entries = mysqli_query($con, $sql);
//   return $entries;
// }
// $db_restaurant = get_status_restaurant($con);
// $row_not_safe = mysqli_fetch_array($db_restaurant)["count_row"];

// // จำนวนร้านอาหารที่ปลอดภัย
// function get_cat_restaurant($con)
// {
//   $sql = "SELECT count(res_status) as count_row FROM `sfa_restaurant` where res_status = 0";
//   $entries = mysqli_query($con, $sql);
//   return $entries;
// }
// $db_restaurant = get_cat_restaurant($con);
// $row_safe = mysqli_fetch_array($db_restaurant)["count_row"];

// จำนวนร้านอาหารที่ ไม่ปลอดภัย + ปลอดภัย
function getCountStatus($con, $lat, $long)
{
  $sql = "SELECT * FROM sfa_restaurant NATURAL JOIN sfa_entrepreneur NATURAL JOIN sfa_block WHERE 1";
  $query = mysqli_query($con, $sql);

  $countData = array();
  $countData["wait"] = 0;
  $countData["no_pass"] = 0;
  $countData["pass"] = 0;

  while ($row = mysqli_fetch_array($query)) {

    if ($row["block_lat"] != "") {
      $dist = distance($lat, $long, $row["block_lat"], $row["block_lon"], "K");
      $dist = $dist * 100;
    }

    if ($dist < 110) {

      # รายการเมนู
      $sql = "SELECT * FROM `sfa_menu` WHERE res_id = " . $row["res_id"] . " ORDER BY `menu_id` ASC";
      $dbMenu = mysqli_query($con, $sql);
      $countMenu = mysqli_num_rows($dbMenu);
      $menuList = [];
      while ($rowMenu = mysqli_fetch_array($dbMenu)) {
        $menuList[] = $rowMenu["menu_id"];
      }
      $menuList = implode("','", $menuList);

      // สถานะตรวจสอบของแต่ละร้าน
      $sql = "
        SELECT for_status
        FROM `sfa_formalin` 
        WHERE res_id = " . $row["res_id"] . " 
        AND menu_id in ('" . $menuList . "')
      ";
      $dbFormalin = mysqli_query($con, $sql);
      $countFormalin = mysqli_num_rows($dbFormalin);

      $formalin_status = 0;
      if ($countFormalin == $countMenu && $countFormalin !== 0) { // ถ้าตรวจครบแล้ว
        $formalin_status = 2;
        while ($rowFormalin = mysqli_fetch_array($dbFormalin)) {
          if ($rowFormalin["for_status"] == 1) { // ไม่ปลอดภัย
            $formalin_status = 1; // ไม่ปลอดภัย
          }
        }
      }

      if ($formalin_status == 0) {
        $countData["wait"] += 1;
      }
      if ($formalin_status == 1) {
        $countData["no_pass"] += 1;
      }
      if ($formalin_status == 2) {
        $countData["pass"] += 1;
      }
    }
  }

  return $countData;
}
$countStatus = getCountStatus($con, $lat, $long);

function distance($lat1, $lon1, $lat2, $lon2, $unit)
{
  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
    return 0;
  } else {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
      return ($miles * 1.609344);
    } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
      return $miles;
    }
  }
}

?>

<div class="header pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg">
          <h6 class="h1 d-inline-block mb-0 pr-3">รอบการตรวจ</h6>
          <a href="#" class="btn btn-primary">ครั้งที่ 1</a>
          <a href="#" class="btn btn-secondary">ครั้งที่ 2</a>
        </div>
      </div>
      <!-- Card stats -->
      <div class="row">
        <div class="col-md-4">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">จำนวนร้านที่รอตรวจสอบ</h5>
                  <span class="h2 font-weight-bold mb-0"><?php echo $countStatus["wait"] ?></span>
                </div>
                <div class="col-auto">
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">จำนวนร้านอาหารที่ไม่ปลอดภัย</h5>
                  <span class="h2 font-weight-bold mb-0"><?php echo $countStatus["no_pass"]; ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">จำนวนร้านอาหารที่ปลอดภัย</h5>
                  <span class="h2 font-weight-bold mb-0"><?php echo $countStatus["pass"]; ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Content -->
<?php
$sql = "SELECT * FROM sfa_restaurant NATURAL JOIN sfa_entrepreneur NATURAL JOIN sfa_block WHERE 1";
$query = mysqli_query($con, $sql);
?>

<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card border-0">

        <!-- <div class="row p-4">
              <div class="col-md">
                <button type="button" class="btn btn-primary py-2">รอตรวจสอบ</button>
                <button type="button" class="btn btn-secondary py-2">ไม่ปลอดภัย</button>
                <button type="button" class="btn btn-secondary py-2">ปลอดภัย</button>
              </div>
            </div> -->

        <div class="table-responsive py-4">
          <table class="table table-flush" id="datatable-basic">
            <thead class="thead-light">
              <tr>
                <th>ลำดับที่</th>
                <th>ชื่อร้าน</th>
                <th>สถานที่ตั้งร้าน</th>
                <th>ระยะห่าง</th>
                <th>เจ้าของร้าน</th>
                <th>สถานะ</th>
                <th>Action</th>

              </tr>
            </thead>

            <tbody>
              <?php
              $n = 1;
              while ($row = mysqli_fetch_array($query)) {
                if ($row["block_lat"] != "") {
                  $dist = distance($lat, $long, $row["block_lat"], $row["block_lon"], "K");
                  $dist = $dist * 100;
                }

              ?>
                <?php
                if ($dist < 110) {
                ?>
                  <?php
                  # รายการเมนู
                  $sql = "SELECT * FROM `sfa_menu` WHERE res_id = " . $row["res_id"] . " ORDER BY `menu_id` ASC";
                  $dbMenu = mysqli_query($con, $sql);
                  $countMenu = mysqli_num_rows($dbMenu);
                  $menuList = [];
                  while ($rowMenu = mysqli_fetch_array($dbMenu)) {
                    $menuList[] = $rowMenu["menu_id"];
                  }
                  $menuList = implode("','", $menuList);

                  // สถานะตรวจสอบของแต่ละร้าน
                  $sql = "
                      SELECT for_status
                      FROM `sfa_formalin` 
                      WHERE res_id = " . $row["res_id"] . " 
                      AND menu_id in ('" . $menuList . "')
                    ";
                  $dbFormalin = mysqli_query($con, $sql);
                  $countFormalin = mysqli_num_rows($dbFormalin);

                  $formalin_status = 0;
                  if ($countFormalin == $countMenu && $countFormalin !== 0) { // ถ้าตรวจครบแล้ว
                    $formalin_status = 2; // ปลอดภัย
                    while ($rowFormalin = mysqli_fetch_array($dbFormalin)) {
                      if ($rowFormalin["for_status"] == 1) {
                        $formalin_status = 1; // ไม่ปลอดภัย
                      }
                    }
                  }
                  ?>

                  <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo $row["res_title"]; ?></td>
                    <td><?php echo $row["block_title"]; ?></td>
                    <td><?php echo round($dist, 2);  ?> ม. </td>
                    <td>
                      <?php
                      $fullname = $row["ent_title"] . " " . $row["ent_firstname"] . " " . $row["ent_lastname"];
                      echo $fullname;
                      ?>
                    </td>
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
                      <!-- ลิ้งค์เก่า -->
                    <!-- https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/expert-panel/?content=list-menu&res_id= -->
                      <a href="./?content=list-menu&res_id=<?= $row['res_id'] ?>">
                        <button class="btn btn-primary" style="font-size: 20px;line-height: 0.75;" title="ดูรายการเมนู"><i class="fa fa-search"></i></button>
                      </a>
                      <?php //echo "<a href='https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/admin-panel/?content=edit-restaurant&res_id=".$row['res_id']."' class='btn btn-warning'>แก้ไขข้อมูล</a>"; 
                      ?>
                    </td>
                  </tr>
              <?php
                } // End distance if
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