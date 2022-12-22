   <!-- Header -->
   <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">รายการร้านอาหาร</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                  <li class="breadcrumb-item active" aria-current="page">รายการร้านอาหาร</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="?content=add-log" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
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
                    <td><?php echo $row["block_title"]; ?></td> 
                    <td>
                      <a href="#"><button class="btn btn-primary">ดูรายละเอียด</button></a> 
                      <a href="#"><button class="btn btn-warning">แก้ไขข้อมูล</button></a> 
                    </td>
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
    
      <!-- Footer -->
      <?php include("footer.php"); ?> 
    </div>