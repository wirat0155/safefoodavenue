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
                    <h6 class="h2 text-white d-inline-block mb-0">เพิ่มรอบการตรวจสอบ</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">เพิ่มรอบการตรวจสอบ</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content -->

<?php
$sql = " SELECT * FROM sfa_role ";
$dbRole = mysqli_query($con, $sql);

$sql_checklist = " SELECT * FROM `sfa_formalin_checklist`";
$dbChecklist = mysqli_query($con, $sql);

?>


<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card border-0">
                <div class="table-responsive py-4 px-4">

                    <form action="./php/action-add-schedule.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="year" class="required">ปี</label>
                                <select name="year" id="year" class="form-control" onchange="set_date_start()">
                                    <?php
                                    date_default_timezone_set("Asia/Bangkok");
                                    $year_now = date("Y");
                                    $count_year = $year_now;
                                    for ($i = 0; $i < 10; $i++) {
                                        echo "<option value='" . $count_year . "'>" . $count_year . "</option>";
                                        $count_year++;
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="first_name" class="required">วันที่เริ่มการตรวจ</label>
                                <input type="date" id="fcl_startdate" name="fcl_startdate" class="form-control" onchange="set_date_end()" required>
                            </div>
                            <div class="col-md-4">
                                <label for="last_name" class="required">วันสิ้นสุดการตรวจ</label>
                                <input type="date" id="fcl_enddate" name="fcl_enddate" class="form-control" required>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="username">ผู้เพิ่มรอบการตรวจ</label>
                                <input type="hidden" id="id_user" name="id_user" class="form-control" value="<?php if (isset($_SESSION["id_user"])) {
                                                                                                                    echo $_SESSION["id_user"];
                                                                                                                } ?>">
                                <input type="text" id="us_username" name="us_username" class="form-control" value="<?php $fullname = isset($_SESSION["name"]) ? $_SESSION["name"] : "John Snow";
                                                                                                                    echo $fullname; ?>" disabled>
                            </div>
                        </div>
                        <br>
                        <div class="row pb-4" style="position: relative;">
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-success" value="สร้างรอบการตรวจ">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script>
        var start_day = '';
        var end_day = '';

        $(document).ready(function() {
            set_date_start();
            // change_min_end_date();
        });

        function set_date_start() {
            var year = document.getElementById('year').value;
            console.log(year);
            $.ajax({
                url: "get_date.php",
                type: "POST",
                data: {
                    year: year
                },
                cache: false,
                success: function(dataResult) {
                    start_day = new Date(dataResult);
                    console.log(dataResult);
                    if (year == start_day.getFullYear()) {
                        start_day = new Date(dataResult);
                        start_day.setDate(start_day.getDate() + 1)
                        month = start_day.getMonth() + 1;
                        if (month.toString().length == 1) {
                            month = '0' + month;
                        }
                        day = start_day.getDate();
                        // console.log(day);
                        if (day.toString().length == 1) {
                            day = '0' + day;
                        }
                        start_day = start_day.getFullYear() + "-" + month + "-" + day;
                        // console.log(start_day + " in if ");

                        // console.log(start_day + " in if");

                    } else {
                        start_day = year + '-01-01';
                        console.log(start_day + " in else");
                    }


                    end_day = year + '-12-31';
                    document.getElementById('fcl_startdate').setAttribute("min", start_day);
                    document.getElementById('fcl_startdate').setAttribute("max", end_day);
                }
            });
        }

        // function set_date_next_year() {
        //     var year = document.getElementById('year').value;
        //     console.log(year);
        //     $.ajax({
        //         url: "get_date.php",
        //         type: "POST",
        //         data: {
        //             year: year
        //         },
        //         cache: false,
        //         success: function(dataResult) {
        //             console.log(dataResult);
        //             start_day = year + '-01-01';
        //             end_day = year + '-12-31';
        //             document.getElementById('fcl_startdate').setAttribute("min", start_day);
        //             document.getElementById('fcl_startdate').setAttribute("max", end_day);
        //         }
        //     });
        // }

        function set_date_end() {
            var start_date_new = document.getElementById('fcl_startdate').value;
            document.getElementById('fcl_enddate').value = '';
            document.getElementById('fcl_enddate').setAttribute("min", start_date_new);
        }

        // function change_min_end_date() {
        //     $('#fcl_startdate').on('blur', function() {
        //         var start_date = document.getElementById("fcl_startdate").value;
        //         document.getElementById("fcl_enddate").value = '';
        //         document.getElementById("fcl_enddate").min = start_date;
        //         console.log(start_date);
        //     });
        // }
    </script>

    <!-- Footer -->
    <?php include("footer.php"); ?>
</div>