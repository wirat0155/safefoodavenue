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
              <h6 class="h2 text-white d-inline-block mb-0">ผลการตรวจของร้านอาหาร</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                  <li class="breadcrumb-item active" aria-current="page">ผลการตรวจของร้านอาหาร</li>
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
        function get_allrestaurant($con)
        {
            $sql = "SELECT count(res_id) as count_res FROM `sfa_restaurant`";
            $entries = mysqli_query($con, $sql);
            return $entries;
        }
        $db_restaurant = get_allrestaurant($con);
        $row_restaurant = mysqli_fetch_array($db_restaurant)["count_res"];

        // จำนวนร้านอาหารที่ไม่ปลอดภัย
        function get_status_restaurant($con)
        {
            $sql = "SELECT count(res_status) as count_row FROM `sfa_restaurant` where res_status = 0";
            $entries = mysqli_query($con, $sql);
            return $entries;
        }
        $db_restaurant = get_status_restaurant($con);
        $row_not_safe = mysqli_fetch_array($db_restaurant)["count_row"];

        // จำนวนร้านอาหารที่ปลอดภัย
        function get_cat_restaurant($con)
        {
            $sql = "SELECT count(res_status) as count_row FROM `sfa_restaurant` where res_status = 0";
            $entries = mysqli_query($con, $sql);
            return $entries;
        }
        $db_restaurant = get_cat_restaurant($con);
        $row_safe = mysqli_fetch_array($db_restaurant)["count_row"];
    ?>

    <div class="header pb-6">
      <div class="container-fluid">
          <div class="header-body">
              <div class="row align-items-center py-4">
                  <div class="col-lg">
                      <h6 class="h1 d-inline-block mb-0 pr-3">รอบการตรวจ</h6>
                      <a href="#" class="btn btn-primary">ครั้งที่ 1</a>
                      <a href="#" class="btn btn-secondary">ครั้งที่ 2</a>
                  </div>
              </div>
              <!-- Card stats -->
              <!-- <div class="row">
                  <div class="col-md-4">
                      <div class="card card-stats"> -->
                          <!-- Card body -->
                          <!-- <div class="card-body">
                              <div class="row">
                                  <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">จำนวนร้านที่รอตรวจสอบ</h5>
                                      <span class="h2 font-weight-bold mb-0"><?php echo $row_restaurant ?></span>
                                  </div>
                                  <div class="col-auto">
                                  </div>
                              </div>

                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="card card-stats"> -->
                          <!-- Card body -->
                          <!-- <div class="card-body">
                              <div class="row">
                                  <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">จำนวนร้านอาหารที่ไม่ปลอดภัย</h5>
                                      <span class="h2 font-weight-bold mb-0"> <?php echo $row_not_safe; ?></span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="card card-stats"> -->
                          <!-- Card body -->
                          <!-- <div class="card-body">
                              <div class="row">
                                  <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">จำนวนร้านอาหารที่ปลอดภัย</h5>
                                      <span class="h2 font-weight-bold mb-0"><?php echo $row_safe; ?></span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div> -->

          </div>
      </div>
    </div>

    <!-- Content --> 
    <?php
       $sql = "SELECT * FROM sfa_restaurant NATURAL JOIN sfa_entrepreneur NATURAL JOIN sfa_block WHERE 1"; 
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
                    <th>สถานที่ตั้งร้าน </th>
                    <th>เจ้าของร้าน </th>  
                    <th> Action  </th>
                   
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
                    <td>
                      <?php 
                        $fullname = $row["ent_title"]." ".$row["ent_firstname"]." ".$row["ent_lastname"];
                        echo $fullname; 
                      ?>
                    </td> 
                    <td>
                      <a href="?content=history-res-result&res_id=<?php echo $row['res_id'] ?>">
                        <button class="btn btn-primary" style="font-size: 20px;line-height: 0.75;" title="ดูผลการตรวจ"><i class="fa fa-search"></i></button> 
                      </a>  
                      <!-- <a href="./?content=list-menu&res_id=</?php echo $row['res_id'] ?>" class="btn btn-primary" title="ดูรายการเมนู"><i class="fa fa-info"></i></a> -->
                      <?php //echo "<a href='https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/admin-panel/?content=edit-restaurant&res_id=".$row['res_id']."' class='btn btn-warning'>แก้ไขข้อมูล</a>"; ?>
                    </td>
                  </tr>
                  <?php
                    $n++;
                    }// End while 
                  ?> 
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    
      <!-- Footer -->
      <?php include("footer.php"); ?> 
    </div>