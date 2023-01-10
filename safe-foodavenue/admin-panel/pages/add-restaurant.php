<?php
    // get restaurant category
    $sql = " SELECT * FROM `sfa_res_category`";
    $arr_res_category = mysqli_query($con, $sql);

    // get entrepreneur
    $sql = "SELECT * FROM `sfa_entrepreneur`";
    $arr_entrepreneur = mysqli_query($con, $sql);
?>

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">เพิ่มร้านอาหาร</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">เพิ่มร้านอาหาร</li>
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
            <div class="card border-0 p-3">
                <form action="./php/action-add-restaurant.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- ชื่อเข้าของร้านอาหาร -->
                        <div class="col-md-4 mt-3">
                            <label for="res_ent_id" class="required">ชื่อเจ้าของร้านอาหาร</label>
                            <select name="res_ent_id" id="res_ent_id" class="select2 form-control" required>
                                <option value="" selected disabled>เลือกเจ้าของร้านอาหาร</option>
                                <?php while ($obj_entrepreneur = mysqli_fetch_array($arr_entrepreneur)) { ?>
                                <option value="<?= $obj_entrepreneur["ent_id"] ?>">
                                    <?= $obj_entrepreneur["ent_firstname"] . " " . $obj_entrepreneur["ent_lastname"] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <!-- ชื่อร้านอาหาร -->
                        <div class="col-md-4 mt-3">
                            <label class="required" for="res_title">ชื่อร้านอาหาร</label>
                            <input type="text" id="res_title" name="res_title" class="form-control" placeholder="ใส่ชื่อร้านอาหาร" oninput="check_name_restaurant()" required>
                            <span id="status_res_title"></span>
                        </div>

                        <!-- หมวดหมู่ร้านอาหาร -->
                        <div class="col-md-4 mt-3">
                            <label for="res_cat_id" class="required">หมวดหมู่</label>
                            <select name="res_cat_id" id="res_cat_id" class="select2 form-control" required>
                                <option value="" selected disabled>เลือกหมวดหมู่</option>
                                <?php while ($obj_res_category = mysqli_fetch_array($arr_res_category)) { ?>
                                <option value="<?= $obj_res_category["res_cat_id"] ?>">
                                    <?= $obj_res_category["res_cat_title"] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row pb-4">
                        <div class="col-md mt-3">
                            <label for="res_description" class="required">รายละเอียดร้านอาหาร</label>
                            <textarea id="res_description" name="res_description" class="form-control" rows="3" placeholder="ใส่รายละเอียดร้านอาหาร" required></textarea>
                        </div>

                        <div class="col-md mt-3">
                            <div class="mb-2">
                                <label for="file_input" class="form-label">รูปภาพประกอบสถานที่</label>
                                <input class="form-control" type="file" id="file_input" name="file_input" onchange="preview()">
                            </div>
                            <img id="frame" src="" class="img-fluid img-thumbnail rounded" width=200 hidden>
                        </div>
                    </div>

                    <h3>ที่ตั้งร้าน</h3>
                    <div class="row">
                        <!-- เลขที่ -->
                        <div class="col-md-4">
                            <label for="res_address">เลขที่</label>
                            <input class="form-control" id="res_address" type="text" placeholder="เลขที่ หมูบ้าน (ถ้ามี)" name="res_address" oninput="enable_same_as_address(); not_require_zone_block();">
                        </div>
                    </div>

                    <div class="row">
                        <!-- รหัสไปรษณีย์ -->
                        <div class="col-md-3 mt-3">
                            <label for="zip_code" class="required">รหัสไปรษณีย์</label>
                            <input class="form-control" id="zip_code" type="number" required placeholder="รหัสไปรษณีย์" oninput="get_districts('zip_code')">
                        </div>

                        <!-- ตำบล -->
                        <div class="col-md-3 mt-3">
                            <label for="res_district_id" class="required">ตำบล</label>
                            <select class="select2 form-control" id="res_district_id" required name="res_district_id">
                                <option value="" disabled selected>ตำบล</option>
                            </select>
                        </div>

                        <!-- อำเภอ -->
                        <div class="col-md-3 mt-3">
                            <label for="res_amphure_id" class="required">อำเภอ</label>
                            <select class="select2 form-control" id="res_amphure_id">
                                <option value="" disabled selected>อำเภอ</option>
                            </select>
                        </div>

                        <!-- จังหวัด -->
                        <div class="col-md-3 mt-3">
                            <label for="res_province_id" class="required">จังหวัด</label>
                            <select class="select2 form-control" id="res_province_id">
                                <option value="" disabled selected>จังหวัด</option>
                            </select>
                        </div>
                    </div>

                    <div class="row pb-4">
                        <!-- องค์กรปกครองส่วนท้องถิ่น -->
                        <div class="col-md-3 mt-3">
                            <label for="res_gov_id" class="required">องค์กรปกครองส่วนท้องถิ่น</label>
                            <select class="select2 form-control" id="res_gov_id" name="res_gov_id" oninput="get_zone()" required>
                                <option value="" disabled selected>องค์กรปกครองส่วนท้องถิ่น</option>
                            </select>
                        </div>
                                    
                        <!-- โซนร้านอาหาร -->
                        <div class="col-md-3 mt-3">
                            <label for="res_zone_id" id="res_zone_id_label" class="required">โซนร้านอาหาร</label>
                            <select class="select2 form-control" id="res_zone_id" name="res_zone_id" oninput="get_block(); check_name_restaurant();" required>
                                <option value="" disabled selected>โซน (จำเป็น ถ้าไม่มีเลขที่ร้าน)</option>
                            </select>
                        </div>
                        
                        <!-- ล็อก -->
                        <div class="col-md-3 mt-3">
                            <label for="res_block_id" id="res_block_id_label" class="required">ล็อก</label>
                            <select class="select2 form-control" id="res_block_id" name="res_block_id" required>
                                <option value="" disabled selected>ล็อก (จำเป็น ถ้าไม่มีเลขที่ร้าน)</option>
                            </select>
                        </div>  
                    </div>

                    <h3>ที่อยู่รับเอกสาร</h3>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="same_as_address" name="same_as_address" onclick="check_same_as_address()" disabled>
                        <label class="form-check-label" for="same_as_address">ที่เดียวกับที่ตั้งร้าน (ต้องกรอกเลขที่ร้าน)</label>
                    </div>
                    <div id="address_2_div">
                        <div class="row">
                            <!-- เลขที่ -->
                            <div class="col-md-4 mt-3">
                                <label for="res_block_id" class="required">เลขที่</label>
                                <input class="form-control" id="res_address_2" type="text" name="res_address_2" placeholder="เลขที่ หมูบ้าน" required>
                            </div>
                        </div>
                        <div class="row">
                            <!-- รหัสไปรษณีย์ -->
                            <div class="col-md-3 mt-3">
                                <label for="zip_code" class="required">รหัสไปรษณีย์</label>
                                <input class="form-control" id="zip_code_2" type="number" placeholder="รหัสไปรษณีย์" required oninput="get_districts('zip_code_2')">
                            </div>

                            <!-- ตำบล -->
                            <div class="col-md-3 mt-3">
                                <label for="res_district_id" class="required">ตำบล</label>
                                <select class="select2 form-control" id="res_district_id_2" name="res_district_id_2" required>
                                    <option value="" disabled selected>ตำบล</option>
                                </select>
                            </div>

                            <!-- อำเภอ -->
                            <div class="col-md-3 mt-3">
                                <label for="res_amphure_id" class="required">อำเภอ</label>
                                <select class="select2 form-control" id="res_amphure_id_2">
                                    <option value="" disabled selected>อำเภอ</option>
                                </select>
                            </div>

                            <!-- จังหวัด -->
                            <div class="col-md-3 mt-3">
                                <label for="res_province_id" class="required">จังหวัด</label>
                                <select class="select2 form-control" id="res_province_id_2">
                                    <option value="" disabled selected>จังหวัด</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br />
                    <!-- ปุ่มบันทึกและปุ่มยกเลิก -->
                    <div class="row pb-4" style="position: relative;">
                        <div class="col-md-4">
                            <input type="submit" id="cf_btn" class="btn btn-success" value="บันทึก">
                            <input type="reset" class="btn btn-secondary" value="ยกเลิก" onclick="location.href='./?content=list-restaurant'">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  
    <script>
        var chk_res_title = 1;
        function get_districts(zip_code_id = 'zip_code') {
            var res_district_id = 'res_district_id';
            var res_amphure_id = 'res_amphure_id';
            var res_province_id = 'res_province_id';
            var res_gov_id = 'res_gov_id';
            if (zip_code_id == 'zip_code_2') {
                res_district_id = 'res_district_id_2';
                res_amphure_id = 'res_amphure_id_2';
                res_province_id = 'res_province_id_2';
                res_gov_id = 'res_gov_id_2';
            }
            jQuery.ajax({
                dataType: "json",
                url: "<?php echo "get_location.php" ?>",
                data: 'zip_code=' + $("#" + zip_code_id).val(),
                type: "POST",
                success: function(objLocation) {
                    if (objLocation != "no output") {
                        show_district_dropdown(objLocation['arrDistrict'], res_district_id);
                        show_amphure_dropdown(objLocation['amphure'], res_amphure_id);
                        show_province_dropdown(objLocation['province'], res_province_id);
                        show_government_dropdown(objLocation['arrGovernment'], res_gov_id);
                    } else {
                        clear_district_dropdown(res_district_id, res_district_id);
                        clear_amphure_dropdown(res_amphure_id, res_amphure_id);
                        clear_province_dropdown(res_province_id, res_province_id);
                        if (zip_code_id == 'zip_code') {
                            clear_government_dropdown(res_gov_id, res_gov_id);
                            if ($("#res_address").val() != "") {
                                clear_zone_dropdown_not_require();
                                clear_block_dropdown_not_require();
                            } else {
                                clear_zone_dropdown();
                                clear_block_dropdown();
                            }
                        }
                    }
                },
                error: function() {}
            });
        }

        function show_district_dropdown(arrDistrict, res_district_id) {
            for(var i = 0; i < arrDistrict.length; i++) {
                option = '<option value="' + arrDistrict[i]['district_id'] + '">' + arrDistrict[i]['district_name'] + '</option>'
                $("#" + res_district_id).append(option);
            }
        }

        function show_amphure_dropdown(amphure_name, res_amphure_id) {
            var option = '<option value="" disabled selected>' + amphure_name + '</option>';
            $("#" + res_amphure_id).html(option);
        }

        function show_province_dropdown(province_name, res_province_id) {
            var option = '<option value="" disabled selected>' + province_name + '</option>';
            $("#" + res_province_id).html(option);
        }

        function show_government_dropdown(arr_government, res_gov_id) {
            for(var i = 0; i < arr_government.length; i++) {
                option = '<option value="' + arr_government[i]['gov_id'] + '">' + arr_government[i]['gov_name'] + '</option>'
                $("#" + res_gov_id).append(option);
            }
        }

        function clear_district_dropdown(res_district_id) {
            var option = '<option value="" disabled selected>ตำบล</option>';
            $("#" + res_district_id).html(option);
        }

        function clear_amphure_dropdown(res_amphure_id) {
            var option = '<option value="" disabled selected>อำเภอ</option>';
            $("#" + res_amphure_id).html(option);
        }

        function clear_province_dropdown(res_province_id) {
            var option = '<option value="" disabled selected>จังหวัด</option>';
            $("#" + res_province_id).html(option);
        }

        function clear_government_dropdown() {
            var option = '<option value="" disabled selected>องค์กรปกครองส่วนท้องถิ่น</option>';
            $("#res_gov_id").html(option);
        }

        function get_zone() {
            jQuery.ajax({
                dataType: "json",
                url: "<?php echo "get_location.php" ?>",
                data: 'gov_id=' + $("#res_gov_id").val(),
                type: "POST",
                success: function(arr_zone) {
                    if (arr_zone != "no output") {
                        if ($("#res_address").val() != "") {
                            clear_zone_dropdown_not_require();
                            clear_block_dropdown_not_require();
                        } else {
                            clear_zone_dropdown();
                            clear_block_dropdown();
                        }
                        show_zone_dropdown(arr_zone);
                    } else {
                        if ($("#res_address").val() != "") {
                            clear_zone_dropdown_not_require();
                            clear_block_dropdown_not_require();
                        } else {
                            clear_zone_dropdown();
                            clear_block_dropdown();
                        }
                    }
                },
                error: function() {}
            });
        }

        function get_block() {
            if ($("#res_zone_id").val() == "") {
                if ($("#res_address").val() != "") {
                    clear_block_dropdown_not_require();
                } else {
                    clear_block_dropdown();
                }
            } else {
                jQuery.ajax({
                    dataType: "json",
                    url: "<?php echo "get_location.php" ?>",
                    data: 'zone_id=' + $("#res_zone_id").val(),
                    type: "POST",
                    success: function(arr_block) {
                        console.log(arr_block);
                        if (arr_block != "no output") {
                            if ($("#res_address").val() != "") {
                                clear_block_dropdown_not_require();
                            } else {
                                clear_block_dropdown();
                            }
                            show_block_dropdown(arr_block);
                        } else {
                            if ($("#res_address").val() != "") {
                                clear_block_dropdown_not_require();
                            } else {
                                clear_block_dropdown();
                            }
                        }
                    },
                    error: function() {}
                });
            }
        }

        function show_zone_dropdown(arr_zone) {
            for(var i = 0; i < arr_zone.length; i++) {
                option = '<option value="' + arr_zone[i]['zone_id'] + '">' + arr_zone[i]['zone_title'] + '</option>'
                $("#res_zone_id").append(option);
            }
        }

        function show_block_dropdown(arr_block) {
            for(var i = 0; i < arr_block.length; i++) {
                option = '<option value="' + arr_block[i]['block_id'] + '">' + arr_block[i]['block_title'] + '</option>'
                $("#res_block_id").append(option);
            }
        }

        function clear_zone_dropdown() {
            var option = '<option value="" disabled selected>โซน (จำเป็น ถ้าไม่มีเลขที่ร้าน)</option>';
            $("#res_zone_id").html(option);
        }

        function clear_block_dropdown() {
            var option = '<option value="" disabled selected>ล็อก (จำเป็น ถ้าไม่มีเลขที่ร้าน)</option>';
            $("#res_block_id").html(option);
        }

        function clear_zone_dropdown_not_require() {
            var option = '<option value="" selected>โซน (ถ้ามี)</option>';
            $("#res_zone_id").html(option);
        }

        function clear_block_dropdown_not_require() {
            var option = '<option value="" selected>ล็อก (ถ้ามี)</option>';
            $("#res_block_id").html(option);
        }

        function check_same_as_address() {
            var is_check = $("#same_as_address")[0].checked;
            if (is_check) {
                $("#address_2_div").slideUp();
                $("#res_address_2").prop("required", false);
                $("#zip_code_2").prop("required", false);
                $("#res_district_id_2").prop("required", false);
            } else {
                $("#address_2_div").slideDown();
                $("#res_address_2").prop("required", true);
                $("#zip_code_2").prop("required", true);
                $("#res_district_id_2").prop("required", true);
            }
        }
        function enable_same_as_address() {
            if ($("#res_address").val() != "") {
                $('#same_as_address').prop('disabled', false);
            } else {
                $('#same_as_address').prop('checked', false);
                $('#same_as_address').prop('disabled', true);
            }
            check_same_as_address();
        }

        function not_require_zone_block() {
            if ($("#res_address").val() != "") {
                console.log("not required zone block");
                console.log("zone_id : " + $("#res_zone_id").val());
                if ($("#res_zone_id").val() == null) {
                    clear_zone_dropdown_not_require();
                }
                if ($("#res_block_id").val() == null) {
                    clear_block_dropdown_not_require();
                }

                $("#res_zone_id_label").removeClass("required");
                $("#res_block_id_label").removeClass("required");
                $("#res_zone_id").prop("required", false);
                $("#res_block_id").prop("required", false);
            } else {
                console.log("required zone block");
                if ($("#res_zone_id").val() == null) {
                    clear_zone_dropdown();
                }
                if ($("#res_block_id").val() == null) {
                    clear_block_dropdown();
                }

                $("#res_zone_id_label").addClass("required");
                $("#res_block_id_label").addClass("required");
                $("#res_zone_id").prop("required", true);
                $("#res_block_id").prop("required", true);
            }
        }
        
        function check_name_restaurant() {
            jQuery.ajax({
                dataType: "json",
                url: "<?php echo "check_name.php" ?>",
                data: {
                    res_title: $("#res_title").val(),
                    zone_id: $("#res_zone_id").val(),
                },
                type: "POST",
                success: function(status) {
                    console.log(status);
                    if (status != "duplicate") {
                        $("#status_res_title").html("<span style='color:green'>ชื่อร้านอาหารนี้สามารถใช้งานได้</span>");
                        chk_res_title = 0;
                    } else {
                        $("#status_res_title").html("<span style='color:red'>ชื่อร้านอาหารนี้ ซ้ำกับร้านอาหารในโซนเดียวกัน</span>");
                        chk_res_title = 1;
                    }
                    check_btn_submit();
                },
                error: function() {
                    $("#status_res_title").html("");
                    chk_res_title = 1;
                },
                always: function() {
                    check_btn_submit();
                }
            });
        }

        function check_btn_submit() {
            if (chk_res_title == 1) {
                $('#cf_btn').prop('disabled', true);
            } else {
                $('#cf_btn').prop('disabled', false);
            }
        }

        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
            frame.removeAttribute("hidden");
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="dist/js/bootstrap-select.js"></script>
    <!-- Footer -->
    <?php include("footer.php"); ?>
</div>