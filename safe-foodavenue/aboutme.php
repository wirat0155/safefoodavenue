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

    /* .my_active {
        background-color: #333;
        color: #fff;
    }

    .my_active:hover {
        background-color: #333;
        color: #fff;

    } */

    .set-pic {
        width: 150px;
        height: 150px;
    }
</style>


<body>

    <nav class="navbar navbar-horizontal navbar-main navbar-expand-lg navbar-primary">
        <div class="container">

            <a class="navbar-brand" href="./index.php">
                <img src="./assets/img/brand/plogo.png">
            </a>

            <div class="col-6">
                <img src="./assets/img/brand/logo-saensuk.png">
                <!-- <img src="./assets/img/brand/AHS_BUU_Logo.png"> -->
                <img src="./assets/img/brand/Buu-logo11.png">
                <img src="./assets/img/brand/Research-innovation.png">
            </div>

            <button class="navbar-toggler bg-primary" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">

                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link my_active" href="./aboutme.php" style="font-size: 16px;">เกี่ยวกับเรา</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./tourist/register_tourist.php" style="font-size: 16px;">ลงทะเบียน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./login/login.php" style="font-size: 16px;">เข้าสู่ระบบ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="main-content">

        <div class="container mt-4">


            <div class="row">

                <div class="col">
                    <div class="card">
                        <div class="col">

                        </div>
                        <div class="card-body">
                            <h3 class="card-title">ความสำคัญของการปนเปื้อนของสารฟอร์มาลีน</h3>
                            <p class="card-text p-3"> ในอุตสาหกรรมผลิตอาหารมีการใส่สารเคมีลงไปในอาหารเพื่อผลิตอาหารได้ในระยะเวลาที่รวดเร็ว เช่น การเติมยาปฏิชีวนะลงในอาหารสัตว์เพื่อปรับปรุงคุณภาพอาหารให้เก็บไว้นานๆ โดยไม่เน่าเสีย รวมถึงผลทางโภชนาที่ดี ซึ่งสารเคมีที่ใส่ลงไปในอาหาร จัดเป็นวัตถุเจือปนอาหาร อย่างเช่นฟอร์มาลิน สารนี้เป็นสารก่อมะเร็ง กฎหมายห้ามนำมาใส่ในอาหาร อย่างไรก็ตามพบว่ามีผู้ผลิตบางรายใส่สารต้องห้ามเหล่านี้ลงไปในอาหารด้วย</p>

                            <div class="container text-center">
                                <div class="row">
                                    <div class="col">
                                        <img src="./assets/img/icons/common/formaldehyde.png" class="set-pic text-center" alt="test">
                                    </div>
                                    <div class="col">
                                        <img src="./assets/img/icons/common/seafood.png" class="set-pic text-center" alt="test">
                                    </div>
                                    <div class="col">
                                        <img src="./assets/img/icons/common/shop.png" class="set-pic text-center" alt="test">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>


        <section class="py-6">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 py-2">
                        <div class="row">
                            <div class="col-md">
                                <h1>นวัตกรรมชุดตรวจฟอร์มาลินเพื่ออาหารปลอดภัย</h1>
                                <p style="text-indent: 2rem; text-align: justify;">
                                    ในประเทศไทยมีชุดทดสอบฟอร์มาลินที่ใช้สำหรับตรวจสอบการปนเปื้อนในอาหารหลายชุดทดสอบด้วยกัน แต่ชุดทดสอบเหล่านี้จะอาศัยการอ่านผลจากความเข้มสีและเทียบความเข้มสีที่ปรากฏกับแผ่นเทียบสี เพื่อระบุปริมาณของฟอร์มาลินที่ปนเปื้อนในอาหาร ข้อเสียหลักของการอ่านผลจากความเข้มสีคือ สีของอาหาร จะรบกวนการอ่านผลการทดสอบ ซึ่งชุดทดสอบฟอร์มาลินชุดนี้ได้ถูกพัฒนาเพื่อแก้ปัญหาที่เกิดขึ้นและตอบโจทย์กับผู้ใช้งานให้ได้มากที่สุด โดยที่ชุดทดสอบใช้งานได้ง่าย พกพาสะดวก สามารถใช้งาน ณ จุดตรวจวัดได้ ใช้สารเคมี/ตัวอย่างใน ปริมาณน้อย ราคาถูก ไม่มีการรบกวนจากสีของอาหาร และสามารถผลิตได้รวดเร็วแบบอัตโนมัติด้วย เทคนิคการพิมพ์
                                </p>
                            </div>
                        </div>
                        <div class="row justifu-content-md-end" style="align-items:center;">
                            <div class="col text-right">
                                <div class="h2" style="color: #b1bc45;">ได้รับการถ่ายทอดเทคโนโลยีจากมหาวิทยาลัยบูรพา</div>
                            </div>
                            <div class="col-2">
                                <img src="./assets/img/theme/buu-logo.png" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 py-2">
                        <iframe style="width: 570px; height: 380px" src="https://www.youtube.com/embed/yAQwlLZoFVY" title="formalin kit video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-6">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 py-2">
                        <img src="./assets/img/theme/formalin_test_kit.png" class="img-fluid">
                    </div>
                    <div class="col-md-6 py-2">
                        <div class="row">
                            <div class="col-md">
                                <h1>ชุดทดสอบฟอร์มาลิน (Formalin Test Kit)</h1>
                                <p style="text-indent: 2rem; text-align: justify;">
                                    ชุดทดสอบฟอร์มาลินนี้ทำจากอุปกรณ์ตรวจวัดแบบกระดาษซึ่งเป็นวัตถุดิบหลักในการผลิตที่สามารถ หาได้ง่ายเป็นมิตรต่อสิ่งแวดล้อม มีขนาดเล็กและราคาถูกทำให้ชุดทดสอบของเรามีต้นทุนต่ำ นอกจากนี้ยังมีการ์อ่านผลการทดสอบจากขนาดเส้นผ่านศูนย์กลางทีปรากฏสีบนอุปกรณ์แบบกระดาษโดยไม่มีการ รบกวันจากสีของตัวอย่าง แตกต่างจากชุดทดสอบฟอร์มาลินอื่น ที่จะสังเกตปริมาณจากความเข้มสีทีเกิดขึ้นซึงอาจมีการรบกวนจากสีของตัวอย่างเอง อุปกรณ์แบบกระดาษที่พัฒนาขึ้นยังสามารถผลิตได้ด้วยเทคโนโลยีการพิมพ์ ซึ่งเป็นระบบอัตโนมัติรองรับการผลิตครั้งละจำนวนมากได้
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 my-3" style="padding-left: 2rem;">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="ni ni-shop"></i>
                                </div>
                                <div class="d-inline h2 px-2">พกพา สะดวก</div>
                            </div>
                            <div class="col-md-6 my-3" style="padding-left: 2rem;">
                                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                    <i class="ni ni-user-run"></i>
                                </div>
                                <div class="d-inline h2 px-2">รู้ผลไว</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 my-3" style="padding-left: 2rem;">
                                <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                                    <i class="ni ni-square-pin"></i>
                                </div>
                                <div class="d-inline h2 px-2">ใช้งานง่าย</div>
                            </div>
                            <div class="col-md-6 my-3" style="padding-left: 2rem;">
                                <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow">
                                    <i class="ni ni-building"></i>
                                </div>
                                <div class="d-inline h2 px-2">ให้ผลแม่นยำ</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-4">
            <div class="container">
                <div class="row row-grid align-items-center">
                    <div class="col-md">
                        <h1>ช่องทางการจำหน่าย / ติดต่อ</h1>
                    </div>
                </div>
                <div class="row row-grid align-items-center">
                    <div class="col-md-6 border-right" style="border-width:5px !important; border-color: #c0cf39 !important; padding: 4rem 0px;">
                        <div class="row justify-content-md-center">
                            <div class="col-md-6">
                                <a href="https://www.facebook.com/Innosens-2021-CO-LTD-จำหน่ายชุดทดสอบสารปนเปื้อนในอาหาร-108295175196433/" target="_blank">
                                    <button class="btn border border-success text-center rounded rounded-lg" style="width: 100%; border-width:2px !important; text-align:center; padding: 12px; margin: 12px auto">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 text-center"> <img src="./assets/img/icons/common/facebook.svg" style="width:100%;"> </div>
                                            <div class="col-md text-center">
                                                <h2>Facebook</h2>
                                            </div>
                                        </div>
                                    </button>
                                </a>
                            </div>
                        </div>

                        <div class="row justify-content-md-center">
                            <div class="col-md-6">
                                <a href="https://line.me/R/ti/p/%40374rvish" target="_blank">
                                    <button class="btn border border-success text-center rounded rounded-lg" style="width: 100%; border-width:2px !important; text-align:center; padding: 12px; margin: 12px auto">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 text-center"> <img src="./assets/img/icons/common/line.svg" style="width:100%;"> </div>
                                            <div class="col-md text-center">
                                                <h2>Line</h2>
                                            </div>
                                        </div>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="border border-success" style="width:50%; border-width:5px !important; margin:0px auto;">
                            <img src="./assets/img/theme/qr_line.jpg" style="width:100%;">
                        </div>
                    </div>
                </div>
            </div>
        </section>
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