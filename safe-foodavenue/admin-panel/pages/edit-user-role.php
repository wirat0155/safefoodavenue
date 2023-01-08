<!-- สำหรับเพิ่มประเภทของ user ปัจจุบันมี 1=ผู้ดูแลระบบ 2=ผู้เชี่ยวชาญ/นักวิจัย 3=นักท่องเที่ยว 4=ผู้ประกอบการ 5=เทศบาล -->

<!-- 
/*
* add-user
* add-user
* @input   
* @output form add restaurant
* @author Jutamas Thaptong 62160079
* @Create Date 2565-06-17
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
                    <h6 class="h2 text-white d-inline-block mb-0">เเก้ไขประเภทของผู้ใช้งาน</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">เเก้ไขประเภทของผู้ใช้งาน</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content -->
<?php
$role_id = $_GET["role_id"];
$sql = " SELECT * FROM sfa_role WHERE role_id=".$role_id;
$dbRole = mysqli_query($con, $sql);
$user_role_data = mysqli_fetch_array($dbRole);
?>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card border-0">
                <div class="table-responsive py-4 px-4">

                    <form action="./php/action-edit-role-user.php" method="POST" enctype="multipart/form-data">
                        <input type="text" name="role_id" value="<?php echo $user_role_data["role_id"] ?>" hidden>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="role_title" class="required">ประเภทผู้ใช้งานที่ต้องการเเก้ไข</label>
                                <input type="text" id="role_title" name="role_title" class="form-control" placeholder="ใส่ชื่อประเภทของผู้ใช้งาน" oninput="check_name_role()" value="<?php echo $user_role_data["role_title"] ?>" required>
                                <span id="status_role_title"></span>
                            </div>
                        </div>
                        <br>
                        <div class="row pb-4" style="position: relative;">
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-warning" value="แก้ไขประเภทผู้ใช้">
                                <input type="reset" class="btn btn-secondary" value="กลับ" onclick="location.href='./?content=list-user-role'">
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
    function check_name_role() {
        jQuery.ajax({
            url: "<?php echo "check_name.php" ?>",
            data: 'role_title=' + $("#role_title").val(),
            type: "POST",
            success: function(data) {
                $("#status_role_title").html(data);
            },
            error: function() {}
        });
    }
    </script>

    <!-- Footer -->
    <?php include("footer.php"); ?>
</div>