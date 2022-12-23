<?php
    $sql = "SELECT * FROM sfa_restaurant 
            LEFT JOIN sfa_entrepreneur ON sfa_restaurant.res_ent_id = sfa_entrepreneur.ent_id
            LEFT JOIN sfa_zone ON sfa_restaurant.res_zone_id = sfa_zone.zone_id
            LEFT JOIN sfa_block ON sfa_restaurant.res_block_id = sfa_block.block_id
            WHERE `sfa_block`.`block_id` = '". $_GET["block_id"] . "'";
    $query = mysqli_query($con, $sql);
    $arr_restaurant = mysqli_query($con, $sql);
?>

<style>
    .odd {
        ackground-color: #f4f6f9 !important;
    }
</style>

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
            </div>
        </div>
    </div>
</div>
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
                                <td><?php echo $row["res_title"]; ?></td>
                                <td><?php 
                                if ($row["zone_title"])
                                    echo $row["zone_title"] . "<br />";
                                if ($row["block_title"])
                                    echo $row["block_title"];
                                ?></td>
                                <td><?php echo $row["ent_firstname"] . " " . $row["ent_lastname"]; ?></td>
                                <td>
                                    <a href="./?content=detail-restaurant&res_id=<?php echo $row['res_id'] ?>" class="btn btn-primary" title="ดูรายละเอียดร้านอาหาร"><i class="fa fa-search"></i></a>
                                    <a href="./?content=edit-restaurant&res_id=<?php echo $row['res_id'] ?>" title="เเก้ไขข้อมูลร้านอาหาร" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a href="./?content=do_delete_res&res_id=<?php echo $row['res_id'] ?>" title="ลบร้านอาหาร" onclick="return confirm('ต้องการลบร้านอาหารที่เลือก?');">
                                        <button class="btn btn-danger" style="font-size: 20px;line-height: 0.75;">
                                            <i class="ni ni-fat-remove"></i>
                                        </button>
                                </td>
                            </tr>
                            <?php
                            $n++;
                            } // End while 
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