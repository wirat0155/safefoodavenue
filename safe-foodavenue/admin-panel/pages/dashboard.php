<style>
    .odd {
        /* background-color: rgba(246, 249, 252, .3); */
        background-color: #f4f6f9 !important;
    }
</style>

<?php
    // จำนวนร้านอาหารทั้งหมด
    function get_all_restaurant($con)
    {
        $sql = "SELECT COUNT(`res_id`) as `count_res` 
        FROM `sfa_restaurant` 
        WHERE `sfa_restaurant`.`res_active` = 1 
        AND `sfa_restaurant`.`res_gov_id` = " . $_SESSION['us_gov_id'];
        $arr_restaurant = mysqli_query($con, $sql);
        $count_restaurant = mysqli_fetch_assoc($arr_restaurant)["count_res"];
        return $count_restaurant;
    }
    $all_restaurant = get_all_restaurant($con);
    echo "จำนวนร้านค้าที่เปิดกิจการ ณ ปัจจุบัน " . $all_restaurant;
    echo "<br/>";

    function get_number_formalin_pass_restaurant($con) {
        $sql = "SELECT COUNT(`res_for_id`) as `count_res` 
        FROM `sfa_res_formalin_status` 
        LEFT JOIN `sfa_restaurant` ON `sfa_res_formalin_status`.`res_for_res_id` = `sfa_restaurant`.`res_id`
        WHERE `sfa_res_formalin_status`.`res_for_status` = 0 
        AND `sfa_restaurant`.`res_gov_id` = " . $_SESSION['us_gov_id'];
        $arr_restaurant = mysqli_query($con, $sql);
        $count_restaurant = mysqli_fetch_assoc($arr_restaurant)["count_res"];
        return $count_restaurant;
    }
    $pass_restaurant = get_number_formalin_pass_restaurant($con);
    echo "ร้านค้าที่ผ่านการตรวจสอบ " . $pass_restaurant;
    echo "<br/>";
   
    $all_restaurant = $all_restaurant == 0? 1 : $all_restaurant;
    echo "ร้อยละที่ผ่าน " . ($pass_restaurant / $all_restaurant) * 100;
    echo "<br/>";
    

    function get_year_dropdown($con) {
        $sql = "SELECT DISTINCT `fcl_year` AS `fcl_year` 
                FROM `sfa_formalin_checklist` WHERE `fcl_gov_id` = " . $_SESSION['us_gov_id'];
        $arr_restaurant = mysqli_query($con, $sql);
        return $arr_restaurant;
    }
    $arr_fcl_year = get_year_dropdown($con);
    // while($year = mysqli_fetch_assoc($arr_fcl_year)["fcl_year"]) {
    //     echo $year . "<br/>";
    // }
    
    $fcl_year = date('Y');
    if (!empty($_GET['fcl_year'])) {
        $fcl_year = $_GET['fcl_year'];
    }

    function get_formalin_checklist_by_year($con, $fcl_year) {
        $sql = "SELECT * FROM `sfa_formalin_checklist` WHERE `sfa_formalin_checklist`.`fcl_year` = '" . $fcl_year . "' 
                AND `fcl_gov_id` = " . $_SESSION['us_gov_id'];
        $arr_formalin_checklist = mysqli_query($con, $sql);
        return $arr_formalin_checklist;
    }
    $arr_formalin_checklist = get_formalin_checklist_by_year($con, $fcl_year);
    $arr_fcl_id = array();
    while ($obj_fcl_id = mysqli_fetch_assoc($arr_formalin_checklist)["fcl_id"]) {
        array_push($arr_fcl_id, $obj_fcl_id);
    }
    print_r($arr_fcl_id);


    $arr_fcl_data = array (
        array(22,18),
        array(15,13),
        array(5,2),
        array(17,15),
        array(5,2),
        array(17,15)
      );

    function get_all_restaurant_by_year($con, $fcl_year) {
        $sql = "SELECT COUNT(`res_for_res_id`) AS `count_res` FROM `sfa_res_formalin_status`
        LEFT JOIN `sfa_formalin_checklist` ON `sfa_res_formalin_status`.`res_for_last_fcl_id` = `sfa_formalin_checklist`.`fcl_id`
        WHERE `sfa_formalin_checklist`.`fcl_year` = '" . $fcl_year . "'";
        $arr_res_formalin_status = mysqli_query($con, $sql);
        $count_restaurant = mysqli_fetch_assoc($arr_res_formalin_status)["count_res"];
        return $count_restaurant;
    }
    $all_restaurant_by_year = get_all_restaurant_by_year($con, $fcl_year);
    echo "<br/>";
    echo "ร้านค้าที่ตรวจสอบในปีนี้ " . $all_restaurant_by_year;
    echo "<br/>";
    // $all_restaurant_by_year = $all_restaurant_by_year == 0? 1 : $all_restaurant_by_year;

    function get_pass_restaurant_by_year($con, $fcl_year) {
        $sql = "SELECT COUNT(`res_for_res_id`) AS `count_res` FROM `sfa_res_formalin_status`
        LEFT JOIN `sfa_formalin_checklist` ON `sfa_res_formalin_status`.`res_for_last_fcl_id` = `sfa_formalin_checklist`.`fcl_id`
        WHERE `sfa_formalin_checklist`.`fcl_year` = '" . $fcl_year . "' AND `sfa_res_formalin_status`.`res_for_status` = 0";
        $arr_res_formalin_status = mysqli_query($con, $sql);
        $count_restaurant = mysqli_fetch_assoc($arr_res_formalin_status)["count_res"];
        return $count_restaurant;
    }
    $pass_restaurant_by_year = get_pass_restaurant_by_year($con, $fcl_year);
    echo "ร้านค้าที่ผ่านในปีนี้ " . $pass_restaurant_by_year;
    echo "<br/>";

    // echo "ร้อยละที่ผ่าน " . ($pass_restaurant_by_year / $all_restaurant_by_year) * 100;
    echo "<br/>";
?>

<div class="header pb-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-7">
                    <h6 class="h1 d-inline-block mb-0">ข้อมูลร้านอาหาร ณ ปัจจุบัน</h6>
                </div>
            </div>
            <!-- Card stats -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">จำนวนร้านค้าที่เปิดกิจการ ณ ปัจจุบัน</h5>
                                    <span class="h2 font-weight-bold mb-0"><?php echo $all_restaurant ?></span>
                                </div>
                                <div class="col-auto">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">จำนวนร้านค้าที่ผ่านการตรวจ</h5>
                                    <span class="h2 font-weight-bold mb-0"> <?php echo $pass_restaurant ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">ร้อยละของร้านค้าที่ผ่านการตรวจ</h5>
                                    <span class="h2 font-weight-bold mb-0"><?php echo ($pass_restaurant / $all_restaurant) * 100 ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center py-4">
                <div class="col-lg-1 col-7">
                    <h6 class="h1 d-inline-block mb-0">ปีปฏิทิน</h6>
                </div>
                <div class="col-2">
                    <select name="fcl_year" id="fcl_year" class="select2 form-control" oninput="change_year()">
                        <?php
                        while($obj_fcl_year = mysqli_fetch_assoc($arr_fcl_year)["fcl_year"]) {
                            $selected = $fcl_year == $obj_fcl_year? "selected" : "" ?>
                            <option value="<?php echo $obj_fcl_year ?>" <?php echo $selected ?>><?php echo $obj_fcl_year ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <!-- Card stats -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">จำนวนร้านค้าที่เข้ารับการตรวจในปีปฏิทิน</h5>
                                    <span class="h2 font-weight-bold mb-0"><?php echo $all_restaurant_by_year ?></span>
                                </div>
                                <div class="col-auto">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">จำนวนร้านอาหารที่เปิดกิจการอยู่</h5>
                                    <span class="h2 font-weight-bold mb-0"> <?php echo $pass_restaurant_by_year ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <?php
                                    $all_restaurant_by_year = $all_restaurant_by_year == 0? 1 : $all_restaurant_by_year;
                                    ?>
                                    <h5 class="card-title text-uppercase text-muted mb-0">ประเภทร้านอาหาร</h5>
                                    <span class="h2 font-weight-bold mb-0"><?php echo ($pass_restaurant_by_year / $all_restaurant_by_year) * 100 ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-sm-center py-5">
            <?php
            for ($i = 0; $i < count($arr_fcl_id); $i++) { ?>
                <div class="col-sm-5">
                    <div class="card">
                        <div class="card-header bg-primary text-white text-center" style="font-size: 1.25rem;">
                            อัตราส่วนร้านที่พบฟอร์มาลิน <?php echo ($i+1) ?>/<?php echo ($fcl_year + 543) ?>
                        </div>
                        <div class="card-body">
                            <canvas id="<?php echo "pie_chart_" . ($i+1) ?>" width="200" height="200"></canvas>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    <?php for ($i = 0; $i < count($arr_fcl_id); $i++) { ?>
        get_pie_chart(
            '<?php echo ($i + 1) ?>', 
            '<?php echo ($fcl_year + 543)?>',
            [<?php for ($j = 0; $j < count($arr_fcl_data[$i]); $j++) {
                echo $arr_fcl_data[$i][$j]; 
                if ($j == 0) {
                    echo ",";
                }
            }?>]);
    <?php } ?>

    function change_year() {
        let fcl_year = $("#fcl_year").val();
        window.location.href = '/admin-panel/?content=dashboard&fcl_year=' + fcl_year;
    }

    function get_pie_chart(fcl_id, fcl_year, value) {
        let title = "อัตราส่วนร้านที่พบฟอร์มาลิน " + fcl_id + "/" + fcl_year;
        const ctx = $("#pie_chart_" + fcl_id);
        const data = {
            labels: [
                'ปลอดภัย',
                'รอตรวจสอบ'
            ],
            datasets: [{
                label: 'อัตราส่วนร้านที่ใช้ฟอร์มาลิน',
                data: value,
                backgroundColor: [
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        };

        const myChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: title,
                        font: {
                            size: '24px',
                            weight: 'bold',
                        },
                    },
                    legend: {
                        display: true,
                        position: "bottom"
                    }
                }
            }
        });
    }
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="dist/js/bootstrap-select.js"></script>