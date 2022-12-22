   <!-- Header -->
   <div class="header bg-primary pb-6">
       <div class="container-fluid">
           <div class="header-body">
               <div class="row align-items-center py-4">
                   <div class="col-lg-6 col-7">
                       <h6 class="h2 text-white d-inline-block mb-0">รายการล็อก</h6>
                       <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                           <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                               <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                               <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                               <li class="breadcrumb-item active" aria-current="page">ฺรายการล็อก</li>
                           </ol>
                       </nav>
                   </div>
                   <div class="col-lg-6 col-5 text-right">
                       <a href="?content=add-log" class="btn btn-sm btn-neutral">เพิ่มล็อก</a>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <style>
.odd {
    background-color: #f4f6f9 !important;
}
   </style>
   <!-- Content -->
   <?php
    $sql = "SELECT * FROM sfa_block WHERE 1";
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
                                   <th>ชื่อล็อก</th>
                                   <th>Latitude</th>
                                   <th>Longitude </th>
                                   <th> Action </th>


                               </tr>
                           </thead>

                           <tbody>
                               <?php
                  $n = 1;
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
                               <tr>
                                   <td><?php echo $n; ?></td>
                                   <td><?php echo $row["block_title"]; ?></td>
                                   <td><?php echo $row["block_lat"]; ?></td>
                                   <td><?php echo $row["block_lon"]; ?></td>
                                   <td>
                                       <a href="./?content=list-res-by-block&bid=<?php echo $row["block_id"]; ?>"><button class="btn btn-primary" title="แสดงร้านค้า"><i class="fa fa-search"></i></button> </a>
                                       <a href="./?content=edit-block-detail&bid=<?php echo $row["block_id"]; ?>" title="แก้ไขบล๊อก" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                       <a href="./?content=do_delete_block&block_id=<?php echo $row['block_id'] ?> " title="ลบบล๊อก" onclick="return confirm('ต้องการลบบล๊อกที่เลือก?');">
                                           <button class="btn btn-danger" style="font-size: 20px;line-height: 0.75;">
                                               <i class="ni ni-fat-remove"></i>
                                           </button>
                                   </td>
                               </tr>
                               <?php
                    $n++;
                  } // Wnd while 
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