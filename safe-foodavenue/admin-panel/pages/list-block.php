<style>
    .odd {
        background-color: #f4f6f9 !important;
    }
</style>

<?php
    $sql = "SELECT * FROM `sfa_block` 
            LEFT JOIN `sfa_zone` ON `sfa_block`.`block_zone_id` = `sfa_zone`.`zone_id`
            ORDER BY `sfa_block`.`block_id` DESC";
    $arr_block = mysqli_query($con, $sql);
?>

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
                            <li class="breadcrumb-item active" aria-current="page">รายการล็อก</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="?content=add-block" class="btn btn-sm btn-neutral">เพิ่มล็อก</a>
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
                    <?php if (mysqli_num_rows($arr_block) > 0) : ?>
                    <table class="table table-striped display nowrap" id="datatable-basic" style="max-width: 100%">
                        <thead class="thead-light">
                            <tr>
                                <th>ลำดับที่</th>
                                <th>ชื่อล็อก</th>
                                <th>โซนร้านอาหาร</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $n = 1;
                            while ($obj_block = mysqli_fetch_array($arr_block)) {
                            ?>
                            <tr>
                                <td><?php echo $n; ?></td>
                                <td><?php echo $obj_block["block_title"]? $obj_block["block_title"] : "-"; ?></td>
                                <td><?php echo $obj_block["zone_title"]? $obj_block["zone_title"] : "-"; ?></td>
                                <td><?php echo $obj_block["block_lat"]? $obj_block["block_lat"] : "-"; ?></td>
                                <td><?php echo $obj_block["block_lon"]? $obj_block["block_lon"] : "-"; ?></td>
                                <td>
                                    <a href="./?content=list-res-by-block&block_id=<?php echo $obj_block["block_id"]; ?>" class="btn btn-primary" title="แสดงร้านค้า">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <a href="./?content=edit-block&block_id=<?php echo $obj_block["block_id"]; ?>" title="แก้ไขบล๊อก" class="btn btn-warning">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="./?content=do_delete_block&block_id=<?php echo $obj_block['block_id'] ?> " title="ลบบล๊อก" onclick="return confirm('ต้องการลบบล๊อกที่เลือก?');">
                                        <button class="btn btn-danger" style="font-size: 20px;line-height: 0.75;">
                                            <i class="ni ni-fat-remove"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                            $n++;
                            } // End while 
                            ?>
                        </tbody>
                    </table>
                    <?php else : ?>
                        <div class="py-5">
                            <center>
                                <h3>ไม่พบข้อมูลล็อก</h3>
                            </center>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include("footer.php"); ?>
</div>

<script>
    $(document).ready(function() {
        if ("<?php echo $_SESSION['crud-status']?>" == "0") {
            toastify_success();
        } else if ("<?php echo $_SESSION['crud-status']?>" == "1"){
            toastify_fail();
        }
        <?php unset($_SESSION['crud-status']) ?>
    });

    function toastify_success() {
        Toastify({
            text: "ดำเนินการสำเร็จ",
            duration: 5000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            style: {
                background: "#12a63a",
            }
        }).showToast();
    }
    function toastify_fail() {
        Toastify({
            text: "เกิดข้อผิดพลาด กรุณาลองอีกครั้ง",
            duration: 5000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            style: {
                background: "#a61212",
            }
        }).showToast();
    }
</script>