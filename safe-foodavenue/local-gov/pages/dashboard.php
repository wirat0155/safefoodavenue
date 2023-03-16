<style>
    
</style>

<?php
    // จำนวนร้านอาหารทั้งหมด ล่าสุด
    function get_all_restaurant($con) {
        $sql = "SELECT COUNT(`res_id`) as `count_res` 
        FROM `sfa_restaurant` 
        WHERE `sfa_restaurant`.`res_active` = 1
        AND `sfa_restaurant`.`res_active` = 1 
        AND `sfa_restaurant`.`res_gov_id` = " . $_SESSION['us_gov_id'];
        $arr_restaurant = mysqli_query($con, $sql);
        $count_restaurant = mysqli_fetch_assoc($arr_restaurant)["count_res"];
        return $count_restaurant;
    }
    $all_restaurant = get_all_restaurant($con);

    // จำนวนร้านอาหารที่ปลอดภัยล่าสุด
    function get_number_formalin_pass_restaurant($con) {
        $sql = "SELECT COUNT(`res_for_id`) as `count_res` 
        FROM `sfa_res_formalin_status` 
        LEFT JOIN `sfa_restaurant` ON `sfa_res_formalin_status`.`res_for_res_id` = `sfa_restaurant`.`res_id`
        WHERE `sfa_res_formalin_status`.`res_for_status` = 0 
        AND `sfa_restaurant`.`res_active` = 1
        AND `sfa_restaurant`.`res_gov_id` = " . $_SESSION['us_gov_id'];
        $arr_restaurant = mysqli_query($con, $sql);
        $count_restaurant = mysqli_fetch_assoc($arr_restaurant)["count_res"];
        return $count_restaurant;
    }
    $pass_restaurant = get_number_formalin_pass_restaurant($con);
   
    // แปลงเป็น 1 เพื่อให้หาร 1 ตอนหาเศษส่วน
    $all_restaurant = $all_restaurant == 0 ? 1 : $all_restaurant;
    

    function get_year_dropdown($con) {
        $sql = "SELECT DISTINCT `fcl_year` AS `fcl_year` 
        FROM `sfa_formalin_checklist` 
        WHERE `fcl_gov_id` = " . $_SESSION['us_gov_id'] . 
        " ORDER BY fcl_year DESC";
        $arr_year = mysqli_query($con, $sql);
        return $arr_year;
    }
    $arr_fcl_year = get_year_dropdown($con);


    function get_max_year($con) {
        $sql = "SELECT MAX(`fcl_year`) AS `fcl_year` FROM `sfa_formalin_checklist`";
        $arr_year = mysqli_query($con, $sql);
        return $arr_year;
    }
    
    $fcl_year = get_max_year($con);
    $fcl_year = mysqli_fetch_assoc($fcl_year);
    $fcl_year = $fcl_year["fcl_year"];
    if (!empty($_GET['fcl_year'])) {
        $fcl_year = $_GET['fcl_year'];
    }

    function get_formalin_checklist_by_year($con, $fcl_year) {
        $sql = "SELECT COUNT(`res_for_id`) AS `num`, `fcl_id`
        FROM `sfa_formalin_checklist` 
        LEFT JOIN `sfa_res_formalin_status` ON `sfa_formalin_checklist`.`fcl_id` = `sfa_res_formalin_status`.`res_for_last_fcl_id`
        WHERE `sfa_formalin_checklist`.`fcl_year` = " . $fcl_year . " AND `fcl_gov_id` = " . $_SESSION["us_gov_id"] . " GROUP BY `fcl_id`";
        $arr_formalin_checklist = mysqli_query($con, $sql);
        return $arr_formalin_checklist;
    }
    $arr_formalin_checklist = get_formalin_checklist_by_year($con, $fcl_year);
    $arr_fcl_id = array();
    $arr_fcl_id_data = array();
    while ($obj_fcl_id = mysqli_fetch_assoc($arr_formalin_checklist)) {
        array_push($arr_fcl_id, $obj_fcl_id["fcl_id"]);
        array_push($arr_fcl_id_data, $obj_fcl_id["num"]);
    }


    function get_pie_chart_data_by_fcl_id($con, $fcl_id) {
        $sql = "SELECT COUNT(`res_for_id`) AS `count` FROM `sfa_res_formalin_status` AS `resul1` 
        WHERE `resul1`.`res_for_last_fcl_id` = $fcl_id AND `resul1`.`res_for_status` = 0 
        UNION ALL SELECT COUNT(`res_for_id`) FROM `sfa_res_formalin_status` AS `resul2` 
        WHERE `resul2`.`res_for_last_fcl_id` = $fcl_id AND `resul2`.`res_for_status` = 1";
        $arr_data = mysqli_query($con, $sql);
        return $arr_data;
    }

    $arr_fcl_data = array();
    for ($i = 0; $i < count($arr_fcl_id); $i++) {
        $arr_row = array();
        $arr_pie_chart_data = get_pie_chart_data_by_fcl_id($con, $arr_fcl_id[$i]);
        while($obj_pie_chart_data = mysqli_fetch_array($arr_pie_chart_data)) {
            array_push($arr_row, $obj_pie_chart_data['count']);
        }
        array_push($arr_fcl_data, $arr_row);
    }


    $arr_fcl_data_pass = array();
    $arr_fcl_data_fail = array();
    for ($i = 0; $i < count($arr_fcl_data); $i++) {
        if (!($arr_fcl_data[$i][0] == 0 && $arr_fcl_data[$i][1] == 0)) {
            array_push($arr_fcl_data_pass, $arr_fcl_data[$i][0]);
            array_push($arr_fcl_data_fail, $arr_fcl_data[$i][1]);
        }
    }

    // echo "<pre>";
    // print_r($arr_fcl_data_pass);
    // echo "</pre>";

    // echo "<pre>";
    // print_r($arr_fcl_data_fail);
    // echo "</pre>";
    // exit;


    function get_all_restaurant_by_year($con, $fcl_year) {
        $sql = "SELECT COUNT(`res_for_res_id`) AS `count_res` FROM `sfa_res_formalin_status`
        LEFT JOIN `sfa_formalin_checklist` ON `sfa_res_formalin_status`.`res_for_last_fcl_id` = `sfa_formalin_checklist`.`fcl_id`
        LEFT JOIN `sfa_restaurant` ON `sfa_res_formalin_status`.`res_for_res_id` = `sfa_restaurant`.`res_id`
        WHERE `sfa_restaurant`.`res_active` = 1
        AND `sfa_formalin_checklist`.`fcl_year` = '" . $fcl_year . "'";
        $arr_res_formalin_status = mysqli_query($con, $sql);
        $count_restaurant = mysqli_fetch_assoc($arr_res_formalin_status)["count_res"];
        return $count_restaurant;
    }
    $all_restaurant_by_year = get_all_restaurant_by_year($con, $fcl_year);

    function get_pass_restaurant_by_year($con, $fcl_year) {
        $sql = "SELECT COUNT(`res_for_res_id`) AS `count_res` FROM `sfa_res_formalin_status`
        LEFT JOIN `sfa_formalin_checklist` ON `sfa_res_formalin_status`.`res_for_last_fcl_id` = `sfa_formalin_checklist`.`fcl_id`
        LEFT JOIN `sfa_restaurant` ON `sfa_res_formalin_status`.`res_for_res_id` = `sfa_restaurant`.`res_id`
        WHERE `sfa_formalin_checklist`.`fcl_year` = '" . $fcl_year . "' AND `sfa_restaurant`.`res_active` = 1
        AND `sfa_res_formalin_status`.`res_for_status` = 0";
        $arr_res_formalin_status = mysqli_query($con, $sql);
        $count_restaurant = mysqli_fetch_assoc($arr_res_formalin_status)["count_res"];
        return $count_restaurant;
    }
    $pass_restaurant_by_year = get_pass_restaurant_by_year($con, $fcl_year);

    // ผลตรวจการใช้ฟอร์มาลีนจำแนกตามประเภทของร้านอาหาร
    function get_res_category($con) {
        $sql = "SELECT * FROM `sfa_res_category`";
        $arr_res_category = mysqli_query($con, $sql);
        return $arr_res_category;
    }

    $arr_res_category = get_res_category($con);
    $arr_category_id = array();
    $arr_category_title = array();
    while ($obj_res_category = mysqli_fetch_array($arr_res_category)) {
        array_push($arr_category_id, $obj_res_category["res_cat_id"]);
        array_push($arr_category_title, $obj_res_category["res_cat_title"]);
    }

    $arr_res_category_pass_data = array();

    function get_res_category_pass($con, $res_cat_id, $arr_fcl_id) {
        $sql = "SELECT COUNT(`res_for_res_id`) AS `pass` FROM `sfa_res_formalin_status` 
        LEFT JOIN `sfa_restaurant` ON `sfa_res_formalin_status`.`res_for_res_id` = `sfa_restaurant`.`res_id`
        WHERE `res_for_last_fcl_id` IN (";
        for ($i = 0; $i < count($arr_fcl_id); $i++) {
            $sql .= $arr_fcl_id[$i];
            if ($i != count($arr_fcl_id) - 1) {
                $sql .= ",";
            }
        }
        $sql .=  ") AND `res_for_status` = 0 AND `res_cat_id` = " . $res_cat_id;
        $arr_res_category = mysqli_query($con, $sql);
        $obj_res_category = mysqli_fetch_array($arr_res_category);
        return $obj_res_category["pass"];
    }
    for ($i = 0; $i < count($arr_category_id); $i++) {
        array_push($arr_res_category_pass_data, get_res_category_pass($con, $arr_category_id[$i], $arr_fcl_id));
    }

    $arr_res_category_fail_data = array();

    function get_res_category_fail($con, $res_cat_id, $arr_fcl_id) {
        $sql = "SELECT COUNT(`res_for_res_id`) AS `fail` FROM `sfa_res_formalin_status` 
        LEFT JOIN `sfa_restaurant` ON `sfa_res_formalin_status`.`res_for_res_id` = `sfa_restaurant`.`res_id`
        WHERE `res_for_last_fcl_id` IN (";
        for ($i = 0; $i < count($arr_fcl_id); $i++) {
            $sql .= $arr_fcl_id[$i];
            if ($i != count($arr_fcl_id) - 1) {
                $sql .= ",";
            }
        }
        $sql .=  ") AND `res_for_status` = 1 AND `res_cat_id` = " . $res_cat_id;
        $arr_res_category = mysqli_query($con, $sql);
        $obj_res_category = mysqli_fetch_array($arr_res_category);
        return $obj_res_category["fail"];
    }
    for ($i = 0; $i < count($arr_category_id); $i++) {
        array_push($arr_res_category_fail_data, get_res_category_fail($con, $arr_category_id[$i], $arr_fcl_id));
    }

    $column_chart_data = array_map(function($arr_category_title, $arr_res_category_pass_data, $arr_res_category_fail_data) {
        return (object) array(
            'category_title' => $arr_category_title,
            'pass' => intval($arr_res_category_pass_data),
            'fail' => intval($arr_res_category_fail_data)
        );
    }, $arr_category_title, $arr_res_category_pass_data, $arr_res_category_fail_data);


    function sort_pass_value_desc($a, $b) {
        if ($a->fail < $b->fail) {
            return 1;
        } elseif ($a->fail > $b->fail) {
            return -1;
        } else {
            return 0;
        }
    }
    usort($column_chart_data, "sort_pass_value_desc");

    $other_category_title = "อื่น ๆ";
    $number_top_category = 3;
    $other_pass_data = 0;
    $other_fail_data = 0;
    for ($i = $number_top_category; $i < count($arr_category_title); $i++) {
        $other_pass_data += intval($column_chart_data[$i]->pass);
        $other_fail_data += intval($column_chart_data[$i]->fail);
    }

    // $sql = "SELECT * FROM `sfa_restaurant`
    //     LEFT JOIN `sfa_res_category` ON `sfa_restaurant`.`res_cat_id` = `sfa_res_category`.`res_cat_id`
    //     LEFT JOIN `sfa_entrepreneur` ON `sfa_restaurant`.`res_ent_id` = `sfa_entrepreneur`.`ent_id`
    //     LEFT JOIN `sfa_block` ON `sfa_restaurant`.`res_block_id` = `sfa_block`.`block_id`
    //     LEFT JOIN `sfa_zone` ON `sfa_block`.`block_zone_id` = `sfa_zone`.`zone_id`
    //     LEFT JOIN `sfa_res_formalin_status` ON `sfa_restaurant`.`res_id` = `sfa_res_formalin_status`.`res_for_res_id`
    //     WHERE `sfa_restaurant`.`res_gov_id` = " . $_SESSION["us_gov_id"]; 
    $sql = "SELECT * FROM `sfa_res_formalin_status` 
    LEFT JOIN `sfa_restaurant` ON `sfa_res_formalin_status`.`res_for_res_id` = `sfa_restaurant`.`res_id`
    LEFT JOIN `sfa_res_category` ON `sfa_restaurant`.`res_cat_id` = `sfa_res_category`.`res_cat_id`
    LEFT JOIN `sfa_entrepreneur` ON `sfa_restaurant`.`res_ent_id` = `sfa_entrepreneur`.`ent_id`
    LEFT JOIN `sfa_block` ON `sfa_restaurant`.`res_block_id` = `sfa_block`.`block_id`
    LEFT JOIN `sfa_zone` ON `sfa_block`.`block_zone_id` = `sfa_zone`.`zone_id`
    WHERE `sfa_restaurant`.`res_active` = 1 AND `res_for_last_fcl_id` IN (";
    for ($i = 0; $i < count($arr_fcl_id); $i++) {
        $sql .= $arr_fcl_id[$i];
        if ($i != count($arr_fcl_id) - 1) {
            $sql .= ",";
        }
    }
    $sql .= ")";
    $arr_restaurant = mysqli_query($con, $sql);
?>

<div class="header">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-7">
                    <h6 class="h1 d-inline-block mb-0">ข้อมูลร้านอาหาร ณ ปัจจุบัน <?php echo $_SESSION["us_gov_name"]?></h6>
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
                                    <div class="d-flex justify-content-between pt-2">
                                        <div>
                                            <h1><i class="bi bi-shop"></i></h1>
                                        </div>
                                        <div>
                                            <span class="h1 font-weight-bold mb-0"><?php echo number_format($all_restaurant) ?></span>
                                        </div>
                                    </div>
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
                                    <div class="d-flex justify-content-between pt-2">
                                        <div>
                                            <h1 class="text-success"><i class="bi bi-shield-fill-check"></i></h1>
                                        </div>
                                        <div>
                                            <h1 class="font-weight-bold mb-0"> <?php echo number_format($pass_restaurant) ?></h1>
                                        </div>
                                    </div>
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
                                    <div class="d-flex justify-content-between pt-2">
                                        <div>
                                            <h1 class="text-success"><i class="bi bi-shield-fill-check"></i></h1>
                                        </div>
                                        <div>
                                            <h1 class="font-weight-bold mb-0"><?php echo round(($pass_restaurant / $all_restaurant) * 100, 2) ?>%</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center py-4">
                <div class="col col-lg-2">
                    <h6 class="h1 d-inline-block mb-0">ปีปฏิทิน</h6>
                </div>
                <div class="col col-lg-2">
                    <select name="fcl_year" id="fcl_year" class="select2 form-control" oninput="change_year()">
                        <?php
                        while($obj_fcl_year = mysqli_fetch_assoc($arr_fcl_year)["fcl_year"]) {
                            $selected = $fcl_year == $obj_fcl_year? "selected" : "" ?>
                            <option value="<?php echo $obj_fcl_year ?>" <?php echo $selected ?>><?php echo ($obj_fcl_year + 543) ?></option>
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
                                    <div class="d-flex justify-content-between pt-2">
                                        <div>
                                            <h1><i class="bi bi-shop"></i></h1>
                                        </div>
                                        <div>
                                            <h1 class="font-weight-bold mb-0"><?php echo number_format($all_restaurant_by_year) ?></h1>
                                        </div>
                                    </div>
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
                                    <div class="d-flex justify-content-between pt-2">
                                        <div>
                                            <h1 class="text-success"><i class="bi bi-shield-fill-check"></i></h1>
                                        </div>
                                        <div>
                                            <h1 class="font-weight-bold mb-0"> <?php echo number_format($pass_restaurant_by_year) ?></h1>
                                        </div>
                                    </div>
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
                                    <h5 class="card-title text-uppercase text-muted mb-0">ร้อยละของร้านค้าที่ผ่านการตรวจ</h5>
                                    <div class="d-flex justify-content-between pt-2">
                                        <div>
                                            <h1 class="text-success"><i class="bi bi-shield-fill-check"></i></h1>
                                        </div>
                                        <div>
                                            <h1 class="font-weight-bold mb-0"><?php echo round(($pass_restaurant_by_year / $all_restaurant_by_year) * 100, 2) ?>%</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="container-fluid" style="max-width: 1600px">
        <div class="row justify-content-sm-center pb-2">
            <?php
            $round = 1;
            for ($i = 0; $i < count($arr_fcl_id); $i++) { ?>
                <?php if ($arr_fcl_id_data[$i] != 0) : ?>
                <div class="col col-lg-3">
                    <div class="card">
                        <div class="card-header bg-primary text-white text-center" style="font-size: 1.25rem;">
                            สัดส่วนการตรวจฟอร์มาลิน รอบ <?php echo ($round) ?>/<?php echo ($fcl_year + 543) ?>
                        </div>
                        <div class="card-body" id="<?php echo "pie_chart_card_" . ($round+1) ?>">
                            <canvas id="<?php echo "pie_chart_" . ($round) ?>" width="200" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <?php 
                $round++;
                endif; ?>
            <?php } ?>
        </div> -->
        
        <div class="row justify-content-sm-center pb-2">
            <div class="col">
                <div class="card p-0">
                    <div class="card-header bg-primary text-white text-start" style="font-size: 1.25rem;">
                    ผลตรวจฟอร์มาลินตามรอบการตรวจ
                    </div>
                    <div class="card-body p-0">
                        <div id="stackedColumn"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-sm-center pb-2">
            <div class="col">
                <div class="card p-0">
                    <div class="card-header bg-primary text-white text-start" style="font-size: 1.25rem;">
                    ผลตรวจฟอร์มาลินของร้านจำแนกตามประเภทของร้านอาหาร ณ ปีที่เลือก
                    </div>
                    <div class="card-body p-0">
                        <div id="columnChart"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-sm-center pb-2">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white text-start" style="font-size: 1.25rem;">
                        รายการข้อมูลร้านอาหารทั้งหมด
                    </div>
                    <div class="card-body p-0">
                        <div class="py-2">
                            <?php if (mysqli_num_rows($arr_restaurant) > 0) : ?>
                            <table class="table table-striped display nowrap" id="datatable-basic" style="max-width: 100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อร้านอาหาร</th>
                                        <th>ผลการตรวจ</th>  
                                        <th>โซนร้านอาหาร</th> 
                                        <th>บล็อกร้านอาหาร</th>
                                        <th>ประเภท</th>  
                                        <th>ชื่อผู้ประกอบการ</th>  
                                        <th>เบอร์โทร</th>  
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    while($obj_restaurant = mysqli_fetch_array($arr_restaurant)){ ?> 
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td class="limit-char"><?php echo $obj_restaurant["res_title"] ?></td> 
                                            <td><?php 
                                                if ($obj_restaurant["res_for_status"] == "") {
                                                    echo "<span>รอตรวจสอบ</span>";
                                                }
                                                else if ($obj_restaurant["res_for_status"] == "0") {
                                                    echo "<span class='text-success'>ปลอดภัย</span>";
                                                } 
                                                else if ($obj_restaurant["res_for_status"] == "1") {
                                                    echo "<span class='text-danger'>อันตราย</span>";
                                                }
                                            ?></td>
                                            <td><?php echo $obj_restaurant["zone_title"] ?></td> 
                                            <td><?php echo $obj_restaurant["block_title"] ?></td> 
                                            <td><?php echo $obj_restaurant["res_cat_title"] ?></td> 
                                            <td><?php echo $obj_restaurant["ent_firstname"] . " " . $obj_restaurant["ent_lastname"] ?></td> 
                                            <td><?php echo $obj_restaurant["ent_tel"] ?></td> 
                                        </tr>
                                    <?php } ?> 
                                </tbody>
                            </table>
                            <?php else : ?>
                                <div class="py-5">
                                    <center>
                                        <h3>ไม่พบข้อมูลร้านอาหาร</h3>
                                    </center>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php // include("./pages/block-map.php"); ?>

<script>
    $(document).ready(function() {
        if ("<?php echo $_SESSION['login-status']?>" == "0") {
            toastify_success();
        }
        <?php unset($_SESSION['login-status']) ?>
    });
    getColumnChart();
    <?php 
    $round = 1;
    for ($i = 0; $i < count($arr_fcl_id); $i++) { ?>
        <?php if ($arr_fcl_id_data[$i] != 0) : ?>
        get_pie_chart(
            '<?php echo ($round) ?>', 
            '<?php echo ($fcl_year + 543)?>',
            [<?php for ($j = 0; $j < count($arr_fcl_data[$i]); $j++) {
                echo $arr_fcl_data[$i][$j];
                if ($j == 0) {
                    echo ",";
                }
            }?>]);
        <?php 
        $round++;
        endif; ?>
    <?php } ?>

    getStackedColumn();
    

    function toastify_success() {
        Toastify({
            text: "เข้าสู่ระบบสำเร็จ",
            duration: 5000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            style: {
                background: "#12a63a",
            }
        }).showToast();
    }

    function change_year() {
        let fcl_year = $("#fcl_year").val();
        window.location.href = '/admin-panel/?content=dashboard&fcl_year=' + fcl_year;
    }

    function get_pie_chart(fcl_id, fcl_year, value) {
        if (JSON.stringify(value) === JSON.stringify([0, 0])) {
            $("#pie_chart_card_" + fcl_id).html("ไม่พบข้อมูลการตรวจ");
            return 0;
        }
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
                    'rgb(45, 206, 137)',
                    'rgb(201, 27, 14)'
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
                            size: '14px',
                            weight: 'bold'
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
    function getStackedColumn() {
        Highcharts.chart('stackedColumn', {
            chart: {
                type: 'column'
            },
            title: {
                text: "<b>จำนวนร้านอาหารในรอบการตรวจ</b>",
                style: {
                    fontSize: '14px',
                    fontFamily: 'Prompt, sans-serif'
                }
            },
            xAxis: {
                categories: [<?php for ($i = 0; $i < count($arr_fcl_data_pass); $i++) {
                    echo "'รอบที่ " . ($i + 1) . "'";
                    if ($i != count($arr_fcl_data_pass) - 1) {
                        echo ",";
                    }
                }?>],
                labels: {
                    style: {
                        fontSize: "14px",
                        fontFamily: 'Prompt, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'จำนวนร้านค้า'
                },
                style: {
                    fontFamily: 'Prompt, sans-serif'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (
                            Highcharts.defaultOptions.title.style &&
                            Highcharts.defaultOptions.title.style.color
                        ) || 'gray',
                        textOutline: 'none'
                    }
                }
            },
            // legend: {
            //     align: 'left',
            //     x: 70,
            //     verticalAlign: 'top',
            //     y: 70,
            //     floating: true,
            //     backgroundColor:
            //         Highcharts.defaultOptions.legend.backgroundColor || 'white',
            //     borderColor: '#CCC',
            //     borderWidth: 1,
            //     shadow: false
            // },
            legend: {
                layout: 'vertical',
                style: {
                    fontFamily: 'Prompt, sans-serif'
                }
            },
            tooltip: {
                headerFormat: '<b>{point.x}</b><br/>',
                pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'ปลอดภัย',
                data: [<?php for ($i = 0; $i < count($arr_fcl_data_pass); $i++) {
                            echo $arr_fcl_data_pass[$i];
                            if ($i != count($arr_fcl_data_pass) - 1) {
                                echo ",";
                            }
                        }?>],
                color: 'rgb(45, 206, 137)'
            }, {
                name: 'พบสาร',
                data: [<?php for ($i = 0; $i < count($arr_fcl_data_fail); $i++) {
                            echo $arr_fcl_data_fail[$i];
                            if ($i != count($arr_fcl_data_fail) - 1) {
                                echo ",";
                            }
                        }?>],
                color: 'rgb(201, 27, 14)'
            }]
        });
    }
    function getColumnChart() {
        Highcharts.chart('columnChart', {
            chart: {
                type: 'column'
            },
            title: {
                text: "<b>ผลตรวจฟอร์มาลิน<br>ตามประเภทของร้านอาหาร</b>",
                style: {
                    fontSize: '14px',
                    fontFamily: 'Prompt, sans-serif'
                }
            },
            xAxis: {
                categories: [
                    <?php for ($i = 0; $i < $number_top_category; $i++) {
                        echo "'" . $column_chart_data[$i]->category_title . "'";
                        if ($i != $number_top_category - 1) {
                            echo ",";
                        }
                    }?>
                , "อื่น ๆ" ],
                title: {
                    text: null
                },
                accessibility: {
                    description: "ผลการตรวจ"
                },
                labels: {
                    style: {
                        fontSize: "14px",
                        fontFamily: 'Prompt, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'จำนวนร้านค้า',
                    style: {
                        fontFamily: 'Prompt, sans-serif'
                    }
                }
            },
            tooltip: {
                valueSuffix: "",
                stickOnContact: true,
                backgroundColor: "rgba(255, 255, 255, 0.93)"
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'ปลอดภัย',
                data: [
                    <?php
                        for ($i = 0; $i < $number_top_category; $i++) {
                            echo $column_chart_data[$i]->pass;
                            if ($i != $number_top_category - 1) {
                                echo ",";
                            }
                        }
                        ?>
                , <?php echo $other_pass_data ?>],
                color: 'rgb(45, 206, 137)'
            }, {
                name: 'พบสาร',
                data: [
                    <?php
                        for ($i = 0; $i < $number_top_category; $i++) {
                            echo $column_chart_data[$i]->fail;
                            if ($i != $number_top_category - 1) {
                                echo ",";
                            }
                        }
                        ?>
                , <?php echo $other_fail_data ?>],
                color: 'rgb(201, 27, 14)'
            }],
            legend: {
                layout: 'vertical',
                style: {
                    fontFamily: 'Prompt, sans-serif'
                }
            },
        });
    }
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="dist/js/bootstrap-select.js"></script>