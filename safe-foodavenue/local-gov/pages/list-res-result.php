<style>
  .odd {
      background-color: #f4f6f9 !important;
  }
</style>

<!-- Content --> 
<?php
  $sql = "SELECT * FROM `sfa_restaurant` 
          LEFT JOIN `sfa_entrepreneur` ON `sfa_restaurant`.`res_ent_id` = `sfa_entrepreneur`.`ent_id`
          LEFT JOIN `sfa_zone` ON `sfa_restaurant`.`res_zone_id` = `sfa_zone`.`zone_id`
          LEFT JOIN `sfa_block` ON `sfa_restaurant`.`res_block_id` = `sfa_block`.`block_id`
          ORDER BY `sfa_restaurant`.`res_id` DESC";
  $arr_restaurant = mysqli_query($con, $sql);
?>
<div class="header bg-primary">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">ผลการตรวจของร้านอาหาร</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
              <li class="breadcrumb-item active" aria-current="page">ผลการตรวจของร้านอาหาร</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="header pb-6">
  <div class="container-fluid">
      <div class="header-body">
          <div class="row align-items-center py-4">
              <div class="col-lg">
                  <h6 class="h1 d-inline-block mb-0 pr-3">รอบการตรวจ</h6>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card border-0">
        <div class="py-4">
          <?php if (mysqli_num_rows($arr_restaurant) > 0) : ?>
          <table class="table table-striped display nowrap" id="datatable-basic" style="max-width: 100%">
            <thead class="thead-light">
              <tr>
                <th>ลำดับที่</th>
                <th>ชื่อร้าน</th> 
                <th>สถานที่ตั้งร้าน </th>
                <th>เจ้าของร้าน </th>  
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $n = 1;
                while($obj_restaurant = mysqli_fetch_array($arr_restaurant)){  
              ?> 
              <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $obj_restaurant["res_title"]; ?></td> 
                <td><?php
                  if ($obj_restaurant["zone_title"])
                    echo $obj_restaurant["zone_title"] . "<br />";
                  if ($obj_restaurant["block_title"])
                    echo $obj_restaurant["block_title"];
                ?></td> 
                <td><?php echo $obj_restaurant["ent_firstname"] . " " . $obj_restaurant["ent_lastname"]; ?></td> 
                <td>
                  <a href="?content=history-res-result&res_id=<?php echo $obj_restaurant['res_id'] ?>">
                    <button class="btn btn-primary" style="font-size: 20px;line-height: 0.75;" title="ดูผลการตรวจ"><i class="fa fa-search"></i></button> 
                  </a>
                </td>
              </tr>
              <?php
                $n++;
                }
              ?>
            </tbody>
          </table>
          <?php else : ?>
            <div class="py-5">
              <center><h2>ไม่พบข้อมูลร้านอาหาร</h2></center>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include("footer.php"); ?> 
</div>