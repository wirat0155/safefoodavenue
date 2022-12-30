<!-- 
/*
* detail-user
* detail-user
* @input ,  
* @output detail user
* @author Jutamas Thaptong 62160079
* @Create Date 2565-06-20
*/ 
-->


<style>
    .btn-custom {
        box-shadow: none !important;
    }
</style>

<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">รายละเอียดผู้ใช้งาน</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">รายละเอียดผู้ใช้งาน</li>
                        </ol>
                    </nav>
                </div>
                <!-- <div class="col-lg-6 col-5 text-right">
          <a href="#" class="btn btn-sm btn-neutral">New</a>
          <a href="#" class="btn btn-sm btn-neutral">Filters</a>
        </div> -->
            </div>
        </div>
    </div>
</div>

<!-- Content -->
<?php
require("../php/config.php"); 
$us_id = $_GET['us_id'];
//$us_id = isset($_GET["us_id"]) ? $_GET["us_id"] : "1";

// $sql = " SELECT * FROM sfa_restaurant WHERE res_id = '".$res_id."' "; 
// $dbRestaurant = mysqli_query($con, $sql);
// $resInfo = mysqli_fetch_array($dbRestaurant);

// // $sql = " SELECT * FROM food_database WHERE res_id = '".$res_id."' "; 
// // $dbFood = mysqli_query($con, $sql);
// function getUserInfo($con, $us_id)
// {
//     $sql = "SELECT * 
//     FROM  sfa_user INNER JOIN sfa_role 
//        ON  sfa_user.us_role_id = sfa_role.role_id
//        INNER JOIN sfa_prefix
//        ON  sfa_user.us_pre_id = sfa_prefix.pref_id
//        WHERE us_id=  $us_id";
//     $dbUser = mysqli_query($con, $sql);
//     $usInfo = mysqli_fetch_assoc($dbUser);
//     return $usInfo;
// }

// $usInfo = getUserInfo($con, $us_id);
// $sql = "SELECT * 
//         FROM  sfa_user INNER JOIN sfa_role 
//         ON  sfa_user.us_role_id = sfa_role.role_id
//         INNER JOIN sfa_prefix
//         ON  sfa_user.us_pre_id = sfa_prefix.pref_id
//         WHERE us_id=  $us_id";
$sql = "SELECT * 
        FROM  sfa_user INNER JOIN sfa_role 
         ON  sfa_user.us_role_id = sfa_role.role_id
         INNER JOIN sfa_prefix
         ON  sfa_user.us_pref_id = sfa_prefix.pref_id
         WHERE us_id=  $us_id" ;
$dbUser = mysqli_query($con, $sql);
$usInfo = mysqli_fetch_assoc($dbUser);
// print_r($usInfo);
// if($dbUser === FALSE) { 
//     die(mysqli_error($con)); // better error handling
// }
$usInfo_pre_id = $usInfo["us_pref_id"];
$usInfo_fname = $usInfo["us_fname"];
$usInfo_lname = $usInfo["us_lname"];
$usInfo_role_title = $usInfo["role_title"];

?>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card border-0">
                <div class="table-responsive py-4 px-4">

                    <form action="#" method="POST" enctype="multipart/form-data">

                        <div class="row pb-4">
                            <div class="col-md-2">
                                <label>รายละเอียดของผู้ใช้งาน</label>
                            </div>
                            <div class="col-md">
                                <?php if ($usInfo_pre_id == 1) {
                                    $fullname = "นาย" . $usInfo_fname  . " " . $usInfo_lname;
                                } elseif ($usInfo_pre_id  == 2) {
                                    $fullname = "นาง" . $usInfo_fname . " " . $usInfo_lname;
                                } else {
                                    $fullname = "นางสาว" . $usInfo_fname . " " . $usInfo_lname;
                                } ?>
                                <?php echo $fullname; ?>
                            </div>
                        </div>
                        <hr style="margin-top: -1rem; margin-bottom: 1rem;">
                        <div class="row pb-4">
                            <div class="col-md-2">
                                <label>ประเภทของผู้ใช้งาน</label>
                            </div>
                            <div class="col-md">
                                <div class="col-md">
                                    <?php echo $usInfo_role_title; ?>
                                </div>
                            </div>
                        </div>
                        <hr style="margin-top: -1rem; margin-bottom: 1rem;">

                    </form>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-secondary pull-right" onclick="location.href='./?content=list-user'">กลับ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include("footer.php"); ?>
</div>