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
                            <li class="breadcrumb-item active" aria-current="page">รายการบัญชีผู้ใช้งาน</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="?content=add-user" class="btn btn-sm btn-neutral">เพิ่มบัญชีผู้ใช้งาน</a>
                    <!-- <a href="?content=add-role-user" class="btn btn-sm btn-neutral">เพิ่มประเภทผู้ใช้งาน</a> -->
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
    FROM  sfa_user 
    LEFT JOIN sfa_role ON  sfa_user.us_role_id = sfa_role.role_id
    LEFT JOIN sfa_prefix ON us_pref_id = pref_id
    WHERE `sfa_user`.`us_accept_password` = 1
    ORDER BY sfa_user.us_id DESC";
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
                                <th>ชื่อ-นามสกุล</th>
                                <th>ประเภทผู้ใช้งาน</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $n = 1;
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?php echo $n; ?></td>
                                <td><?php
                                        echo $row["pref_title"];
                                        echo $row["us_fname"] . " " . $row["us_lname"]; 
                                        ?></td>
                                <td><?php
                                        echo $row["role_title"];
                                        ?></td>
                                <td>
                                    <a href="./?content=detail-user&us_id=<?php echo $row['us_id'] ?>" class="btn btn-primary" title="ดูรายละเอียดผู้ใช้งาน"><i class="fa fa-search"></i></a>
                                    <a href="./?content=edit-user&us_id=<?php echo $row["us_id"]; ?>" title="แก้ไขบัญชีผู้ใช้" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a href="./?content=do_delete_user&us_id=<?php echo $row['us_id'] ?>" title="ลบบัญชีผู้ใช้" onclick="return confirm('ต้องการลบบัญชีผู้ใช้งานที่เลือก?');">
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