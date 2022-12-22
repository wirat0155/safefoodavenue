<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<!-- Core -->
<script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/vendor/js-cookie/js.cookie.js"></script>
<script src="../../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="../../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->


<script src="../../assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="../../assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../../assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../../assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../../assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
<!-- Argon JS -->
<script src="../../assets/js/argon.js?v=1.1.0"></script>

<?php
    // จำนวนร้านอาหารทั้งหมด
    function get_allrestaurant($con)
    {
        $sql = "SELECT count(res_id) as count_res FROM `sfa_restaurant`";
        $entries = mysqli_query($con, $sql);
        return $entries;
    }
    $db_restaurant = get_allrestaurant($con);
    $row_restaurant = mysqli_fetch_array($db_restaurant)["count_res"];

    // จำนวนร้านอาหารที่เปิดกิจการอยู่
    function get_status_restaurant($con)
    {
        $sql = "SELECT count(res_status) as count_stat FROM `sfa_restaurant` where res_status = 1";
        $entries = mysqli_query($con, $sql);
        return $entries;
    }
    $db_restaurant = get_status_restaurant($con);
    $row_available_restaurant = mysqli_fetch_array($db_restaurant)["count_stat"];

    // ประเภทร้านอาหาร
    function get_cat_restaurant($con)
    {
        $sql = "SELECT count(res_cat_id) as count_cat FROM `sfa_res_category`";
        $entries = mysqli_query($con, $sql);
        return $entries;
    }
    $db_restaurant = get_cat_restaurant($con);
    $row_category = mysqli_fetch_array($db_restaurant)["count_cat"];

    function get_for_status2($con){

        $sql = "SELECT COUNT(for_status) as status_formalin FROM `sfa_formalin` where for_status = 1";
        $entries = mysqli_query($con,$sql);
        return $entries;

    }
    $db_forstatus2 = get_for_status2($con);
    $forstatus2 = mysqli_fetch_array($db_forstatus2)["status_formalin"];


    function get_for_status1($con){

        $sql = "SELECT COUNT(for_status) as status_formalin FROM `sfa_formalin` where for_status = 1";
        $entries = mysqli_query($con,$sql);
        return $entries;
    }

    $db_forstatus1 = get_for_status1($con);
    $forstatus1 = mysqli_fetch_array($db_forstatus1)["status_formalin"];
    
?>


<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">ภาพรวมข้อมูล</h6>
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
    $jsonObj->name = "ผ่าน";
    $jsonObj->data = $chartList;
    $dataList[] = json_encode($jsonObj, JSON_UNESCAPED_UNICODE);

    $chartList = array();
    foreach($category_name as $key => $value){
        // for คะแนนการตรวจสอบ
        $chartList[] = rand(10,100);
    }
    $jsonObj = new stdClass();
    $jsonObj->name = "ไม่ผ่าน";
    $jsonObj->data = $chartList;
    $dataList[] = json_encode($jsonObj, JSON_UNESCAPED_UNICODE);

    $dataColumnChart = "[".implode(",", $dataList)."]";
?>

<!-- container -->
<div class="container">

    <div class="row py-5">
        <div class="col-sm-6">
            <div id="PieChartA"></div>
        </div>
        <div class="col-sm-6">
            <div id="PieChartB"></div>
        </div>
    </div>

    <div class="row justify-content-sm-center pb-5">
        <div class="col-sm-12">
            <div id="ColumnChart"></div>
        </div>
    </div>

    <?php
        $sql = "SELECT * FROM sfa_restaurant NATURAL JOIN sfa_entrepreneur NATURAL JOIN sfa_block WHERE 1"; 
        $query = mysqli_query($con, $sql);  
    ?>
    <div class="row justify-content-sm-center pb-5">
        <div class="col-sm-12">
            <div class="table-responsive py-4">
                <table class="table table-flush" id="table-dashboard">
                    <thead class="thead-light">
                        <tr>
                            <th>ลำดับที่</th>
                            <th>ชื่อร้าน</th> 
                            <th>สถานที่ตั้งร้าน </th>
                            <th>เจ้าของร้าน </th>  
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 1;
                            while($row = mysqli_fetch_array($query)){  
                        ?> 
                        <tr>
                            <td><?php echo $n; ?></td>
                            <td><?php echo $row["res_title"]; ?></td> 
                            <td><?php echo $row["block_title"]; ?></td> 
                            <td><?php echo $row["block_title"]; ?></td> 
                        </tr>
                        <?php
                            $n++;
                            }// Wnd while 
                        ?> 
                    
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    
</div>

<script>
    
    
    getColumnChart()
    getPieChartA()
    getPieChartB()

    $(document).ready(function () {
        $('#table-dashboard').DataTable({
            lengthMenu: [
                [10, 25, 50, 'All'],
            ],
        });
    });

    function getColumnChart() {
        
        Highcharts.chart("ColumnChart", {
            chart: {
                type: "column",
            },
            title: {
                text: "ผลตรวจการใช้ฟอร์มาลีนจำแนกตามประเภทของร้านอาหาร"
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
        Highcharts.chart('PieChartA', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'อัตราส่วนร้านที่ใช้ฟอร์มาลิน'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        distance: -75,
                    }
                }
            },
            series: [{
                name: 'คะแนน',
                colorByPoint: true,
                data: [
                    {
                        name: 'ผ่านเกณฑ์',
                        y: 55
                    }, {
                        name: 'ไม่ผ่านเกณฑ์',
                        y: 45
                    }
                ]
            }]
        });
    }

    function getPieChartB() {
        Highcharts.chart('PieChartB', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'จำนวนร้านจำแนกตามปริมาณฟอร์มาลินที่ใช้'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        distance: -75,
                    }
                }
            },
            series: [{
                name: 'คะแนน',
                colorByPoint: true,
                data: [
                    {
                        name: 'ไม่พบสารฟอร์มาลีน',
                        y: 10
                    }, {
                        name: 'พบสารฟอร์มาลีน < 100',
                        y: 45
                    }, {
                        name: 'พบสารฟอร์มาลีน > 100',
                        y: 45
                    }
                ]
            }]
        });
    }

</script>