<?php
    $res_id = $_GET["res_id"];

    // get restaurant category
    $sql = "SELECT * FROM `sfa_res_category`";
    $arr_res_category = mysqli_query($con, $sql);

    // get entrepreneur
    $sql = "SELECT * FROM `sfa_entrepreneur`";
    $arr_entrepreneur = mysqli_query($con, $sql);

    // get restaurant data
    $sql = "SELECT * FROM  `sfa_restaurant` 
            LEFT JOIN `sfa_block` ON  `sfa_restaurant`.`res_block_id` = `sfa_block`.`block_id`
            WHERE `sfa_restaurant`.`res_id` = '" . $res_id . "'";
    $arr_restaurant = mysqli_query($con, $sql);
    $obj_restaurant = mysqli_fetch_assoc($arr_restaurant);

    // echo "<pre>";
    // print_r($obj_restaurant);
    // echo "</pre>";
    // exit;
    // get zip code by res_districts_id
    $sql = "SELECT * FROM `th_districts` WHERE `th_districts`.`id` = '" . $obj_restaurant["res_district_id"] ."'";
    $arr_district = mysqli_query($con, $sql);
    $obj_district = mysqli_fetch_assoc($arr_district);
    $amphure_id = $obj_district["amphure_id"];
    $zip_code = $obj_district["zip_code"];

    // get district by zip_code
    $sql = "SELECT * FROM `th_districts` WHERE `th_districts`.`zip_code` = '" . $zip_code . "'";
    $arr_district = mysqli_query($con, $sql);


    // get amphure
    $sql = "SELECT * FROM `th_amphures` WHERE `th_amphures`.`id` = '" . $amphure_id . "'";
    $arr_amphure = mysqli_query($con, $sql);
    $obj_amphure = mysqli_fetch_assoc($arr_amphure);
    $province_id = $obj_amphure["province_id"];

    // get province
    $sql = "SELECT * FROM `th_provinces` WHERE `th_provinces`.`id` = '" . $province_id . "'";
    $arr_province = mysqli_query($con, $sql);
    $obj_province = mysqli_fetch_assoc($arr_province);

    // get government
    $sql = "SELECT * FROM `sfa_government` WHERE `sfa_government`.`gov_province_id` ='" . $province_id . "'";
    $arr_government = mysqli_query($con, $sql);

    // get zone
    $sql = "SELECT * FROM `sfa_zone` WHERE `sfa_zone`.`zone_gov_id` = '" . $obj_restaurant["res_gov_id"] . "'";
    $arr_zone = mysqli_query($con, $sql);

    $sql = "SELECT * FROM `sfa_block` WHERE `sfa_block`.`block_zone_id` = '" . $obj_restaurant["res_zone_id"] . "'";
    $arr_block = mysqli_query($con, $sql);

    $sql = "SELECT * FROM `sfa_document_location` WHERE `sfa_document_location`.`doc_loc_res_id` = '" . $obj_restaurant["res_id"] . "'";
    $arr_doc_loc = mysqli_query($con, $sql);
    $obj_doc_loc = mysqli_fetch_assoc($arr_doc_loc);
    $doc_loc_address = $obj_doc_loc["doc_loc_address"];
    $doc_loc_district_id = $obj_doc_loc["doc_loc_district_id"];

    $sql = "SELECT * FROM `th_districts` WHERE `th_districts`.`id` = '" . $doc_loc_district_id . "'";
    $arr_doc_loc_district = mysqli_query($con, $sql);
    $obj_doc_loc_district = mysqli_fetch_assoc($arr_doc_loc_district);
    $doc_loc_zip_code = $obj_doc_loc_district["zip_code"];
    $doc_loc_amphure_id = $obj_doc_loc_district["amphure_id"];

    $sql = "SELECT * FROM `th_districts` WHERE `th_districts`.`zip_code` = '" . $doc_loc_zip_code . "'";
    $arr_doc_loc_district = mysqli_query($con, $sql);

    $sql = "SELECT * FROM `th_amphures` WHERE `th_amphures`.`id` = '" . $doc_loc_amphure_id . "'";
    $arr_doc_loc_amphure = mysqli_query($con, $sql);
    $obj_doc_loc_amphure = mysqli_fetch_assoc($arr_doc_loc_amphure);
    $doc_loc_province_id = $obj_doc_loc_amphure["province_id"];

    $sql = "SELECT * FROM `th_provinces` WHERE `th_provinces`.`id` = '" . $doc_loc_province_id . "'";
    $arr_doc_loc_province = mysqli_query($con, $sql);
    $obj_doc_loc_province = mysqli_fetch_assoc($arr_doc_loc_province);

    function getRestaurantImg($con, $res_id){
        //get restaurant image from database
        $sql = "SELECT * FROM `sfa_res_image` WHERE `res_img_res_id` = '". $res_id . "'";
        $arr_res_img = mysqli_query($con, $sql);
        if (mysqli_num_rows($arr_res_img) == 0) {
            return "";
        }
        $obj_res_img = mysqli_fetch_array($arr_res_img);
        return $obj_res_img["res_img_path"];
    }

    function getResImgPath($imgPath){
        if ($imgPath) {
            return "./php/uploads/img/" . $imgPath;
        } else {
            return "./php/uploads/img/restaurant.png";
        }
    }

    $resImg = getRestaurantImg($con, $res_id);
?>

<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">แก้ไขข้อมูลร้านอาหาร</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">แก้ไขข้อมูลร้านอาหาร</li>
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
                    <form action="./php/action-edit-restaurant.php" method="POST" enctype="multipart/form-data">
                        <input type="text" name="res_id" value="<?php echo $obj_restaurant["res_id"] ?>" hidden>
                        <div class="row">
                            <!-- ชื่อเข้าของร้านอาหาร -->
                            <div class="col-md-4">
                                <input name="res_id" id="res_id" value="<?php echo $obj_restaurant["res_id"] ?>" readonly hidden>
                                <label for="res_ent_id" class="required">ชื่อเจ้าของร้านอาหาร</label>
                                <select name="res_ent_id" id="res_ent_id" class="select2 form-control" required>
                                    <option value="" selected disabled>เลือกเจ้าของร้านอาหาร</option>
                                    <?php 
                                    while ($obj_entrepreneur = mysqli_fetch_array($arr_entrepreneur)) {
                                    $selected = $obj_restaurant["res_ent_id"] == $obj_entrepreneur["ent_id"] ? "selected" : "";
                                    ?>
                                    <option value="<?php echo $obj_entrepreneur["ent_id"] ?>" <?php echo $selected ?>>
                                        <?php echo $obj_entrepreneur["ent_firstname"] . " " . $obj_entrepreneur["ent_lastname"] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!-- ชื่อร้านอาหาร -->
                            <div class="col-md-4">
                                <label class="required" for="res_title">ชื่อร้านอาหาร</label>
                                <input type="text" id="res_title" name="res_title" class="form-control" placeholder="ใส่ชื่อร้านอาหาร" value="<?php echo $obj_restaurant["res_title"] ?>" required>
                                <span id="status_res_title"></span>
                            </div>

                            <!-- หมวดหมู่ร้านอาหาร -->
                            <div class="col-md-4">
                                <label for="res_cat_id" class="required">หมวดหมู่</label>
                                <select name="res_cat_id" id="res_cat_id" class="select2 form-control" required>
                                    <option value="" selected disabled>เลือกหมวดหมู่</option>
                                    <?php while ($obj_res_category = mysqli_fetch_array($arr_res_category)) { 
                                    $selected = $obj_restaurant["res_cat_id"] == $obj_res_category["res_cat_id"] ? "selected" : "";
                                    ?>
                                    <option value="<?php echo $obj_res_category["res_cat_id"] ?>" <?php echo $selected ?>>
                                        <?php echo $obj_res_category["res_cat_title"] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="row pb-4">
                            <div class="col-md">
                                <label for="res_description" class="required">รายละเอียดร้านอาหาร</label>
                                <textarea id="res_description" name="res_description" class="form-control" rows="3" placeholder="ใส่รายละเอียดร้านอาหาร" required><?php echo $obj_restaurant["res_description"]?></textarea>
                            </div>

                            <div class="col-md">
                                <div class="mb-2">
                                    <label for="file_input" class="form-label">รูปภาพประกอบสถานที่</label>
                                    <input class="form-control" type="file" id="file_input" name="file_input" onchange="preview()">
                                </div>
                                <img id="frame" src="<?php echo getResImgPath($resImg) ?>" class="img-fluid img-thumbnail rounded" width=200 >
                            </div>
                        </div>

                        <h3>ที่ตั้งร้าน</h3>
                        <div class="row pb-4">
                            <!-- เลขที่ -->
                            <div class="col-md-4">
                                <label for="res_block_id">เลขที่</label>
                                <input class="form-control" id="res_address" type="text" placeholder="เลขที่ หมูบ้าน (ถ้ามี)" name="res_address" value="<?php echo $obj_restaurant["res_address"]?>" oninput="enable_same_as_address()">
                            </div>
                        </div>

                        <div class="row pb-4">
                            <!-- รหัสไปรษณีย์ -->
                            <div class="col-md-3">
                                <label for="zip_code" class="required">รหัสไปรษณีย์</label>
                                <input class="form-control" id="zip_code" type="number" value="<?php echo $zip_code ?>" required placeholder="รหัสไปรษณีย์" oninput="get_districts('zip_code')">
                            </div>

                            <!-- ตำบล -->
                            <div class="col-md-3">
                                <label for="res_district_id" class="required">ตำบล</label>
                                <select class="select2 form-control" id="res_district_id" required name="res_district_id">
                                    <option value="" disabled selected>ตำบล</option>
                                    <?php while ($obj_district = mysqli_fetch_array($arr_district)) { 
                                    $selected = $obj_restaurant["res_district_id"] == $obj_district["id"] ? "selected" : "";
                                    ?>
                                    <option value="<?php echo $obj_district["id"] ?>" <?php echo $selected ?>>
                                        <?php echo $obj_district["name_th"] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!-- อำเภอ -->
                            <div class="col-md-3">
                                <label for="res_amphure_id" class="required">อำเภอ</label>
                                <select class="select2 form-control" id="res_amphure_id">
                                    <option value="" disabled selected>อำเภอ</option>
                                    <option value="<?php echo $obj_amphure["id"]?>" selected><?php echo $obj_amphure["name_th"]?></option>
                                </select>
                            </div>

                            <!-- จังหวัด -->
                            <div class="col-md-3">
                                <label for="res_province_id" class="required">จังหวัด</label>
                                <select class="select2 form-control" id="res_province_id">
                                    <option value="" disabled selected>จังหวัด</option>
                                    <option value="<?php echo $obj_province["id"]?>" selected><?php echo $obj_province["name_th"]?></option>
                                </select>
                            </div>
                        </div>

                        <div class="row pb-4">
                            <!-- องค์กรปกครองส่วนท้องถิ่น -->
                            <div class="col-md-3">
                                <label for="res_gov_id" class="required">องค์กรปกครองส่วนท้องถิ่น</label>
                                <select class="select2 form-control" id="res_gov_id" name="res_gov_id" oninput="get_zone()" required>
                                    <option value="" disabled selected>องค์กรปกครองส่วนท้องถิ่น</option>
                                    <?php while ($obj_government = mysqli_fetch_array($arr_government)) { 
                                    $selected = $obj_restaurant["res_gov_id"] == $obj_government["gov_id"] ? "selected" : "";
                                    ?>
                                    <option value="<?php echo $obj_government["gov_id"] ?>" <?php echo $selected ?>>
                                        <?php echo $obj_government["gov_name"] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!-- โซนร้านอาหาร -->
                            <div class="col-md-3">
                                <label for="res_zone_id" class="required">โซนร้านอาหาร</label>
                                <select class="select2 form-control" id="res_zone_id" name="res_zone_id" oninput="get_block(); check_name_restaurant();" required>
                                    <option value="" disabled selected>โซนร้านอาหาร</option>
                                    <?php while ($obj_zone = mysqli_fetch_array($arr_zone)) { 
                                    $selected = $obj_restaurant["res_zone_id"] == $obj_zone["zone_id"] ? "selected" : "";
                                    ?>
                                    <option value="<?php echo $obj_zone["zone_id"] ?>" <?php echo $selected ?>>
                                        <?php echo $obj_zone["zone_title"] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!-- ล็อก -->
                            <div class="col-md-3">
                                <label for="res_block_id">ล็อก</label>
                                <select class="select2 form-control" id="res_block_id" name="res_block_id">
                                    <option value="" selected>ล็อก (ถ้ามี)</option>
                                    <?php while ($obj_block = mysqli_fetch_array($arr_block)) { 
                                    $selected = $obj_restaurant["res_block_id"] == $obj_block["block_id"] ? "selected" : "";
                                    ?>
                                    <option value="<?php echo $obj_block["block_id"] ?>" <?php echo $selected ?>>
                                        <?php echo $obj_block["block_title"] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <h3>ที่อยู่รับเอกสาร</h3>
                        <div class="form-check form-check-inline mb-3">
                            <input class="form-check-input" type="checkbox" id="same_as_address" name="same_as_address" onclick="check_same_as_address()" <?php echo $obj_restaurant["res_address"] == ""? "disabled" : "" ?>>
                            <label class="form-check-label" for="same_as_address">ที่เดียวกับที่ตั้งร้าน (ต้องกรอกเลขที่ร้าน)</label>
                        </div>

                        <div id="address_2_div">
                            <div class="row pb-4">
                                <!-- เลขที่ -->
                                <div class="col-md-4">
                                    <label for="res_block_id" class="required">เลขที่</label>
                                    <input class="form-control" id="res_address_2" type="text" name="res_address_2" placeholder="เลขที่ หมูบ้าน" value="<?php echo $doc_loc_address ?>" required>
                                </div>
                            </div>

                            <div class="row pb-4">
                                <!-- รหัสไปรษณีย์ -->
                                <div class="col-md-3">
                                    <label for="zip_code" class="required">รหัสไปรษณีย์</label>
                                    <input class="form-control" id="zip_code_2" type="number" placeholder="รหัสไปรษณีย์" value="<?php echo $doc_loc_zip_code ?>" required oninput="get_districts('zip_code_2')">
                                </div>

                                <!-- ตำบล -->
                                <div class="col-md-3">
                                    <label for="res_district_id" class="required">ตำบล</label>
                                    <select class="select2 form-control" id="res_district_id_2" name="res_district_id_2" required>
                                        <option value="" disabled selected>ตำบล</option>
                                        <?php while ($obj_doc_loc_district = mysqli_fetch_array($arr_doc_loc_district)) { 
                                        $selected = $doc_loc_district_id == $obj_doc_loc_district["id"] ? "selected" : "";
                                        ?>
                                        <option value="<?php echo $obj_doc_loc_district["id"] ?>" <?php echo $selected ?>>
                                            <?php echo $obj_doc_loc_district["name_th"] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <!-- อำเภอ -->
                                <div class="col-md-3">
                                    <label for="res_amphure_id" class="required">อำเภอ</label>
                                    <select class="select2 form-control" id="res_amphure_id_2">
                                        <option value="" disabled selected>อำเภอ</option>
                                        <option value="<?php echo $obj_doc_loc_amphure["id"]?>" selected><?php echo $obj_doc_loc_amphure["name_th"]?></option>
                                    </select>
                                </div>

                                <!-- จังหวัด -->
                                <div class="col-md-3">
                                    <label for="res_province_id" class="required">จังหวัด</label>
                                    <select class="select2 form-control" id="res_province_id_2">
                                        <option value="" disabled selected>จังหวัด</option>
                                        <option value="<?php echo $obj_doc_loc_province["id"]?>" selected><?php echo $obj_doc_loc_province["name_th"]?></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- ปุ่มบันทึกและปุ่มยกเลิก -->
                        <div class="row pb-4" style="position: relative;">
                            <div class="col-md-4">
                                <input type="submit" id="cf_btn" class="btn btn-warning" value="แก้ไขร้านอาหาร">
                                <input type="reset" class="btn btn-secondary" value="ยกเลิก" onclick="location.href='./?content=list-restaurant'">
                            </div>
                        </div>
                    </form>
                </div>
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
                            clear_zone_dropdown();
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
                        clear_zone_dropdown();
                        show_zone_dropdown(arr_zone);
                    } else {
                        clear_zone_dropdown();
                    }
                },
                error: function() {}
            });
        }

        function get_block() {
            jQuery.ajax({
                dataType: "json",
                url: "<?php echo "get_location.php" ?>",
                data: 'zone_id=' + $("#res_zone_id").val(),
                type: "POST",
                success: function(arr_block) {
                    if (arr_block != "no output") {
                        clear_block_dropdown();
                        show_block_dropdown(arr_block);
                    } else {
                        clear_block_dropdown();
                    }
                },
                error: function() {}
            });
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
            var option = '<option value="" disabled selected>โซนร้านอาหาร</option>';
            $("#res_zone_id").html(option);
        }

        function clear_block_dropdown() {
            var option = '<option value="" selected>ล็อก (ถ้ามี)</option>';
            $("#res_block_id").html(option);
        }

        function check_same_as_address() {
            var is_check = $("#same_as_address")[0].checked;
            console.log(is_check);
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
