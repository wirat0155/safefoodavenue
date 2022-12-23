<!-- 
/*
* add-schedule
* add-schedule
* @input  prefix, firstname, lastname, role, username ,password
* @output form add user
* @author Nantasiri Saiwaew
* @Create Date 2565-08-01
*/ 
-->
<style>
.required:after {
    color: red;
    content: ' *';
    display: inline;
}
</style>

<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">เเก้ไขรอบการตรวจสอบ</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">เเก้ไขรอบการตรวจสอบ</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content -->

<?php
    $fcl_id = $_GET["fcl_id"];
    $sql_fcl = "SELECT * FROM sfa_formalin_checklist WHERE fcl_id = " . $fcl_id;
    $dbFCL = mysqli_query($con, $sql_fcl);
    $fcl = mysqli_fetch_array($dbFCL);
    $sql = " SELECT * FROM sfa_role ";
    $dbRole = mysqli_query($con, $sql);
    $date_now; 
?>


<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card border-0">
                <div class="table-responsive py-4 px-4">

                    <form action="./php/action-edit-formalin-checklist.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" id="fcl_id" name="fcl_id" class="form-control" value="<?php echo $fcl['fcl_id'] ?>">
                            <div class="col-md-4">
                                <label for="first_name" class="required">วันที่เริ่มการตรวจ</label>
                                <input type="date" id="fcl_startdate" name="fcl_startdate" class="form-control" min="<?php echo date('Y-m-d'); ?>" value="<?php  echo $fcl['fcl_startdate'];  ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label for="last_name" class="required">วันสิ้นสุดการตรวจ</label>
                                <input type="date" id="fcl_enddate" name="fcl_enddate" class="form-control" min="<?php echo date('Y-m-d'); ?>" value="<?php echo $fcl['fcl_enddate']; ?>" required>
                            </div>
                        </div>
                        <br>
                        <div class="row pb-4" style="position: relative;">
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-success" value="เเก้ไขรอบการตรวจ">
                                <input type="reset" class="btn btn-secondary" value="กลับ" onclick="location.href='./?content=list-res-schedule'">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $(document).ready(function() {

        change_min_end_date();
    });
    /*
     * change_min_end_date
     * change min end date promotion
     * @input pro_start_date
     * @output -
     * @author Kasama Donwong 62160074
     * @Create Date 2564-12-12
     * @Update 
     */
    function change_min_end_date() {
        $('#fcl_startdate').on('blur', function() {
            var start_date = document.getElementById("fcl_startdate").value;
            document.getElementById("fcl_enddate").value = '';
            document.getElementById("fcl_enddate").min = start_date;
            console.log(start_date);
        });
    }
    </script>

    <!-- Footer -->
    <?php include("footer.php"); ?>
</div>