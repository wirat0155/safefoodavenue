<!-- 
/*
* add-menu
* add-menu
* @input menu name  
* @output form add menu
* @author Jutamas Thaptong 62160079
* @Create Date 2565-06-20
*/ 
-->
<style>
    .required:after {
        color: red;
        content: ' *';
        display: inline;
    }

</style>
<script>
let menu_order = 1;

function confirmDelete(order) {

    if (confirm("ต้องการยกเลิกเมนูที่เลือก?")) {
        // to delete menu
        $("#div_menu_" + order).remove()
    }
    return false;

}

function addMenuForm() {

    $("#menuPanel").append('' +
        '<div id="div_menu_' + menu_order + '" class="row pb-4">' +
        '<div class="col-md-6">' +
        '<label class="text-primary font-weight-bold required">ชื่อเมนู</label>' +
        '<input type="text" id="menu_name_' + menu_order + '" name="menu_name[]" class="form-control" required>' +
        '</div>' +
        '<div class="col-md-6">' +
        '<label class="text-primary">&nbsp</label><br>' +
        '<button type="button" class="btn btn-danger" style="font-size: 20px;line-height: 0.75;" onclick="return confirmDelete(' + menu_order + ')"><i class="ni ni-fat-remove"></button>' +
        '</div>' +
        '</div>'
    )
    menu_order += 1;
    // to add postion
}
</script>

<?php
    // ร้านอาหาร
    $sql = "SELECT * FROM sfa_restaurant WHERE res_id = ".$_GET["res_id"].""; 
    $query = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($query);
?>

<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">เพิ่มเมนูอาหาร</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">เพิ่มเมนูอาหาร</li>
                        </ol>
                    </nav>
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
                <div class="table-responsive py-4 px-4">

                    <form action="index.php?content=do_add_menu" method="POST" enctype="multipart/form-data">
                        <input name="res_id" value="<?= $row["res_id"] ?>" hidden>           
                        <div class="row pb-4">
                            <div class="col col-md-6">
                                <label class="text-primary font-weight-bold">ชื่อร้านอาหาร</label>
                                <input type="text" id="res_name" name="res_name" class="form-control" value="<?= $row["res_title"] ?>" readonly>
                            </div>
                        </div>

                        <div class="row pb-4">
                            <div class="col col-md-6">
                                <label class="text-primary font-weight-bold">วัตถุดิบสำหรับการตรวจสอบ</label>
                                <select id="menu_default_name" class="select2-multiple" name="menu_default_name[]" multiple oninput="check_require_menu_name()">
                                    <option value="หมึก">หมึก</option>
                                    <option value="กุ้ง">กุ้ง</option>
                                    <option value="ปลา">ปลา</option>
                                    <option value="หอย">หอย</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h4>ถ้าไม่พบวัตถุที่ต้องการ สามารถระบุเมนูที่นี่</h4>
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-8">
                                <label class="text-primary font-weight-bold">เมนูอาหาร <span class="text-danger">(Dynamic form)</span></label>
                            </div>
                            <div class="col-md-4 text-end">
                                <button type="button" class="btn btn-info" onclick="addMenuForm()">+เพิ่มเมนู</button>
                            </div>
                        </div>

                        <div id="menuPanel">
                            <div class="row pb-4">
                                <div class="col-md-6">
                                    <label id="menu_name_label" class="text-primary font-weight-bold required">ชื่อเมนู</label>
                                    <input type="text" id="menu_name_0" name="menu_name[]" class="form-control" required>
                                </div>
                            </div>

                        </div>
                        <div class="row pb-4">
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-success" value="บันทึก">
                                <a href="index.php?content=list-menu&res_id=<?= $_GET["res_id"] ?>">
                                    <button type="button" class="btn btn-secondary">ย้อนกลับ</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include("footer.php"); ?>
</div>

<script>
    function check_require_menu_name() {
        // console.log($("#menu_default_name").val());
        if ($("#menu_default_name").val().length != 0) {
            console.log("เลือก");
            $("#menu_name_label").removeClass("required");
            $("#menu_name_0").prop("required", false);
        } else {
            console.log("ไม่ได้เลือก");
            $("#menu_name_label").addClass("required");
            $("#menu_name_0").prop("required", true);
        }
    }
</script>