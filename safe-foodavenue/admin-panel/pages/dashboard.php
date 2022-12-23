<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#datatable-basic').DataTable();
    });
</script>
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
   

    echo "ร้อยละที่ผ่าน " . ($pass_restaurant / $all_restaurant) * 100;
    echo "<br/>";
    

    function get_year_dropdown($con) {
        $sql = "SELECT DISTINCT YEAR(`fcl_startdate`) AS `fcl_year` 
                FROM `sfa_formalin_checklist` WHERE `fcl_gov_id` = " . $_SESSION['us_gov_id'];
        $arr_restaurant = mysqli_query($con, $sql);
        return $arr_restaurant;
    }
    $arr_restaurant = get_year_dropdown($con);
    while($year = mysqli_fetch_assoc($arr_restaurant)["fcl_year"]) {
        echo $year . "<br/>";
    }
    


    function get_formalin_checklist_this_year($con) {
        $sql = "SELECT * FROM `sfa_formalin_checklist` WHERE `sfa_formalin_checklist`.`fcl_year` = '" . date('Y') . "' 
                AND `fcl_gov_id` = " . $_SESSION['us_gov_id'];
        $arr_formalin_checklist = mysqli_query($con, $sql);
        return $arr_formalin_checklist;
    }
    $arr_formalin_checklist = get_formalin_checklist_this_year($con);
    $arr_fcl_id = array();
    while ($obj_fcl_id = mysqli_fetch_assoc($arr_formalin_checklist)["fcl_id"]) {
        array_push($arr_fcl_id, $obj_fcl_id);
    }
    print_r($arr_fcl_id);

    function get_all_restaurant_by_year($con) {
        $sql = "SELECT COUNT(`res_for_res_id`) AS `count_res` FROM `sfa_res_formalin_status`
        LEFT JOIN `sfa_formalin_checklist` ON `sfa_res_formalin_status`.`res_for_last_fcl_id` = `sfa_formalin_checklist`.`fcl_id`
        WHERE `sfa_formalin_checklist`.`fcl_year` = '" . date('Y') . "'";
        $arr_res_formalin_status = mysqli_query($con, $sql);
        $count_restaurant = mysqli_fetch_assoc($arr_res_formalin_status)["count_res"];
        return $count_restaurant;
    }
    $all_restaurant = get_all_restaurant_by_year($con);
    echo "<br/>";
    echo "ร้านค้าที่ตรวจสอบในปีนี้ " . $all_restaurant;
    echo "<br/>";
    $all_restaurant = $all_restaurant == 0? 1 : $all_restaurant;

    function get_pass_restaurant_by_year($con) {
        $sql = "SELECT COUNT(`res_for_res_id`) AS `count_res` FROM `sfa_res_formalin_status`
        LEFT JOIN `sfa_formalin_checklist` ON `sfa_res_formalin_status`.`res_for_last_fcl_id` = `sfa_formalin_checklist`.`fcl_id`
        WHERE `sfa_formalin_checklist`.`fcl_year` = '" . date('Y') . "' AND `sfa_res_formalin_status`.`res_for_status` = 0";
        $arr_res_formalin_status = mysqli_query($con, $sql);
        $count_restaurant = mysqli_fetch_assoc($arr_res_formalin_status)["count_res"];
        return $count_restaurant;
    }
    $pass_restaurant = get_pass_restaurant_by_year($con);
    echo "ร้านค้าที่ผ่านในปีนี้ " . $pass_restaurant;
    echo "<br/>";

    echo "ร้อยละที่ผ่าน " . ($pass_restaurant / $all_restaurant) * 100;
    echo "<br/>";

 


    // // จำนวนร้านอาหารที่เปิดกิจการอยู่
    // function get_status_restaurant($con)
    // {
    //     $sql = "SELECT count(res_status) as count_stat FROM `sfa_restaurant` where res_status = 1";
    //     $entries = mysqli_query($con, $sql);
    //     return $entries;
    // }
    // $db_restaurant = get_status_restaurant($con);
    // $row_available_restaurant = mysqli_fetch_array($db_restaurant)["count_stat"];

    // // ประเภทร้านอาหาร
    // function get_cat_restaurant($con)
    // {
    //     $sql = "SELECT count(res_cat_id) as count_cat FROM `sfa_res_category`";
    //     $entries = mysqli_query($con, $sql);
    //     return $entries;
    // }
    // $db_restaurant = get_cat_restaurant($con);
    // $row_category = mysqli_fetch_array($db_restaurant)["count_cat"];
?>

<div class="header pb-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-1 col-7">
                    <h6 class="h1 d-inline-block mb-0">ปีปฏิทิน</h6>
                </div>
                <div class="col-lg">
                    <select name="" id="">
                        <option value="">2022</option>
                    </select>
                    <!-- <a href="#" class="btn btn-primary">2565</a>
                    <a href="#" class="btn btn-secondary">2566</a> -->
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
                                    <h5 class="card-title text-uppercase text-muted mb-0">จำนวนร้านอาหารทั้งหมด</h5>
                                    <span class="h2 font-weight-bold mb-0"><?php echo $row_restaurant ?></span>
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
                                    <span class="h2 font-weight-bold mb-0"> <?php echo $row_available_restaurant; ?></span>
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
                                    <h5 class="card-title text-uppercase text-muted mb-0">ประเภทร้านอาหาร</h5>
                                    <span class="h2 font-weight-bold mb-0"><?php echo $row_category; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
   exit;
    // ผลตรวจการใช้ฟอร์มาลีนจำแนกตามประเภทของร้านอาหาร
    function get_quantity_category($con) {
        $sql = "SELECT res_cat_title , count(res_cat_title) as cat_quantity FROM `sfa_restaurant` natural join sfa_res_category group by res_cat_title";
        $entries = mysqli_query($con, $sql);
        return $entries;
    }
    $category_name = array();
    $category_quantity = array();
    $quantity_category = get_quantity_category($con);
    while ($entry = mysqli_fetch_array($quantity_category)) {
        array_push($category_name, $entry['res_cat_title']);
        array_push($category_quantity, $entry['cat_quantity']);
    }
    
    // อัตราส่วนร้านที่ใช้ฟอร์มาลิน
    function get_quantity_blocks($con)
    {
        $sql = "SELECT block_title, count(block_id) as block_quantity FROM `sfa_restaurant` natural join sfa_block group by block_id";
        // echo $sql;
        $entries = mysqli_query($con, $sql);
        return $entries;
    }
    $block_titles = array();
    $block_quantity = array();
    $quantity_blocks = get_quantity_blocks($con);
    while ($entry = mysqli_fetch_array($quantity_blocks)) {
        array_push($block_titles, $entry['block_title']);
        array_push($block_quantity, $entry['block_quantity']);
    }

    // จำนวนร้านจำแนกตามปริมาณฟอร์มาลินที่ใช้
    function get_quantity_status($con)
    {
        $sql = "SELECT res_status , count(res_status) as res_quantity from sfa_restaurant group by res_status";
        // echo $sql;
        $entries = mysqli_query($con, $sql);
        return $entries;
    }
    $res_status = array();
    $res_quantity = array();
    $quantity_status = get_quantity_status($con);
    while ($entry = mysqli_fetch_array($quantity_status)) {
        array_push($res_status, $entry['res_status']);
        array_push($res_quantity, $entry['res_quantity']);
    }


    // Test Data
    $dataList = array();

    $chartList = array();
    foreach($category_name as $key => $value){
        // for คะแนนการตรวจสอบ
        $chartList[] = rand(10,100);
    }
    $jsonObj = new stdClass();
    $jsonObj->name = "ปลอดภัย";
    $jsonObj->data = $chartList;
    $dataList[] = json_encode($jsonObj, JSON_UNESCAPED_UNICODE);

    $chartList = array();
    foreach($category_name as $key => $value){
        // for คะแนนการตรวจสอบ
        $chartList[] = rand(10,100);
    }
    $jsonObj = new stdClass();
    $jsonObj->name = "ไม่ปลอดภัย";
    $jsonObj->data = $chartList;
    $dataList[] = json_encode($jsonObj, JSON_UNESCAPED_UNICODE);

    $dataColumnChart = "[".implode(",", $dataList)."]";
?>

<div class="container-fluid">

    <div class="row justify-content-sm-center py-5">
        <div class="col-sm-5">
            <div class="card">
                <div class="card-header bg-primary text-white text-center" style="font-size: 1.25rem;">
                    อัตราส่วนร้านที่พบฟอร์มาลิน 1/2565
                </div>
                <div class="card-body">
                    <!-- <div id="PieChartA"></div> -->
                    <canvas id="PieChartA" width="200" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card">
                <div class="card-header bg-primary text-white text-center" style="font-size: 1.25rem;">
                อัตราส่วนร้านที่พบฟอร์มาลิน 2/2565
                </div>
                <div class="card-body">
                    <!-- <div id="PieChartB"></div> -->
                    <canvas id="PieChartB" width="200" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-sm-center pb-5">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header bg-primary text-white text-start" style="font-size: 1.25rem;">
                ผลตรวจฟอร์มาลินของร้านจำแนกตามประเภทของร้านอาหาร
                </div>
                <div class="card-body">
                    <div id="ColumnChart"></div>
                </div>
            </div>
        </div>
    </div>

    <?php
        $sql = "SELECT * 
        FROM sfa_restaurant 
        NATURAL JOIN sfa_entrepreneur 
        NATURAL JOIN sfa_block
        NATURAL JOIN sfa_zone
        NATURAL JOIN sfa_res_category
        WHERE 1"; 
        $query = mysqli_query($con, $sql);  
    ?>
    <div class="row justify-content-sm-center pb-5">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header bg-primary text-white text-start" style="font-size: 1.25rem;">
                    รายการข้อมูลร้านอาหารทั้งหมด
                </div>
                <div class="card-body">
                    <div class="table-responsive py-4">
                        <table class="table table-striped stripe" id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th>ชื่อร้านอาหาร</th>
                                    <th>โซนร้านอาหาร</th> 
                                    <th>บล็อกร้านอาหาร </th>
                                    <th>ประเภท</th>  
                                    <th>ชื่อผู้ประกอบการ</th>  
                                    <th>เบอร์โทร</th>  
                                    <th>ผลการตรวจ</th>  
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row = mysqli_fetch_array($query)){ ?> 
                                <tr>
                                    <td><?php echo $row["res_title"]; ?></td> 
                                    <td><?php echo $row["zone_title"]; ?></td> 
                                    <td><?php echo $row["block_title"]; ?></td> 
                                    <td><?php echo $row["res_cat_title"]; ?></td> 
                                    <td><?php echo $row["ent_title"]." ".$row["ent_firstname"]." ".$row["ent_lastname"]; ?></td> 
                                    <td><?php echo $row["ent_tel"]; ?></td> 
                                    <td></td> 
                                </tr>
                                <?php } // End while ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            

        </div>
    </div>
    
</div>

<div class="container">
    <div class="row">
        <?php include("./pages/block-map.php"); ?>
    </div>

</div>

<script>
    
    getColumnChart()
    getPieChartA()
    getPieChartB()    

    function getColumnChart() {
        
        Highcharts.chart("ColumnChart", {
            chart: {
                type: "column",
            },
            title: {
                text: "ผลตรวจฟอร์มาลินของร้านจำแนกตามประเภทของร้านอาหาร"
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: <?= "['".implode("','", $category_name)."']" ?>,
                title: {
                    text: null
                },
                accessibility: {
                    description: "ผลการตรวจ"
                },
                labels: {
                    style: {
                        fontSize: "18px",
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: ""
                },
                labels: {
                    overflow: "justify",
                    format: "{value}"
                }
            },
            
            plotOptions: {
                column: {
                    pointPadding: 0.02,
                }
            },
            tooltip: {
                valueSuffix: "",
                stickOnContact: true,
                backgroundColor: "rgba(255, 255, 255, 0.93)"
            },
            series: <?= $dataColumnChart ?>,
        });

    }

    function getPieChartA() {

        const ctx = $("#PieChartA");

        const data = {
            // labels: [
            //     'ไม่พบสารฟอร์มาลีน',
            //     'พบสารฟอร์มาลีน < 100',
            //     'พบสารฟอร์มาลีน > 100'
            // ],
            labels: [
                'ไม่ปลอดภัย',
                'ปลอดภัย',
                'รอตรวจสอบ'
            ],
            datasets: [{
                label: 'อัตราส่วนร้านที่ใช้ฟอร์มาลิน',
                data: [150, 30, 250],
                backgroundColor: [
                    'rgb(255, 99, 132)',
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
                        text: 'อัตราส่วนร้านที่พบฟอร์มาลิน 1/2565',
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

    function getPieChartB() {

        const ctx = $("#PieChartB");

        const data = {
            labels: [
                'ไม่ปลอดภัย',
                'ปลอดภัย',
                'รอตรวจสอบ'
            ],
            datasets: [{
                label: 'อัตราส่วนร้านที่พบฟอร์มาลิน 2/2565',
                data: [300, 50, 100],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4,
            }]
        };

        const myChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'อัตราส่วนร้านที่พบฟอร์มาลิน 2/2565',
                        font: {
                            size: '24px',
                            weight: 'bold',
                        },
                        align: 'left'

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