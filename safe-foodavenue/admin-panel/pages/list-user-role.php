<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">รายการบัญชี</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">รายการประเภทผู้ใช้งาน</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="?content=add-role-user" class="btn btn-sm btn-neutral">เพิ่มประเภทผู้ใช้งาน</a>
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
$sql = "SELECT * 
FROM sfa_role";
$query = mysqli_query($con, $sql);
?>

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
                                <th>ประเภทผู้ใช้งาน</th>
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
                                <td class="limit-char"><?php
                                    echo $row["role_title"];
                                    ?></td>
                                <td>
                                    <a href="./?content=edit-user-role&role_id=<?php echo $row["role_id"]; ?>" title="แก้ไขประเภทผู้ใช้งาน" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a href="./?content=do_delete_user_role&role_id=<?php echo $row['role_id'] ?>" title="ลบประเภทผู้ใช้งาน" onclick="return confirm('ต้องการลบประเภทผู้ใช้งานที่เลือก?');">
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
                                <h3>ไม่พบข้อมูลประเภทผู้ใช้งาน</h3>
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
            text: "Action success",
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
            text: "Action failed",
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
