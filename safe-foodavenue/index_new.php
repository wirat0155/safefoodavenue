<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Safe Food Avenue | BUU</title>
    <!-- Favicon -->
    <link rel="icon" href="./assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="./assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="./assets/css/argon.css?v=1.1.0" type="text/css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsQsJq6QLsJRyETeDLBLyc6Wx73snZPIo&callback=initMap"></script>
</head>



<style>
    body {
        font-family: 'Prompt';
    }
</style>


<body>

    <nav class="navbar navbar-horizontal navbar-main navbar-expand-lg navbar-primary">
        <div class="container">

            <a class="navbar-brand" href="./pages/dashboards/dashboard.html">
                <img src="./assets/img/brand/plogo.png">
            </a>

            <div class="col-6">
                <img src="./assets/img/brand/logo-saensuk.jpg">
                <!-- <img src="./assets/img/brand/AHS_BUU_Logo.png"> -->
                <img src="./assets/img/brand/Buu-logo11.png">
                <img src="./assets/img/brand/Research-innovation.png">
            </div>

            <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-collapse navbar-custom-collapse collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="" style="font-size: 16px;">เกี่ยวกับเรา</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" style="font-size: 16px;">ลงทะเบียน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" style="font-size: 16px;">เข้าสู่ระบบ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-image pt-5 pb-7" style="height: 70vh;">
            <div class="container">
                <div class="header-body">
                    <div class="row align-items-center mt-8">
                        <div class="col-lg-6">
                            <div class="pr-5">
                                <h1 class="display-2 text-white font-weight-bold mb-0">Safe Food Avenue</h1>
                                <h2 class="display-4 text-white font-weight-light">Better food, Better life</h2>
                                <p class="text-white mt-4">ระบบสารสนเทศเพื่อการจัดการการตรวจวิเคราะห์หาสารฟอร์มาลินที่เจือปนในอาหารทะเลที่จำหน่ายในบริเวณเขตเทศบาลเมืองแสนสุข จ.ชลบุรี</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt--5">
            <div class="row">
                <div class="col-12">
                    <div class="card mx-auto p-4">
                        <div class="card-header">
                            <h2 class="card-title">ร้านไกล้ฉัน</h2>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-5 col-lg-4 py-2">
                                        <div class="card">
                                            <img class="card-img-top" src="../assets/img/theme/detail-banner-default.jpg" alt="Card image cap">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="badge badge-success text-size-12  text-white">ปลอดภัยจากสารฟอมาลีน</span>
                                                    </div>
                                                    <div class="col">
                                                        <h4 class="text-center text-size-11">
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                                        </h4>
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <h2 class="ml-2">ป้านิด อาหารตามสั่ง</h2>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="ml-2">ร้านอาหาร</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-5 col-lg-4 py-2">
                                        <div class="card">
                                            <img class="card-img-top" src="../assets/img/theme/detail-banner-default.jpg" alt="Card image cap">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="badge badge-success text-size-12  text-white">ปลอดภัยจากสารฟอมาลีน</span>
                                                    </div>
                                                    <div class="col">
                                                        <h4 class="text-center text-size-11">
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                                        </h4>
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <h2 class="ml-2">ป้านิด อาหารตามสั่ง</h2>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="ml-2">ร้านอาหาร</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-5 col-lg-4 py-2">
                                        <div class="card">
                                            <img class="card-img-top" src="../assets/img/theme/detail-banner-default.jpg" alt="Card image cap">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="badge badge-success text-size-12  text-white">ปลอดภัยจากสารฟอมาลีน</span>
                                                    </div>
                                                    <div class="col">
                                                        <h4 class="text-center text-size-11">
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                                        </h4>
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <h2 class="ml-2">ป้านิด อาหารตามสั่ง</h2>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="ml-2">ร้านอาหาร</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>


            </div>
        </div>

        <section class="py-6 pb-9 bg-default">
            <div class="row justify-content-center text-center">
                <div class="col-md-6">
                    <h2 class="display-3 text-white">แผนที่แสดงร้านอาหารปลอดสารฟอร์มาลิน</h3>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-8 text-center">
                    <?php require("./tourist/pages/block-map.php"); ?>
                </div>
            </div>
        </section>
        
        <div class="container mt--6">
            <div class="row">
                <div class="col-12">
                    <div class="card mx-auto p-4">
                        <div class="card-header">
                            <h2 class="card-title">ร้านไกล้ฉัน</h2>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-5 col-lg-4 py-2">
                                        <div class="card">
                                            <img class="card-img-top" src="../assets/img/theme/detail-banner-default.jpg" alt="Card image cap">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="badge badge-success text-size-12  text-white">ปลอดภัยจากสารฟอมาลีน</span>
                                                    </div>
                                                    <div class="col">
                                                        <h4 class="text-center text-size-11">
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                                        </h4>
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <h2 class="ml-2">ป้านิด อาหารตามสั่ง</h2>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="ml-2">ร้านอาหาร</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-5 col-lg-4 py-2">
                                        <div class="card">
                                            <img class="card-img-top" src="../assets/img/theme/detail-banner-default.jpg" alt="Card image cap">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="badge badge-success text-size-12  text-white">ปลอดภัยจากสารฟอมาลีน</span>
                                                    </div>
                                                    <div class="col">
                                                        <h4 class="text-center text-size-11">
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                                        </h4>
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <h2 class="ml-2">ป้านิด อาหารตามสั่ง</h2>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="ml-2">ร้านอาหาร</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-5 col-lg-4 py-2">
                                        <div class="card">
                                            <img class="card-img-top" src="../assets/img/theme/detail-banner-default.jpg" alt="Card image cap">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="badge badge-success text-size-12  text-white">ปลอดภัยจากสารฟอมาลีน</span>
                                                    </div>
                                                    <div class="col">
                                                        <h4 class="text-center text-size-11">
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                                        </h4>
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <h2 class="ml-2">ป้านิด อาหารตามสั่ง</h2>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="ml-2">ร้านอาหาร</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>


            </div>

    </div>




















    <?php require('tourist/footer.php');   ?>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="./assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="./assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="./assets/vendor/onscreen/dist/on-screen.umd.min.js"></script>
    <!-- Argon JS -->
    <script src="./assets/js/argon.js?v=1.1.0"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="./assets/js/demo.min.js"></script>
</body>