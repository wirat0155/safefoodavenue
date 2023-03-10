<style>
  .odd {
    background-color: #f4f6f9 !important;
  }
</style>

<?php
  function check_date_btw($date_start, $date_end)
  {
    $date_now = date('Y-m-d');
    if (($date_now >= $date_start) && ($date_now <= $date_end)) {
      return true;
    } else {
      return false;
    }
  }

  function check_date_out($date_end)
  {
    $date_now = date('Y-m-d');
    if ($date_now >= $date_end) {
      return true;
    } else {
      return false;
    }
  }

  $sql = "SELECT * FROM `sfa_formalin_checklist`
          LEFT JOIN `sfa_user` ON `sfa_formalin_checklist`.`fcl_local_id` = `sfa_user`.`us_id`
          WHERE `sfa_formalin_checklist`.`fcl_gov_id` = " . $_SESSION['us_gov_id'] . "
          ORDER BY `sfa_formalin_checklist`.`fcl_startdate` DESC";
  $arr_formalin_checklist = mysqli_query($con, $sql);
?>

<!-- Header -->
<div class="header bg-primary">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">กำหนดรอบการตรวจ</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
              <li class="breadcrumb-item active" aria-current="page">กำหนดรอบการตรวจ</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="?content=add-formalin-checklist" class="btn btn-sm btn-neutral">เพิ่มรอบการตรวจ</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="header">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg">
          <h6 class="h1 d-inline-block mb-0 pr-3">รอบการตรวจ</h6>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card border-0">
                <div class="py-4">
                  <?php if (mysqli_num_rows($arr_formalin_checklist) > 0) : ?>
                    <table class="table table-striped display nowrap" id="datatable-basic" style="max-width: 100%">
                        <thead class="thead-light">
                            <tr>
                            <th>ลำดับที่</th>
                            <th>ปี</th>
                            <th>วันที่เริ่มการตรวจ</th>
                            <th>วันสิ้นสุดการตรวจ</th>
                            <th>ผู้เพิ่มการตรวจ</th>
                            <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        $n = 1;
                        while ($obj_formalin_checklist = mysqli_fetch_array($arr_formalin_checklist)) {
                        ?>
                          <tr>
                            <!-- ลำดับที่ -->
                            <td><?php echo $n; ?></td>
                            <!-- ปี ใช้ฟังก์ชัน get_date_year จาก date_helper.php -->
                            <td><?php echo get_date_year($obj_formalin_checklist["fcl_startdate"]); ?></td>
                            <!-- วันที่เริ่มการตรวจ ใช้ฟังก์ชัน to_format แปลงวันที่ใน sql จาก date_helper.php -->
                            <td><?php echo to_format($obj_formalin_checklist["fcl_startdate"]); ?></td>
                            <!-- วันสิ้นสุดการตรวจ ใช้ฟังก์ชัน to_format แปลงวันที่ใน sql จาก date_helper.php-->
                            <td><?php echo to_format($obj_formalin_checklist["fcl_enddate"]); ?></td>
                            <td>
                              <?php $fullname = $obj_formalin_checklist["us_fname"] . " " . $obj_formalin_checklist["us_lname"];
                              echo $fullname; ?>
                            </td>

                            <!-- สถานะ 1=อยู่ในระหว่างการตรวจ -->
                            <?php if ($obj_formalin_checklist["fcl_status"] == 1) { ?>
                              <!-- เช็ควันที่ปัจจุบันกับวันที่เริ่มต้นและวันที่สิ้นสุด  -->
                              <?php if (check_date_btw($obj_formalin_checklist["fcl_startdate"], $obj_formalin_checklist["fcl_enddate"])) { ?>
                                <td>
                                  <input type="hidden" id="fcl_status" value="<?php echo $obj_formalin_checklist["fcl_status"] ?>">
                                  <a class="btn btn-danger" href="./php/action-update-fcl-status.php?fcl_id=<?= $obj_formalin_checklist['fcl_id'] ?>&fcl_status=2" id="cls_status" onclick="return confirm('เปลี่ยนสถานะเป็นปิดรอบการตรวจ?');" title="ปิดการตรวจ"><i class="fa fa-lock"></i></a>

                                  <a href="./?content=edit-formalin-checklist&fcl_id=<?= $obj_formalin_checklist["fcl_id"] ?>" class="btn btn-warning" title="แก้ไขการตรวจ"><i class="fa fa-pencil"></i></a>

                                  <a href="./?content=do_delete_formalin_checklist&fcl_id=<?= $obj_formalin_checklist["fcl_id"] ?>" onclick="return confirm('ต้องการลบรอบการตรวจ?');">
                                    <button class="btn btn-danger" style="font-size: 20px;line-height: 0.75;" title="ลบรอบการตรวจ">
                                      <i class="ni ni-fat-remove"></i>
                                    </button>
                                  </a>
                                </td>
                                <!-- เช็คว่ารอบการตรวจจบไปแล้วหรือยังมาไม่ถึง -->
                              <?php } else if (check_date_out($obj_formalin_checklist["fcl_enddate"]) == false) {  ?>
                                <td>
                                  <a href="#" onclick="alert('รอการตรวจสอบ');">
                                    <button class="btn btn-success" style="font-size: 20px;line-height: 0.75;">
                                      <span class="ni ni-time-alarm"></span>
                                    </button>
                                  </a>

                                  <a href="./?content=edit-formalin-checklist&fcl_id=<?= $obj_formalin_checklist["fcl_id"] ?>" class="btn btn-warning" title="แก้ไขการตรวจ"> <i class="fa fa-pencil"></i></a>
                                  <a href="./?content=do_delete_formalin_checklist&fcl_id=<?= $obj_formalin_checklist["fcl_id"] ?>" onclick="return confirm('ต้องการลบรอบการตรวจ?');">
                                    <button class="btn btn-danger" style="font-size: 20px;line-height: 0.75;" title="ลบรอบการตรวจ">
                                      <i class="ni ni-fat-remove"></i>
                                    </button>
                                  </a>
                                </td>
                                  <!-- รอบการตรวจที่จบไปแล้วแต่ยังไม่ได้ทำการเปลี่ยนสถานะ -->
                              <?php } else { ?>
                                <td>
                                  <a  href="./php/action-update-fcl-status.php?fcl_id=<?= $obj_formalin_checklist['fcl_id'] ?>&fcl_status=2" onclick="return confirm('รอบการตรวจนี้ยังไม่ได้ปิดรอบการตรวจ ปิดรอบการตรวจหรือไม่?'); " title="ตรวจสอบการปิดรอบการตรวจ">
                                    <button class="btn btn-danger" style="font-size: 20px;line-height: 0.75;">
                                      <span class="fa fa-exclamation "></span>
                                    </button>
                                  </a>
                                </td>
                              <?php } ?>

                            <?php } else { ?>
                              <!-- สถานะ 2 = จบแล้ว -->
                              <td> <a href="./php/action-update-fcl-status.php?fcl_id=<?= $obj_formalin_checklist['fcl_id'] ?>&fcl_status=1" onclick="return confirm('เปลี่ยนสถานะเป็นเปิดรอบการตรวจ?');" class="btn btn-success" title="เปิดรอบการตรวจ"><i class="fa fa-unlock-alt"></i></a>
                              </td>
                            <?php } ?>
                          </tr>
                        <?php
                          $n++;
                        } // End while 
                        ?>
                      </tbody>
                    </table>
                    <?php else : ?>
                      <div class="py-5">
                        <center><h2>ไม่พบข้อมูลรอบการตรวจ</h2></center>
                      </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include("footer.php"); ?>
</div>

<script>
    $(document).ready(function() {
        if ("<?php echo $_SESSION['crud-status']?>" == "0") {
            toastify_success();
        } else if ("<?php echo $_SESSION['crud-status']?>" == "1"){
            toastify_fail();
        }
        <?php unset($_SESSION['crud-status']) ?>
    });

    function toastify_success() {
        Toastify({
            text: "ดำเนินการสำเร็จ",
            duration: 5000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            style: {
                background: "#12a63a",
            }
        }).showToast();
    }
    function toastify_fail() {
        Toastify({
            text: "เกิดข้อผิดพลาด กรุณาลองอีกครั้ง",
            duration: 5000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            style: {
                background: "#a61212",
            }
        }).showToast();
    }
</script>