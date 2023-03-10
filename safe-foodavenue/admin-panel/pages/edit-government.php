<!-- สำหรับเพิ่มองค์กรปกครองส่วนท้องถิ่น -->

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
                    <h6 class="h2 text-white d-inline-block mb-0">เเก้ไของค์กรปกครองส่วนท้องถิ่น</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">เเก้ไของค์กรปกครองส่วนท้องถิ่น</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content -->
<?php
$gov_id = $_GET["gov_id"];
$sql = " SELECT * FROM sfa_government";
$arrGovernment= mysqli_query($con, $sql);

$sql = "SELECT * FROM th_provinces";
$arrProvince = mysqli_query($con, $sql);

$sql = "SELECT * FROM sfa_government 
WHERE gov_id = " . $gov_id;
$dbGov = mysqli_query($con, $sql);
$gov_data = mysqli_fetch_array($dbGov);

?>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card border-0">
                <div class="table-responsive py-4 px-4">
                    <form action="./php/action_edit_gov.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="gov_id" value="<?php echo $gov_data["gov_id"] ?>" hidden>
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <label for="gov_province_id" class="required">จังหวัด</label>
                                <select name="gov_province_id" id="gov_province_id" class="select2 form-control" require>
                                <option value="" selected disabled>เลือกจังหวัด</option>
                                <?php while ($obj_province = mysqli_fetch_array($arrProvince)) { ?>
                                <?php $selected = $gov_data["gov_province_id"] == $obj_province["id"] ? "selected" : ""; ?>
                                <option value="<?= $obj_province["id"] ?>" <?= $selected ?>>
                                    <?= $obj_province["name_th"]?>
                                </option>
                                <?php } ?>
                            </select>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="gov_name" class="required">องค์กรปกครองส่วนท้องถิ่นที่ต้องการเพิ่ม</label>
                                <input type="text" id="gov_name" name="gov_name" class="form-control" placeholder="ใส่ชื่อองค์กรปกครองส่วนท้องถิ่น" oninput="check_government_name()" value="<?php echo $gov_data["gov_name"] ?>" required>
                                <span id="status_government_name"></span>
                            </div>
                        </div>
                        <br>
                        <div class="row pb-4" style="position: relative;">
                            <div class="col">
                                <input type="submit" class="btn btn-warning" value="เเก้ไของค์กรปกครองส่วนท้องถิ่น">
                                <input type="reset" class="btn btn-secondary" value="กลับ" onclick="location.href='./?content=list-government'">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
    /*
     * check_name_restaurant
     * check name restaurant that have in database
     * @input 
     * @output 
     * @author Nantasiri Saiwaew
     * @Create Date 2565-06-29
     */
    // เช็คชือ่ร้านอาหารซ้ำ
    var chk_gov_name = 0;
    function check_government_name() {
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
    </script>
    <!-- Footer -->
    <?php include("footer.php"); ?>
</div>