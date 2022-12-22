<!-- 
/*
* detail-restaurant
* detail-restaurant
* @input entprenuer name,  
* @output detail restaurant
* @author Jutamas Thaptong 62160079
* @Create Date 2565-06-20
*/ 
-->


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
                            <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">รายละเอียดร้านอาหาร</li>
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
$res_id = $_GET['res_id'];
$sql = "SELECT * 
FROM  `sfa_block` INNER JOIN `sfa_restaurant` 
   ON  `sfa_block`.`block_id` = `sfa_restaurant`.`block_id`
      WHERE sfa_restaurant.res_id = '" . $res_id . "'";
$dbRestaurant = mysqli_query($con, $sql);
$data = mysqli_fetch_array($dbRestaurant);

// $sql = " SELECT * FROM sfa_restaurant WHERE res_id = '".$res_id."' "; 
// $dbRestaurant = mysqli_query($con, $sql);
// $resInfo = mysqli_fetch_array($dbRestaurant);

// // $sql = " SELECT * FROM food_database WHERE res_id = '".$res_id."' "; 
// // $dbFood = mysqli_query($con, $sql);

function getRestaurantInfo($con, $res_id)
{
  //get restaurant info
  $sql = " SELECT * FROM sfa_restaurant NATURAL JOIN sfa_res_category NATURAL JOIN sfa_block NATURAL JOIN sfa_entrepreneur  WHERE res_id=" . $res_id;
  $dbRestaurant = mysqli_query($con, $sql);
  $resInfo = mysqli_fetch_assoc($dbRestaurant);
  return $resInfo;
}

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
    // https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/admin-panel/php/uploads/img/
    return "../admin-panel/php/uploads/img/" . $imgPath;
  }
//   https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/admin-panel/php/uploads/img/restaurant.png
  return "../admin-panel/php/uploads/img/restaurant.png";
}

function getFoodInfo($con, $res_id)
{
  //get food info
  $sql = " SELECT menu_name, for_radi FROM sfa_menu NATURAL JOIN sfa_formaline WHERE res_id=" . $res_id;
  // echo "<script>alert('$sql')</script>";
  $dbFood = mysqli_query($con, $sql);
  return $dbFood;
}

function getMenuInfo($con, $res_id)
{
  //get food info
  $sql = " SELECT * FROM sfa_menu  WHERE res_id=" . $res_id;
  // echo "<script>alert('$sql')</script>";
  $dbMenu = mysqli_query($con, $sql);
  return $dbMenu;
}
$resInfo = getRestaurantInfo($con, $res_id);
$resImg = getRestaurantImg($con, $res_id);
$dbFood = getFoodInfo($con, $res_id);
$dbMenu = getMenuInfo($con, $res_id)

?>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card border-0">
                <div class="table-responsive py-4 px-4">

                    <form action="#" method="POST" enctype="multipart/form-data">

                        <div class="row pb-4">
                            <div class="col-md-2">
                                <label>ชื่อร้านอาหาร</label>
                            </div>
                            <div class="col-md">
                                <?= $resInfo["res_title"] ?>
                            </div>
                        </div>

                        <hr style="margin-top: -1rem; margin-bottom: 1rem;">

                        <div class="row pb-4 justify-content-md-center">
                            <div class="col-md-8">
                                <img src="<?php echo getResImgPath($resImg) ?>" width=800 class="img-thumbnail rounded">
                            </div>
                        </div>

                        <div class="row pb-4">
                            <div class="col-md">
                                <label>รายละเอียดร้านอาหาร</label>
                            </div>
                        </div>

                        <hr style="margin-top: -1rem; margin-bottom: 1rem;">

                        <div class="row pb-4">
                            <div class="col-md">
                                <?= $resInfo["res_description"] ?>
                            </div>
                        </div>

                        <!-- <div class="row">
              <div class="col-md text-center mt-5">
                <b>รายการอาหารที่ผ่านตรวจสารฟอร์มาลิน ประจำปีงบประมาณ 2565</b>
              </div>
            </div> -->

                        <!-- รายการเมนู+ผลการตรวจ -->

                        <!-- <div class="row pb-4 justify-content-md-center">
              <div class="col-md-6">
                <table class="table table-bordered table-hover mb-5">
                  <tr>
                    <td class="text-center" style="font-size: 16px;">ลำดับ</td>
                    <td class="text-left" style="font-size: 16px;">รายการอาหาร</td>
                    <td class="text-center" style="font-size: 16px;">ผลการตรวจสอบ</td>
                  </tr>
                  </?php $no = 1 ?>
                  </?php while ($menu = mysqli_fetch_assoc($dbFood)) { ?>
                    <tr>
                      <td class="text-center" style="font-size: 16px;"></?= $no ?></td>
                      <td class="text-left" style="font-size: 16px;"></?= $menu["menu_name"] ?></td>
                      <td class="text-center" style="font-size: 16px;">
                        </?php
                        $status = $menu["for_radi"] >= 300 ? "text-success" : "text-danger";
                        ?>
                        <i class="fa fa-flag </?= $status ?>" aria-hidden="true"></i>
                      </td>
                    </tr>
                    </?php $no++; ?>
                  </?php } ?>
                </table>
              </div>
            </div> -->

                        <div class="row">
                            <div class="col-md text-center mt-5">
                                <b>รายการอาหาร</b>
                            </div>
                        </div>

                        <!-- รายการเมนูอย่างเดียว -->
                        <div class="row pb-4 justify-content-md-center">
                            <div class="col-md-6">
                                <table class="table table-bordered table-hover mb-5">
                                    <tr>
                                        <td class="text-center" style="font-size: 16px;">ลำดับ</td>
                                        <td class="text-left" style="font-size: 16px;">รายการอาหาร</td>
                                    </tr>
                                    <?php $no = 1 ?>
                                    <?php while ($menu = mysqli_fetch_assoc($dbMenu)) { ?>
                                    <tr>
                                        <td class="text-center" style="font-size: 16px;"><?= $no ?></td>
                                        <td class="text-left" style="font-size: 16px;"><?= $menu["menu_name"] ?></td>
                                    </tr>
                                    <?php $no++; ?>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>

                        <div class="row pb-4">
                            <div class="col-md">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td colspan="2" style="font-size: 18px;">
                                                ตำแหน่งร้านอาหาร
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 18px;">
                                                <div class="row mx-4 ">
                                                    <div class="col-md">
                                                        <label>ที่อยู่ : </label>
                                                        <?= $resInfo["res_address"] ?>
                                                    </div>
                                                    <div class="col-md">
                                                        <div id="map" style="width: 900px; height: 500px;"></div>
                                                        <?php //include "./pages/block-map.php"; ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>


                                </div>
                            </div>
                        </div>

                    </form>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-secondary pull-right" onclick="location.href='./?content=list-restaurant'">กลับ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        image = "../assets/img/brand/icon-store-green.png";
    } else {
        image = "../assets/img/brand/icon-store-grey.png";
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