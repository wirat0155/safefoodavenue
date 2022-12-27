<style>
  .odd {
    background-color: #f4f6f9 !important;
  }
</style>

<?php
  $res_id = $_GET["res_id"];
  $sql = "SELECT * FROM `sfa_menu` 
  LEFT JOIN `sfa_formalin` ON `sfa_menu`.`menu_id` = `sfa_formalin`.`for_menu_id`
  WHERE `sfa_menu`.`menu_res_id` = " . $res_id . " ORDER BY `sfa_menu`.`menu_id` DESC";
  $arr_menu = mysqli_query($con, $sql);
  
  $sql = "SELECT `res_title` FROM `sfa_restaurant` WHERE res_id = " . $res_id;
  $arr_restaurant = mysqli_query($con, $sql);
  $obj_restaurant = mysqli_fetch_array($arr_restaurant);
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
          <a href="?content=add-menu&res_id=<?= $res_id ?>" class="btn btn-sm btn-neutral">เพิ่มเมนูอาหาร</a>
          <a href="?content=history-res-result&res_id=<?= $res_id ?>" class="btn btn-sm btn-neutral">ดูผลตรวจ</a>
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
            <h1>ชื่อร้าน : <?php echo $obj_restaurant["res_title"] ?></h1>
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
              while ($obj_menu = mysqli_fetch_array($arr_menu)) { ?>
                <tr>
                  <td><?php echo $n; ?></td>
                  <td><?php echo $obj_menu["menu_name"]; ?></td>
                  <td>
                    <?php 
                    if ($obj_menu["for_status"] == 1) {
                      echo "<span class='text-danger'>ไม่ปลอดภัย</span>";
                    }
                    else if ($obj_menu["for_status"] == 2) {
                      echo "<span class='text-success'>ปลอดภัย</span>";
                    }
                    else if ($obj_menu["for_status"] == "") {
                      echo "รอตรวจสอบ";
                    }
                    ?>
                  </td>
                  <td>
                    <div class="mx-2">
                      <?php
                        $x1 = $obj_menu['for_x_center_1'];
                        $x2 = $obj_menu['for_x_center_2'];
                        $y1 = $obj_menu['for_y_center_1'];
                        $y2 = $obj_menu['for_y_center_2'];
                        $r1 = $obj_menu['for_radius_1'];
                        $r2 = $obj_menu['for_radius_2'];
                        $fn = $obj_menu['for_img_path'];

                        // https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/expert-panel/pages/circle_img.php?x1=
                        // $imagePath = "./pages/circle_img.php?x1=" . $x1 . "&y1=" . $y1 . "&r1=" . $r1 . "&x2=" . $x2 . "&y2=" . $y2 . "&r2=" . $r2 . "&fn=" . $fn;

                        // echo '<img src="' . $imagePath . '">';
                        if ($fn != "") {
                          $imagePath = "../assets/img/uploads/" . $obj_menu["for_img_path"];
                          echo '<img src="' . $imagePath . '">';
                        }
                      ?>

                  </td>
                  <td>
                    <div class="row">
                      <?php if ($obj_menu["for_status"] != "") { ?>
                        <div class="mx-2">
                          <a href="index.php?content=formalin-detail&for_id=<?php echo $obj_menu["for_id"] ?>">
                            <button class="btn btn-info" style="font-size: 20px;line-height: 0.75;" title="ดูรายละเอียดผลตรวจ"><i class="fa fa-search"></i></button>
                          </a>
                        </div>
                      <?php } else { ?>
                        <div class="mx-2">
                          <a href="./?content=upload&menu_id=<?= $obj_menu["menu_id"] ?>">
                            <button class="btn btn-primary" style="font-size: 20px;line-height: 0.75;" title="อัพโหลดผลตรวจ"><i class="ni ni-camera-compact"></i></button>
                          </a>
                        </div>

                      <?php } ?>

                      <div class="mx-2">
                        <a href="./?content=do_delete_menu&menu_id=<?= $obj_menu["menu_id"] ?>" title=" ลบผลตรวจ" onclick="return confirm('ต้องการลบผลตรวจที่เลือก?');">
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