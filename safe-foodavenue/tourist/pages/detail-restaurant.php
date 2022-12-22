<!-- 
/*
* detail-restaurant
* detail-restaurant
* @input entprenuer name,  
* @output detail restaurant
* @author Jutamas Thaptong 62160079
* @Create Date 2565-06-24
*/ 
-->

<script>
function setRate(index, score) {

    $("#rating-score-" + index).val(score);

    for (let i = 1; i <= 5; i++) {
        if (i <= score) {
            $("#star-" + index + "-" + i).addClass('text-warning');
        } else {
            $("#star-" + index + "-" + i).removeClass('text-warning');
        }
    }

}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style>
.btn-custom {
    box-shadow: none !important;
}
</style>

<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">รายละเอียดร้านอาหาร</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./index.php?content=list-restaurant">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ฺรายละเอียดร้านอาหาร</li>
                        </ol>
                    </nav>
                </div>
                <!-- <div class="col-lg-6 col-5 text-right">
                    <a href="#" class="btn btn-sm btn-neutral">New</a>
                    <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                </div> -->
            </div>
        </div>
    </div>
</div>

<!-- Content -->
<?php
$res_id = isset($_GET["id"]) ? $_GET["id"] : "1";
// block และ restaurant
$sql = "SELECT * 
FROM  `sfa_block` INNER JOIN `sfa_restaurant` 
   ON  `sfa_block`.`block_id` = `sfa_restaurant`.`block_id`
      WHERE sfa_restaurant.res_id = '" . $res_id . "'";
$dbRestaurant = mysqli_query($con, $sql);
$data = mysqli_fetch_array($dbRestaurant);

//formalin และ restaurant 
//ใช้ query แยก เพราะบางร้านยังไม่มีผลตรวจ
$sqlFormalin = "SELECT * 
FROM  `sfa_formalin` INNER JOIN `sfa_restaurant` 
   ON  sfa_formalin.res_id = sfa_restaurant.res_id
      WHERE sfa_restaurant.res_id = '" . $res_id . "'";
$dbFormalin = mysqli_query($con, $sqlFormalin);
$dataFormalin = mysqli_fetch_array($dbFormalin);

//เมนูอาหาร
$sqlFood = " SELECT * FROM sfa_menu WHERE res_id = '" . $res_id . "' ";
$dbFood = mysqli_query($con, $sqlFood);
function getRestaurantImg($con, $res_id)
{
    //get restaurant image from database
    $sql = " SELECT * FROM sfa_res_image WHERE res_id=" . $res_id;
    // echo "<script>alert('$sql')</script>";
    $dbRestaurantImg = mysqli_query($con, $sql);
    if (mysqli_num_rows($dbRestaurantImg) == 0) {
        return FALSE;
    }
    //echo "<script>alert('".$resImg['res_img_path']."')</script>";
    $resImg = mysqli_fetch_array($dbRestaurantImg);
    return $resImg["res_img_path"];
}

function getResImgPath($imgPath)
{
    if ($imgPath) {
        return "https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/admin-panel/php/uploads/img/" . $imgPath;
    }
    return "https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/assets/img/theme/detail-banner-default.jpg";
}
$resImg = getRestaurantImg($con, $res_id);

//   $dbFood = [
//     [ "id" => "1", "name" => "กุ้งแม่น้ำ", "price" => 120, "status" => "Y"],
//     [ "id" => "2", "name" => "หมึกกระดอง", "price" => 120, "status" => "N"],
//     [ "id" => "3", "name" => "หอยนางรม", "price" => 80, "status" => "Y"],
//   ]
?>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card border-0">
                <div class="table-responsive py-4 px-4">

                    <div class="row pb-4">
                        <div class="col-md h2">
                            <label>รายละเอียดร้านอาหาร</label>
                        </div>
                    </div>

                    <hr style="margin-top: -1rem; margin-bottom: 1rem;">

                    <div class="row pb-4">

                        <!-- รูปร้าน -->
                        <div class="col-md-6">
                            <div class="row justify-content-md-center">
                                <!-- ชื่อร้าน -->
                                <div class="col-md-10">
                                    <div style="width: 100%; max-height:400px; overflow:hidden; border-radius:25px;">
                                        <!-- <img src="../assets/img/theme/detail-banner-default.jpg" alt="" style="width: 100%;"> -->
                                        <img src="<?php echo getResImgPath($resImg) ?>" alt="" style="width: 100%;">
                                    </div>
                                </div>
                            </div>



                            <!-- รูปเพิ่มเติม -->
                            <!-- <div class="row justify-content-md-center my-4">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md" style="padding: 0px 10px;">
                                            <div style="width: 100%; overflow:hidden; border-radius:10px;">
                                                <img src="../assets/img/theme/detail-banner-default.jpg" alt="" style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="col-md" style="padding: 0px 10px;">
                                            <div style="width: 100%; overflow:hidden; border-radius:10px;">
                                                <img src="../assets/img/theme/detail-banner-default.jpg" alt="" style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="col-md" style="padding: 0px 10px;">
                                            <div style="width: 100%; overflow:hidden; border-radius:10px;">
                                                <img src="../assets/img/theme/detail-banner-default.jpg" alt="" style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="col-md" style="padding: 0px 10px;">
                                            <div style="width: 100%; overflow:hidden; border-radius:10px;">
                                                <img src="../assets/img/theme/detail-banner-default.jpg" alt="" style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="col-md" style="padding: 0px 10px;">
                                            <div style="width: 100%; overflow:hidden; border-radius:10px;">
                                                <img src="../assets/img/theme/detail-banner-default.jpg" alt="" style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>

                        <div class="col-md-2 py-5">

                            <div class="row justify-content-md-center">
                                <!-- ชื่อร้าน -->
                                <div class="col-md-10 h1 text-weight-bold">
                                    <?= $data["res_title"] ?>
                                </div>
                            </div>

                            <div class="row justify-content-md-center">
                                <?php 
                            // $sql = " SELECT * FROM sfa_formalin NATURAL JOIN sfa_restaurant WHERE res_id=" . $res_id;
                            // $dbStatus = mysqli_query($con, $sql);
                            // $dataStatus = mysqli_fetch_array($dbStatus);
                            $sql = "SELECT * FROM sfa_restaurant";
                            $query = mysqli_query($con, $sql); 

                            
                            while($row = mysqli_fetch_array($query)){

                            $sql = "SELECT * FROM sfa_formalin WHERE res_id = ".$row["res_id"]." ";
                            $resultFormalin = mysqli_query($con, $sql); 

                            $flag = 0;
                            if(mysqli_num_rows($resultFormalin) > 0){
                                while($fRow = mysqli_fetch_array($resultFormalin)){
                                $flag = 1;
                                if($fRow["for_status"] == 2) { $flag = 2; }
                                }
                            }
                            }
                            ?>
                                <!-- สถานะธง -->
                                <div class="col-md-10" style="padding-top: 2rem;padding-bottom: 1rem;">
                                    <!-- <?php // if ($data["res_status"] == "1") { ?> -->
                                    <?php if($flag == 1){ ?>
                                    <div class="row">
                                        <div class="col-md-3 text-center align-items-center">
                                            <!-- <div class="btn-success rounded py-1"> -->
                                            <div>
                                                <!-- <i class="ni ni-check-bold"></i> ร้านอาหารธงเขียว  -->
                                                <img src="../assets/img/brand/favicon.png" style="width: 100px; height: 100px;">
                                            </div>
                                        </div>
                                    </div>
                                    <?php } else { ?>
                                    <div class="row">
                                        <div class="col-md-3 text-center align-items-center">
                                            <!-- <div class="btn-success rounded py-1"> -->
                                            <div>
                                                <!-- <i class="ni ni-check-bold"></i> ร้านอาหารธงเขียว  -->
                                                <img src="../assets/img/brand/green flag.jfif" style="width: 100px; height: 100px;">
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <!-- <?php  //} ?> -->
                                </div>
                            </div>

                            <div class=" row justify-content-md-center">
                                <?php 
                            $sql = " SELECT * FROM sfa_restaurant NATURAL JOIN sfa_entrepreneur  WHERE res_id=" . $res_id;
                            $dbTel = mysqli_query($con, $sql);
                            $dataTel = mysqli_fetch_array($dbTel);
                            ?>
                                <!-- เบอร์โทรติดต่อ -->
                                <div class="col-md-10 h3 text-weight-bold">
                                    เบอร์โทรติดต่อ
                                </div>
                            </div>
                            <div class="row justify-content-md-center">
                                <div class="col-md-10">
                                    <?= $dataTel["ent_tel"] ?>
                                </div>
                            </div>
                            <div class="row justify-content-md-center">
                                <!-- รายละเอียด -->
                                <div class="col-md-10 h3 text-weight-bold">
                                    รายละเอียด
                                </div>
                            </div>

                            <div class="row justify-content-md-center">
                                <div class="col-md-10">
                                    <?= $data["res_description"] ?>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4 py-5">
                            <div id="map" style="width: 700px; height: 300px;"></div>
                        </div>

                    </div>

                    <!-- เมนูอาหาร -->
                    <div class="row pb-4 justify-content-md-center">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md text-center mt-5">
                                    <div class="h2">เมนูอาหาร</div>
                                </div>
                            </div>
                            <!-- <div class="h2">เมนูอาหาร</div> -->
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <td class="bg-primary text-white font-weight-bold " style="font-size:16px;">ลำดับ</td>
                                        <td class="bg-primary text-white font-weight-bold " style="font-size:16px;">รายการ</td>
                                        <!-- <td class="bg-primary text-white font-weight-bold text-center" style="font-size:16px;">ราคา (บาท)</td> -->
                                    </tr>

                                    <!-- MenuList -->
                                    <?php //while($row = mysqli_fetch_array($dbFood)) {  
                                    ?>
                                    <?php $i = 1 ?>
                                    <?php foreach ($dbFood as $key => $value) { ?>
                                    <tr>
                                        <td style="font-size:16px;"><?php echo $i; ?></td>
                                        <td style="font-size:16px;"><?= $value["menu_name"] ?></td>
                                        <!-- <td class="text-center" style="font-size:16px;"><?= $value["menu_price"] ?></td> -->
                                        <?php $i++; ?>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="row pb-4">
                        <div class="col-md">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="col-md-10 h3 text-weight-bold" colspan="2" style="font-size: 18px;">
                                            ตำแหน่งร้านอาหาร
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 18px;">
                                            <div class="row mx-4 ">
                                                <div class="col-md">
                                                    <label>ที่อยู่ : </label>
                                                    <?= $data["res_address"] ?>
                                                </div>
                                                <div class="col-md">
                                                    <div id="map" style="width: 700px; height: 300px;"></div>
                                                    <!-- </?php include "./pages/block-detail-map.php"; ?> -->
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <form action="" method="post">

                        <div class="row pb-4">
                            <div class="col-md">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td class="col-md-10 h3 text-weight-bold" colspan="2" style="font-size: 18px;">
                                                รีวิวร้านอาหาร
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="mx-2 text-center" style="font-size: 18px;">

                                                <div class="row justify-content-md-center">
                                                    <div class="col-md-6">

                                                        <div class="row">
                                                            <div class="col-md-2 text-left my-auto">รสชาติอาหาร: </div>
                                                            <div class="col-md text-left">

                                                                <?php $checkStar = True ? "text-warning" : ""; ?>
                                                                <button type="button" class="btn btn-custom d-inline text-xl" onclick="setRate(1, 1)"><i id="star-1-1" class="fa fa-star <?= $checkStar ?>"></i></button>

                                                                <?php $checkStar = True ? "text-warning" : ""; ?>
                                                                <button type="button" class="btn btn-custom d-inline text-xl" onclick="setRate(1, 2)"><i id="star-1-2" class="fa fa-star <?= $checkStar ?>"></i></button>

                                                                <?php $checkStar = False ? "text-warning" : ""; ?>
                                                                <button type="button" class="btn btn-custom d-inline text-xl" onclick="setRate(1, 3)"><i id="star-1-3" class="fa fa-star <?= $checkStar ?>"></i></button>

                                                                <?php $checkStar = False ? "text-warning" : ""; ?>
                                                                <button type="button" class="btn btn-custom d-inline text-xl" onclick="setRate(1, 4)"><i id="star-1-4" class="fa fa-star <?= $checkStar ?>"></i></button>

                                                                <?php $checkStar = False ? "text-warning" : ""; ?>
                                                                <button type="button" class="btn btn-custom d-inline text-xl" onclick="setRate(1, 5)"><i id="star-1-5" class="fa fa-star <?= $checkStar ?>"></i></button>

                                                                <input type="hidden" id="rating-score-1" name="rating[]" value="0">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-2 text-left my-auto">ราคา: </div>
                                                            <div class="col-md text-left">

                                                                <?php $checkStar = True ? "text-warning" : ""; ?>
                                                                <button type="button" class="btn btn-custom d-inline text-xl" onclick="setRate(2, 1)"><i id="star-2-1" class="fa fa-star <?= $checkStar ?>"></i></button>

                                                                <?php $checkStar = True ? "text-warning" : ""; ?>
                                                                <button type="button" class="btn btn-custom d-inline text-xl" onclick="setRate(2, 2)"><i id="star-2-2" class="fa fa-star <?= $checkStar ?>"></i></button>

                                                                <?php $checkStar = True ? "text-warning" : ""; ?>
                                                                <button type="button" class="btn btn-custom d-inline text-xl" onclick="setRate(2, 3)"><i id="star-2-3" class="fa fa-star <?= $checkStar ?>"></i></button>

                                                                <?php $checkStar = False ? "text-warning" : ""; ?>
                                                                <button type="button" class="btn btn-custom d-inline text-xl" onclick="setRate(2, 4)"><i id="star-2-4" class="fa fa-star <?= $checkStar ?>"></i></button>

                                                                <?php $checkStar = False ? "text-warning" : ""; ?>
                                                                <button type="button" class="btn btn-custom d-inline text-xl" onclick="setRate(2, 5)"><i id="star-2-5" class="fa fa-star <?= $checkStar ?>"></i></button>

                                                                <input type="hidden" id="rating-score-2" name="rating[]" value="0">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-2 text-left my-auto">การบริการ: </div>
                                                            <div class="col-md text-left">

                                                                <?php $checkStar = True ? "text-warning" : ""; ?>
                                                                <button type="button" class="btn btn-custom d-inline text-xl" onclick="setRate(3, 1)"><i id="star-3-1" class="fa fa-star <?= $checkStar ?>"></i></button>

                                                                <?php $checkStar = False ? "text-warning" : ""; ?>
                                                                <button type="button" class="btn btn-custom d-inline text-xl" onclick="setRate(3, 2)"><i id="star-3-2" class="fa fa-star <?= $checkStar ?>"></i></button>

                                                                <?php $checkStar = False ? "text-warning" : ""; ?>
                                                                <button type="button" class="btn btn-custom d-inline text-xl" onclick="setRate(3, 3)"><i id="star-3-3" class="fa fa-star <?= $checkStar ?>"></i></button>

                                                                <?php $checkStar = False ? "text-warning" : ""; ?>
                                                                <button type="button" class="btn btn-custom d-inline text-xl" onclick="setRate(3, 4)"><i id="star-3-4" class="fa fa-star <?= $checkStar ?>"></i></button>

                                                                <?php $checkStar = False ? "text-warning" : ""; ?>
                                                                <button type="button" class="btn btn-custom d-inline text-xl" onclick="setRate(3, 5)"><i id="star-3-5" class="fa fa-star <?= $checkStar ?>"></i></button>

                                                                <input type="hidden" id="rating-score-3" name="rating[]" value="0">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-2 text-left my-auto">ความสะอาด: </div>
                                                            <div class="col-md text-left">

                                                                <?php $checkStar = True ? "text-warning" : ""; ?>
                                                                <button type="button" class="btn btn-custom d-inline text-xl" onclick="setRate(4, 1)"><i id="star-4-1" class="fa fa-star <?= $checkStar ?>"></i></button>

                                                                <?php $checkStar = True ? "text-warning" : ""; ?>
                                                                <button type="button" class="btn btn-custom d-inline text-xl" onclick="setRate(4, 2)"><i id="star-4-2" class="fa fa-star <?= $checkStar ?>"></i></button>

                                                                <?php $checkStar = True ? "text-warning" : ""; ?>
                                                                <button type="button" class="btn btn-custom d-inline text-xl" onclick="setRate(4, 3)"><i id="star-4-3" class="fa fa-star <?= $checkStar ?>"></i></button>

                                                                <?php $checkStar = True ? "text-warning" : ""; ?>
                                                                <button type="button" class="btn btn-custom d-inline text-xl" onclick="setRate(4, 4)"><i id="star-4-4" class="fa fa-star <?= $checkStar ?>"></i></button>

                                                                <?php $checkStar = False ? "text-warning" : ""; ?>
                                                                <button type="button" class="btn btn-custom d-inline text-xl" onclick="setRate(4, 5)"><i id="star-4-5" class="fa fa-star <?= $checkStar ?>"></i></button>

                                                                <input type="hidden" id="rating-score-4" name="rating[]" value="0">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="row pb-4 justify-content-md-center">
                                                    <div class="col-md-10 text-left">
                                                        <label>เขียนรีวิว :</label>
                                                        <br>
                                                        <textarea class="w-100" name="text_review" id="text_review" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>

                                                <div class="row pb-4 justify-content-md-center">
                                                    <div class="col-md-10 text-right">
                                                        <button type="submit" class="btn btn-lg btn-info px-5 text-center">บันทึก</button>
                                                        <button type="reset" class="btn btn-lg btn-danger px-5 text-center">ยกเลิก</button>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    var lat =
        '<?= $data["block_lat"] ?>'; //มีการส่งค่าตัวแปร block_lat php ที่มีการเก็บค่า field lati จากฐานข้อมูลมาเก็บไว้ในตัวแปร lat ของ javascript
    var long =
        '<?= $data["block_lon"] ?>'; //มีการส่งค่าตัวแปร block_lon php ที่มีการเก็บค่า field longti จากฐานข้อมูลมาเก็บไว้ในตัวแปร long ของ javascript
    console.log(lat, long);
    var marker;
    //ปิดหมุดที่ไม่เกี่ยวข้อง
    var myStyles = [{
        featureType: "poi",
        elementType: "labels",
        stylers: [{
            visibility: "off"
        }]
    }];

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: new google.maps.LatLng(13.285381, 100.913837),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: myStyles
    });

    var infowindow = new google.maps.InfoWindow();

    var restStatus = '<?= $dataFormalin["for_status"] ?>';
    console.log(restStatus);
    var checkStatus = true;
    if (restStatus == 2) {
        image = "../assets/img/brand/favicon.png";
    } else {
        image = "../assets/img/brand/favicon-grey.png";
    }

    marker = new google.maps.Marker({
        position: new google.maps.LatLng(lat, long),
        icon: image,
        map: map
    });

    google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {

            // set window content
            var makerContent = ""
            // title
            makerContent += "<div class='maker-title'>" + '<?= $data["block_title"] ?>' + "</div>";
            // restuarant content
            makerContent += "<table style='width:100%'>";
            makerContent += "<tr><td>" + '<?= $data["res_title"] ?>' + "</td></tr>";
            makerContent += "</table>";

            infowindow.setContent(makerContent);
            infowindow.open(map, marker);
        }
    })(marker));
    </script>

    <!-- Footer -->
    <?php include("footer.php"); ?>
</div>