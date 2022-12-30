<?php
    // get array of prefix
    $sql = "SELECT * FROM sfa_prefix";
    $arrPrefix = mysqli_query($con, $sql);

    // get all role
    $sql = "SELECT * FROM sfa_role";
    $arrRole = mysqli_query($con, $sql);

    $sql = "SELECT * FROM th_provinces";
    $arrProvince = mysqli_query($con, $sql);

    $sql = "SELECT * FROM sfa_government";
    $arrGovernment = mysqli_query($con, $sql);
?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">เพิ่มบัญชีผู้ใช้งาน</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">เพิ่มบัญชีผู้ใช้งาน</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card border-0">
                <div class="table-responsive py-4 px-4">
                    <form action="./php/action-add-user.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-2 pb-4">
                                <label for="prefix" class="required">คำนำหน้า</label>
                                <select name="us_pref_id" class="select2 form-control" required>
                                    <option value="" disabled selected>คำนำหน้า</option>
                                    <?php
                                    while ($objPrefix = mysqli_fetch_array($arrPrefix)) {
                                        echo '<option value="' . $objPrefix['pref_id'] . '">' . $objPrefix['pref_title'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4" class="required">
                                <label for="first_name" class="required">ชื่อจริง</label>
                                <input type="text" id="us_fname" name="us_fname" class="form-control" placeholder="ใส่ชื่อจริง" oninput="check_name()" required>
                                <span style='color:red' id="status_fname"></span>
                            </div>
                            <div class="col-md-4">
                                <label for="last_name" class="required">นามสกุล</label>
                                <input type="text" id="us_lname" name="us_lname" class="form-control" placeholder="ใส่นามสกุล" oninput="check_name()" required>
                                <span style='color:red' id="status_lname"></span>
                            </div>


                            <!-- ประเภทผู้ใช้งาน -->
                            <div class="col-md-3">
                                <label for="role_id" class="required">ประเภทผู้ใช้งาน</label>
                                <select name="role_id" id="role_id" class="select2 form-control" required>
                                    <option value="" selected disabled>เลือกประเภทผู้ใช้งาน</option>
                                    <?php
                                    while ($objRole = mysqli_fetch_array($arrRole)) {
                                        echo '<option value="' . $objRole['role_id'] . '">' . $objRole['role_title'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <b style="font-size: 20px;">ตั้งค่าพื้นที่การตรวจ</b>
                        <br>
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <label for="province" class="required">จังหวัด</label>
                                <select name="us_province" id="us_province" class="select2 form-control" onchange="SelectGovernment()">
                                <option value="" selected disabled>เลือกจังหวัด</option>
                                <?php while ($obj_province = mysqli_fetch_array($arrProvince)) { ?>
                                <option value="<?= $obj_province["id"] ?>">
                                    <?= $obj_province["name_th"]?>
                                </option>
                                <?php } ?>
                            </select>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="government" class="required">องค์กรปกครองส่วนท้องถิ่น</label>
                                <select name="us_gov_id" id="us_gov_id" class="select2 form-control">
                                <!-- <option value="" selected disabled>เลือกองค์กรปกครองส่วนท้องถิ่น</option>
                                <?php while ($obj_government = mysqli_fetch_array($arrGovernment)) { ?>
                                <option value="<?= $obj_government["gov_id"] ?>">
                                    <?= $obj_government["gov_name"]?>
                                </option>
                                <?php } ?> -->
                                <option value="" selected disabled>เลือกองค์กรปกครองส่วนท้องถิ่น</option>
                            </select>
                            </div>
                            <!-- <div class="col-md-4 mt-3" class="required">
                                <label for="government" class="required">องค์กรปกครองส่วนท้องถิ่น</label>
                            <input type="text" id="us_government_name" name="us_government_name" class="form-control" placeholder="องค์กรปกครองส่วนท้องถิ่น" oninput="check_government_name()">
                            <span id="status_gov_name"></span>
                            </div> -->
                            <!-- <div class="col-md-4 mt-5">
                                <button type="button" class="btn btn-info">เพิ่มองค์กรปกครองส่วนท้องถิ่น</button>
                            </div> -->
                        </div>
                        <hr>
                        <b style="font-size: 20px;">สร้างบัญชีผู้ใช้</b>
                        <br>
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <label for="username" class="required">ชื่อผู้ใช้งาน</label>
                                <input type="text" id="us_username" name="us_username" class="form-control" placeholder="ชื่อผู้ใช้งาน" oninput="check_name_username()" required>
                                <span style='color:red' id="status_username"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <label for="password" class="required">รหัสผ่าน</label>
                                <input type="password" id="us_password" name="us_password" minlength="8" class="form-control" placeholder="รหัสผ่านอย่างน้อย 8 ตัวอักษร" onkeyup="confirm_pass()" required>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="confirm_password" class="required">ยืนยันรหัสผ่าน</label>
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="ยืนยันรหัสผ่าน" onkeyup="confirm_pass()" required>
                                <span style='color:red' id="invalid_password"></span>
                            </div>

                        </div>
                        <div class="row pb-4  mt-3" style="position: relative;">
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-success" id="cf_btn" value="สร้างบัญชี">
                                <input type="reset" class="btn btn-secondary" value="กลับ" onclick="location.href='./?content=list-user'">
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
    var chk_password = 0;
    var chk_name = 0;
    var chk_username = 0;
    function check_name_username() {
        jQuery.ajax({
            url: "<?php echo "check_name.php" ?>",
            data: 'us_username=' + $("#us_username").val(),
            type: "POST",
            success: function(data) {
                $("#status_username").html(data);
                if (data.trim() == "ok") {
                    var chk_username = 0;
                    $("#status_username").html("<span style='color:green'>ชื่อผู้ใช้งานสามารถใช้ได้</span>");
                } else if (data.trim() == "duplicate") {
                    var chk_username = 1;
                    $("#status_username").html("<span style='color:red'>ชื่อผู้ใช้งานซ้ำ</span>");
                } else {
                    var chk_username = 0;
                    $("#status_username").html("");
                }
                check_btn_submit();
            },
            error: function() {}
        });
    }
    var chk_gov_name = 0;
    function check_government_username() {
        jQuery.ajax({
            url: "<?php echo "check_name.php" ?>",
            data: 'us_government_name=' + $("#us_government_name").val(),
            type: "POST",
            success: function(data) {
                $("#status_government_name").html(data);
                if (data.trim() == "ok") {
                    var chk_gov_name = 0;
                    $("#status_government_name").html("<span style='color:green'>ชื่อองค์กรส่วนปกครองนี้สามารถใช้ได้</span>");
                } else if (data.trim() == "duplicate") {
                    var chk_gov_name = 1;
                    $("#status_government_name").html("<span style='color:red'>ชื่อองค์กรส่วนปกครองนี้ซ้ำ</span>");
                } else {
                    var chk_gov_name = 0;
                    $("#status_government_name").html("");
                }
                check_btn_submit();
            },
            error: function() {}
        });
    }

    // function check_government_name() {
    //         jQuery.ajax({
    //             dataType: "json",
    //             url: "<?php //echo "check_name.php" ?>",
    //             data: {
    //                 gov_name: $("#gov_name").val(),
    //             },
    //             type: "POST",
    //             success: function(status) {
    //                 if (status != "duplicate") {
    //                     $("#status_gov_name").html("<span style='color:green'>ชื่อองค์กรส่วนปกครองนี้สามารถใช้งานได้</span>");
    //                     chk_gov_name = 0;
    //                 } else {
    //                     $("#status_gov_name").html("<span style='color:red'>ชื่อองค์กรปกครองนี้ซ้ำกับองค์กรปกครองที่มีในระบบ</span>");
    //                     chk_gov_name = 1;
    //                 }
    //                 check_btn_submit();
    //             },
    //             error: function() {
    //                 $("#status_gov_name").html("");
    //                 chk_gov_name = 1;
    //             },
    //             always: function() {
    //                 check_btn_submit();
    //             }
    //         });
    //     }

    function check_name() {
        jQuery.ajax({
            url: "check_name.php",
            data: {
                us_fname: $("#us_fname").val(),
                us_lname: $("#us_lname").val()
            },
            type: "POST",
            success: function(data) {
                if (data.trim() == "ok") {
                    var chk_name = 0;
                    $("#status_fname").html("<span style='color:green'>ชื่อและนามสกุลนี้ไม่เคยใช้มาก่อน สามารถใช้งานได้</span>");
                } else if (data.trim() == "duplicate") {
                    var chk_name = 1;
                    $("#status_fname").html("<span style='color:red'>ชื่อและนามสกุลของผู้ใช้นี้มีในระบบแล้ว</span>");
                } else {
                    var chk_name = 1;
                    $("#status_fname").html("");
                }
                check_btn_submit();
            },
            error: function() {}
        });
    }

    function confirm_pass() {
        if ($('#us_password').val() != $('#confirm_password').val() && $('#confirm_password').val() == null || $('#confirm_password').val() == "") {
            $('#invalid_password').text('');
            chk_password = 1;
            check_btn_submit();
        } else if ($('#us_password').val() != $('#confirm_password').val()) {
            $('#invalid_password').text('รหัสผ่านไม่ถูกต้อง');
            chk_password = 1;
            check_btn_submit();
        } else {
            $('#invalid_password').text('');
            chk_password = 0;
            check_btn_submit();
        }
    }

    function check_btn_submit() {
        if (chk_password == 1 || chk_username == 1 || chk_name == 1) {
            $('#cf_btn').prop('disabled', true);
        } else {
            $('#cf_btn').prop('disabled', false);
        }
        if (chk_gov_name == 1) {
                $('#cf_btn').prop('disabled', true);
            } else {
                $('#cf_btn').prop('disabled', false);
            }
    }
    function SelectGovernment() {
  $.ajax({
        url: "pages/select_gov.php",
        type: "post",
        data: {
            'txtProvinceId': $("#us_province").val()
        }
    }).done(function(response) {
        $("#us_gov_id").html(response)
    });
    }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="dist/js/bootstrap-select.js"></script>
    <!-- Footer -->
    <?php include("footer.php"); ?>
</div>