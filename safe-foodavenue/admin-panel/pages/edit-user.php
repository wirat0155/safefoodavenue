<!-- 
/*
* edit-user
* edit-user
* @input  prefix, firstname, lastname, role, username ,password
* @output form edit user
* @author Benjapon Kasikitwasuntara
* @Create Date 2565-08-08
*/ 
-->
<style>
.required:after {
    color: red;
    content: ' *';
    display: inline;
}

.required {
    color: blue;
}
</style>


<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">เเก้ไขบัญชีผู้ใช้งาน</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">เเก้ไขบัญชีผู้ใช้งาน</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    // user id to be edited
    $user_id = $_GET["us_id"];

    // get array of prefix
    $sql = "SELECT * FROM sfa_prefix";
    $arrPrefix = mysqli_query($con, $sql);

    // get array of role
    $sql = "SELECT * FROM sfa_role";
    $arrRole = mysqli_query($con, $sql);

    // get user object
    $sql = "SELECT * FROM sfa_user WHERE us_id = " . $user_id;
    $dbUser = mysqli_query($con, $sql);
    $user_data = mysqli_fetch_array($dbUser);
?>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card border-0">
                <div class="table-responsive py-4 px-4">

                    <form action="./php/action-edit-user.php" method="POST" enctype="multipart/form-data">
                        <input type="text" name="us_id" value="<?php echo $user_data["us_id"] ?>" hidden>
                        <div class="row">
                            <div class="col-md-2 pb-4">
                                <label for="prefix" class="required">คำนำหน้า</label>
                                <select name="us_pref_id" class="form-control" value="<?php echo $user_data["us_pref_id"] ?>">
                                    <option value="" disabled selected>คำนำหน้า</option>
                                    <?php 
                                    while ($objPrefix = mysqli_fetch_array($arrPrefix)) { ?>
                                    <?php $selected = $user_data["us_pref_id"] == $objPrefix["pref_id"] ? "selected" : ""; ?>
                                    <option value="<?= $objPrefix["pref_id"] ?>" <?= $selected ?>>
                                        <?= $objPrefix["pref_title"] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4" class="required">
                                <label for="first_name" class="required">ชื่อจริง</label>
                                <input type="text" id="us_fname" name="us_fname" class="form-control" placeholder="ใส่ชื่อจริง" oninput="check_name()" value="<?php echo $user_data["us_fname"] ?>" required>
                                <span style='color:red' id="status_fname"></span>
                            </div>
                            <div class="col-md-4">
                                <label for="last_name" class="required">นามสกุล</label>
                                <input type="text" id="us_lname" name="us_lname" class="form-control" placeholder="ใส่นามสกุล" oninput="check_name()" value="<?php echo $user_data["us_lname"] ?>" required>
                                <span style='color:red' id=" status_lname"></span>
                            </div>

                            <!-- ประเภทผู้ใช้งาน -->
                            <div class="col-md-3">
                                <label for="role_id" class="required">ประเภทผู้ใช้งาน</label>
                                <select name="role_id" id="role_id" class="form-control" required>
                                    <option value="" selected disabled>เลือกประเภทผู้ใช้งาน</option>
                                    <?php 
                                    while ($objRole = mysqli_fetch_array($arrRole)) { ?>
                                    <?php $selected = $user_data["us_role_id"] == $objRole["role_id"] ? "selected" : ""; ?>
                                    <option value="<?= $objRole["role_id"] ?>" <?= $selected ?>>
                                        <?= $objRole["role_title"] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <b style="font-size: 20px;">สร้างบัญชีผู้ใช้</b>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="username" class="required">ชื่อผู้ใช้งาน</label>
                                <input type="text" id="us_username" name="us_username" class="form-control" placeholder="ชื่อผู้ใช้งาน" oninput="check_name_username()" value="<?php echo $user_data["us_username"] ?>" required>
                                <span style='color:red' id="status_username"></span>
                            </div>
                        </div>
                        
                        <br />
                        <p>ถ้าไม่กรอกรหัส ระบบจะใช้รหัสผ่านเดิม</p>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="password">รหัสผ่าน</label>
                                <input type="password" id="us_password" name="us_password" minlength="8" class="form-control" placeholder="รหัสผ่านอย่างน้อย 8 ตัวอักษร" onkeyup="confirm_pass()">
                            </div>
                            <div class=" col-md-4">
                                <label for="confirm_password">ยืนยันรหัสผ่าน</label>
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="ยืนยันรหัสผ่าน" onkeyup="confirm_pass()">
                                <span style='color:red' id="invalid_password"></span>
                            </div>

                        </div>
                        <br>
                        <div class="row pb-4" style="position: relative;">
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-warning" id="cf_btn" value="แก้ไขบัญชี">
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
    /*
     * check_name_restaurant
     * check name restaurant that have in database
     * @input 
     * @output 
     * @author Nantasiri Saiwaew
     * @Create Date 2565-06-29
     */
    // เช็คชื่อผู้ใช้งานซ้ำหรือไม่
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

    // function check_fname_lname() {
    //     var fl_name = {
    //         "us_fname": "$('#us_fname').val()",
    //         "us_lname": "$('#us_lname').val()"
    //     }
    //     jQuery.ajax({
    //         url: "<?php echo "check_name.php" ?>",
    //         data: fl_name,
    //         type: "POST",
    //         success: function(data) {
    //             $("#status_fname_lname").html(data);
    //       
    //         },
    //         error: function() {}
    //     });
    // }

    // function check_fname() {
    //     jQuery.ajax({
    //         url: "<?php echo "check_name.php" ?>",
    //         data: 'us_fname=' + $("#us_fname").val(),
    //         type: "POST",
    //         success: function(data) {
    //             $("#status_fname").html(data);
    //         },
    //         error: function() {}
    //     });
    // }

    // function check_lname() {
    //     jQuery.ajax({
    //         url: "<?php echo "check_name.php" ?>",
    //         data: 'us_lname=' + $("#us_lname").val(),
    //         type: "POST",
    //         success: function(data) {
    //             $("#status_lname").html(data);
    //         },
    //         error: function() {}
    //     });
    // }

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
    /*
     * 
     * confirm_password
     * alert confirm_password not match passwords
     *@input password
     *@parameter -
     *output  checkconfirm_password
     *@author Thanisorn thumsawanit 62160088
     *@Create Date 2564-07-31
     *@update Date 2564-09-20
     */
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
    }
    </script>

    <!-- Footer -->
    <?php include("footer.php"); ?>
</div>