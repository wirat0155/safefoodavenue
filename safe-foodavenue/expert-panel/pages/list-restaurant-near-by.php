<!-- 
/*
* list_restaurant
* list_restaurant
* @input -
* @output -
* @author Jutamas Thaptong 62160079
* @Create Date 2565-06-20
*/ 
-->
<style>
  .odd {
    background-color: #f4f6f9 !important;
  }
</style>
<!-- Header -->
<div class="header bg-primary">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">รายการร้านอาหารที่อยู่ใกล้ฉัน</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
              <li class="breadcrumb-item active" aria-current="page">รายการร้านอาหาร</li>
            </ol>
          </nav>
        </div>
        <!-- <div class="col-lg-6 col-5 text-right">
              <a href="?content=add-restaurant" class="btn btn-sm btn-neutral">เพิ่มร้านอาหาร</a>
            </div> -->
      </div>
    </div>
  </div>
</div>

<?php
// จำนวนร้านที่รอตรวจสอบ
$lat = $_POST["lat"];
$long = $_POST["long"];

function distance($lat1, $lon1, $lat2, $lon2, $unit)
{
  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
    return 0;
  } else {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
      return ($miles * 1.609344);
    } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
      return $miles;
    }
  }
}

?>

<div class="header pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
       
      </div>
      <!-- Card stats -->
   
    </div>
  </div>
</div>

<!-- Content -->
<?php
$sql = "SELECT * FROM sfa_restaurant LEFT JOIN sfa_block
ON sfa_restaurant.res_block_id =  sfa_block.block_id WHERE 1";
$query = mysqli_query($con, $sql);
?>

<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card border-0">

        <!-- <div class="row p-4">
              <div class="col-md">
                <button type="button" class="btn btn-primary py-2">รอตรวจสอบ</button>
                <button type="button" class="btn btn-secondary py-2">ไม่ปลอดภัย</button>
                <button type="button" class="btn btn-secondary py-2">ปลอดภัย</button>
              </div>
            </div> -->

        <div class="table-responsive py-4">
          <table class="table table-flush" id="datatable-basic">
            <thead class="thead-light">
              <tr>
                <th>ลำดับที่</th>
                <th>ชื่อร้าน</th>
                <th>สถานที่ตั้งร้าน</th>
                <th>ระยะห่าง</th>
                <th>เจ้าของร้าน</th>
                <th>สถานะ</th>
                <th>Action</th>

              </tr>
            </thead>

            <tbody>
              <?php
              $n = 1;
              while ($row = mysqli_fetch_array($query)) {
                if ($row["block_lat"] != "") {
                  $dist = distance($lat, $long, $row["block_lat"], $row["block_lon"], "K");
                  $dist = $dist * 100;
                }

              ?>
                <?php
                if ($dist < 110) {
                ?>
                  <?php
                  # รายการเมนู
                  $sql = "SELECT * FROM `sfa_menu` WHERE menu_res_id = " . $row["res_id"] . " ORDER BY `menu_id` ASC";
                  $dbMenu = mysqli_query($con, $sql);
                  $countMenu = mysqli_num_rows($dbMenu);
                  $menuList = [];
                  while ($rowMenu = mysqli_fetch_array($dbMenu)) {
                    $menuList[] = $rowMenu["menu_id"];
                  }
                  $menuList = implode("','", $menuList);

                  // สถานะตรวจสอบของแต่ละร้าน
                  $sql = "
                      SELECT for_status
                      FROM `sfa_formalin` 
                      WHERE for_res_id = " . $row["res_id"] . " 
                      AND for_menu_id in ('" . $menuList . "')
                    ";
                  $dbFormalin = mysqli_query($con, $sql);
                  $countFormalin = mysqli_num_rows($dbFormalin);

                  $formalin_status = 0;
                  if ($countFormalin == $countMenu && $countFormalin !== 0) { // ถ้าตรวจครบแล้ว
                    $formalin_status = 2; // ปลอดภัย
                    while ($rowFormalin = mysqli_fetch_array($dbFormalin)) {
                      if ($rowFormalin["for_status"] == 1) {
                        $formalin_status = 1; // ไม่ปลอดภัย
                      }
                    }
                  }
                  ?>

                  <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo $row["res_title"]; ?></td>
                    <td><?php echo $row["block_title"]; ?></td>
                    <td><?php echo round($dist, 2);  ?> ม. </td>
                    <td>
                      <?php
                      $fullname = $row["ent_title"] . " " . $row["ent_firstname"] . " " . $row["ent_lastname"];
                      echo $fullname;
                      ?>
                    </td>
                    <td>
                      <?php if ($formalin_status == 0) { ?>
                        <div style="color: #888;">รอตรวจสอบ</div>
                      <?php } ?>
                      <?php if ($formalin_status == 1) { ?>
                        <div class="text-danger">ไม่ปลอดภัย</div>
                      <?php } ?>
                      <?php if ($formalin_status == 2) { ?>
                        <div class="text-success">ปลอดภัย</div>
                      <?php } ?>
                    </td>
                    <td>
                      <!-- ลิ้งค์เก่า -->
                    <!-- https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/expert-panel/?content=list-menu&res_id= -->
                      <a href="./?content=list-menu&res_id=<?= $row['res_id'] ?>">
                        <button class="btn btn-primary" style="font-size: 20px;line-height: 0.75;" title="ดูรายการเมนู"><i class="fa fa-search"></i></button>
                      </a>
                      <?php //echo "<a href='https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/admin-panel/?content=edit-restaurant&res_id=".$row['res_id']."' class='btn btn-warning'>แก้ไขข้อมูล</a>"; 
                      ?>
                    </td>
                  </tr>
              <?php
                } // End distance if
                $n++;
              } // End while 
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<script>
   $(document).ready(function() {
        var my_lat = <?php echo  $_POST["lat"] ?> ;
        var my_lon = <?php echo  $_POST["long"] ?> ;

        console.log("test");
        fetch("https://maps.googleapis.com/maps/api/geocode/json?latlng=" + my_lat + "," + my_lon + "&key=AIzaSyAxCoeDi4K2LJTzTC1VzL2DEJcD5srXq0o")
                    .then(response => response.json())
                    .then(data => {
                        // The data object contains the full address of the location, including the province
                        const addressComponents = data.results[0].address_components;

                        console.log(data.results[0].address_components.length);


                        for (let i = 0; i < data.results[0].address_components.length; i++) {

                            if (data.results[0].address_components[i].long_name.length == "5" && Number.isInteger(+data.results[0].address_components[i].long_name)) {

                               // get_data_res_near_me(data.results[0].address_components[i].long_name);

                            } else {
                                let html = '';

                                html += '<div class="container p-9">';
                                html += '<div class="row text-center">';
                                html += '<div class="col text-center">';
                                html += '<h1>ไม่พบร้านค้า ไกล้ตำแหน่งของคุณ</h1>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="row mt-4 text-center">';
                                html += '<div class="col text-center">';

                                html += '</div>';
                                html += '</div>';
                                html += '</div>';

                                $('#list_res').html(html);

                            }
                        }

                    });

   });
</script>


  <!-- Footer -->
  <?php include("footer.php"); ?>
</div>