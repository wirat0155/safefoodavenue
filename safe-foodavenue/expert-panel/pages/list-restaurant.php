<style>
  .odd {
    background-color: #f4f6f9 !important;
  }
</style>

<?php
  $sql = "SELECT * FROM `sfa_restaurant`
  LEFT JOIN `sfa_entrepreneur` ON `sfa_restaurant`.`res_ent_id` = `sfa_entrepreneur`.`ent_id`
  LEFT JOIN `sfa_prefix` ON `sfa_entrepreneur`.`ent_pref_id` = `sfa_prefix`.`pref_id`
  LEFT JOIN `sfa_block` ON `sfa_restaurant`.`res_block_id` = `sfa_block`.`block_id`
  LEFT JOIN `sfa_res_formalin_status` ON `sfa_restaurant`.`res_id` = `sfa_res_formalin_status`.`res_for_res_id`
  WHERE `sfa_restaurant`.`res_gov_id` = " . $_SESSION['us_gov_id'];
  $arr_restaurant = mysqli_query($con, $sql);

  function get_number_formalin_pass_restaurant($con) {
    $sql = "SELECT COUNT(`res_for_id`) AS `count_res` FROM `sfa_res_formalin_status`
    LEFT JOIN `sfa_restaurant` ON `sfa_res_formalin_status`.`res_for_res_id` = `sfa_restaurant`.`res_id`
    WHERE `sfa_res_formalin_status`.`res_for_status` = 0
    AND `sfa_restaurant`.`res_gov_id` = " . $_SESSION['us_gov_id'];
    $arr_restaurant = mysqli_query($con, $sql);
    $count_restaurant = mysqli_fetch_assoc($arr_restaurant)["count_res"];
    return $count_restaurant;
  }
  $pass_restaurant = get_number_formalin_pass_restaurant($con);

  function get_number_formalin_fail_restaurant($con) {
    $sql = "SELECT COUNT(`res_for_id`) AS `count_res` FROM `sfa_res_formalin_status`
    LEFT JOIN `sfa_restaurant` ON `sfa_res_formalin_status`.`res_for_res_id` = `sfa_restaurant`.`res_id`
    WHERE `sfa_res_formalin_status`.`res_for_status` = 1
    AND `sfa_restaurant`.`res_gov_id` = " . $_SESSION['us_gov_id'];
    $arr_restaurant = mysqli_query($con, $sql);
    $count_restaurant = mysqli_fetch_assoc($arr_restaurant)["count_res"];
    return $count_restaurant;
  }
  $fail_restaurant = get_number_formalin_fail_restaurant($con);
  
  function get_number_formalin_all_restanrant($con) {
    $sql = "SELECT COUNT(`res_id`) AS `count_res` FROM `sfa_restaurant`
    WHERE `sfa_restaurant`.`res_gov_id` = " . $_SESSION['us_gov_id'];
    $arr_restaurant = mysqli_query($con, $sql);
    $count_restaurant = mysqli_fetch_assoc($arr_restaurant)["count_res"];
    return $count_restaurant;
  }
  $all_restaurant = get_number_formalin_all_restanrant($con);
  $wait_restaurant = $all_restaurant - $pass_restaurant - $fail_restaurant;
?>

<!-- Header -->
<div class="header bg-primary">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">รายการร้านอาหาร</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
              <li class="breadcrumb-item active" aria-current="page">รายการร้านอาหาร</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="header pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg">
          <h6 class="h1 d-inline-block mb-0 pr-3">รอบการตรวจ</h6>
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
                  <span class="h2 font-weight-bold mb-0"><?php echo $wait_restaurant ?></span>
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
                  <span class="h2 font-weight-bold mb-0"> <?php echo $fail_restaurant ?></span>
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
                  <span class="h2 font-weight-bold mb-0"><?php echo $pass_restaurant ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card border-0">
        <div class="py-2">
          <?php if (mysqli_num_rows($arr_restaurant) > 0) : ?>
          <table class="table table-striped display nowrap" id="datatable-basic" style="max-width: 100%">
            <thead class="thead-light">
              <tr>
                <th>ลำดับที่</th>
                <th>ชื่อร้าน</th>
                <th>สถานะ</th>
                <th>สถานที่ตั้งร้าน</th>
                <th>เจ้าของร้าน</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $n = 1;
              while ($obj_restaurant = mysqli_fetch_array($arr_restaurant)) {
              ?>
                <tr>
                  <td><?php echo $n; ?></td>
                  <td><?php echo $obj_restaurant["res_title"]; ?></td>
                  <td>
                    <?php
                    if ($obj_restaurant["res_for_status"] == "") {
                      echo "รอตรวจสอบ";
                    }
                    else if ($obj_restaurant["res_for_status"] == 1) {
                      echo "<span class='text-danger'>ไม่ปลอดภัย</span>";
                    }
                    else if ($obj_restaurant["res_for_status"] == 0) {
                      echo "<span class='text-success'>ปลอดภัย</span>";
                    }
                    ?>
                  </td>
                  <td><?php echo $obj_restaurant["block_title"]; ?></td>
                  <td>
                    <?php
                    $fullname = $obj_restaurant["pref_title"] . " " . $obj_restaurant["ent_firstname"] . " " . $obj_restaurant["ent_lastname"];
                    echo $fullname;
                    ?>
                  </td>
                  <td>
                    <a href="./?content=list-menu&res_id=<?= $obj_restaurant['res_id'] ?>">
                      <button class="btn btn-primary" style="font-size: 20px;line-height: 0.75;" title="ดูรายการเมนู"><i class="fa fa-search"></i></button>
                    </a>
                  </td>
                </tr>
              <?php
                $n++;
              } // End while 
              ?>
            </tbody>
          </table>
          <?php else : ?>
            <div class="py-5">
              <center>
                <h3>ไม่พบข้อมูลร้านอาหาร</h3>
              </center>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include("footer.php"); ?>
</div>