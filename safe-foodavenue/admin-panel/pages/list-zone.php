<style>
    .odd {
        background-color: #f4f6f9 !important;
    }
</style>

<?php
    $sql = "SELECT * FROM `sfa_zone` ORDER BY `zone_id` DESC";
    $query = mysqli_query($con, $sql);
?>

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">รายการโซน</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">รายการโซน</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="?content=add-zone" class="btn btn-sm btn-neutral">เพิ่มโซน</a>
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
                    <?php if (mysqli_num_rows($query) > 0) : ?>
                    <table class="table table-striped display nowrap" id="datatable-basic" style="max-width: 100%">
                        <thead class="thead-light">
                            <tr>
                                <th>ลำดับที่</th>
                                <th>ชื่อโซน</th>
                                <th>รายละเอียด</th>
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
                                <td class="limit-char"><?php echo $row["zone_title"]; ?></td>
                                <td><?php echo $row["zone_description"]; ?></td>
                                <td>
                                    <a href="./?content=edit-zone&zone_id=<?php echo $row['zone_id'] ?>" class="btn btn-warning" title="เเก้ไขโซน"><i class="fa fa-pencil"></i></a>
                                    <a href="./?content=do_delete_zone&zone_id=<?php echo $row['zone_id'] ?>" title="ลบโซน" onclick="return confirm('ต้องการลบโซนที่เลือก?');">
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
                    <?php else : ?>
                        <div class="py-5">
                            <center>
                                <h3>ไม่พบข้อมูลโซน</h3>
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