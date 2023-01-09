<!-- =========================================================
* Argon Dashboard PRO v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
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
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADQJLBR2n_WOLPbxOmLLSvR6XN0AibN-0&callback=initMap"></script >--> 

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsQsJq6QLsJRyETeDLBLyc6Wx73snZPIo&callback=initMap"></script> 
</head>

<style>
body {
    font-family: 'Prompt';
}
</style>

<body>
    <!-- Navabr -->
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-main navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="./pages/dashboards/dashboard.html">
                <img src="./assets/img/brand/plogo.png">
            </a>
            <div class="col-3">
            <img src="./assets/img/brand/logo-saensuk.jpg">
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
                            <a href="./pages/dashboards/dashboard.html">
                                <img src="./assets/img/brand/blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="nav-item">
            <a href="./pages/dashboards/dashboard.html" class="nav-link">
              <span class="nav-link-inner--text text-primary">Dashboard</span>
            </a>
          </li> -->
                    <!-- <li class="nav-item">
            <a href="./pages/examples/pricing.html" class="nav-link">
              <span class="nav-link-inner--text text-primary">Pricing</span>
            </a>
          </li> -->

                    <!-- <li class="nav-item">
            <a href="./pages/examples/lock.html" class="nav-link">
              <span class="nav-link-inner--text text-primary">Lock</span>
            </a>
          </li> -->
                </ul>
                <hr class="d-lg-none" />
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <!-- <li class="nav-item">
                        <a href="./tourist/login_tourist.php" class="nav-link">
                            <span class="nav-link-inner--text text-primary">เข้าสู่ระบบ</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./tourist/register_tourist.php" class="nav-link">
                            <span class="nav-link-inner--text text-primary">ลงทะเบียน</span>
                        </a>
                    </li> -->
                    <!-- <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.facebook.com/creativetim" target="_blank" data-toggle="tooltip" title="" data-original-title="Like us on Facebook">
              <i class="fab fa-facebook-square text-primary"></i>
              <span class="nav-link-inner--text d-lg-none">Facebook</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.instagram.com/creativetimofficial" target="_blank" data-toggle="tooltip" title="" data-original-title="Follow us on Instagram">
              <i class="fab fa-instagram text-primary"></i>
              <span class="nav-link-inner--text d-lg-none">Instagram</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://twitter.com/creativetim" target="_blank" data-toggle="tooltip" title="" data-original-title="Follow us on Twitter">
              <i class="fab fa-twitter-square text-primary"></i>
              <span class="nav-link-inner--text d-lg-none">Twitter</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://github.com/creativetimofficial" target="_blank" data-toggle="tooltip" title="" data-original-title="Star us on Github">
              <i class="fab fa-github text-primary"></i>
              <span class="nav-link-inner--text d-lg-none">Github</span>
            </a>
          </li> -->
                    <!-- <li class="nav-item d-none d-lg-block ml-lg-4">
            <a href="https://www.creative-tim.com/product/argon-dashboard-pro" target="_blank" class="btn btn-neutral btn-icon">
              <span class="btn-inner--icon">
                <i class="fas fa-shopping-cart mr-2"></i>
              </span>
              <span class="nav-link-inner--text">Purchase now</span>
            </a>
          </li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-image pt-5 pb-7">
            <div class="container">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="pr-5">
                                <h1 class="display-2 text-white font-weight-bold mb-0">Safe Food Avenue</h1>
                                <h2 class="display-4 text-white font-weight-light">Better food, Better life</h2>
                                <p class="text-white mt-4">ระบบสารสนเทศเพื่อการจัดการการตรวจวิเคราะห์หาสารฟอร์มาลินที่เจือปนในอาหารทะเลที่จำหน่ายในบริเวณเขตเทศบาลเมืองแสนสุข จ.ชลบุรี</p>
                                <div class="mt-5">
                                    <a href="./login/login.php" class="btn btn-neutral my-2">เข้าสู่ระบบ</a>
                                    <a href="./tourist/register_tourist.php" class="btn btn-default my-2">ลงทะเบียน</a>
                                    <!-- <a href="./expert-panel" class="btn btn-primary my-2">ผู้เชี่ยวชาญ</a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row pt-3">
                                <div class="col-md">
                                    <div class="card" style="border-radius: 1.5rem;">
                                        <div class="card-body" >
                                            
                                            <div class="row">
                                                <div class="col-md">
                                                    <h2>ความสำคัญของการปนเปื้อนฟอร์มาลินในอาหารทะเล</h2>
                                                    <p style="text-indent: 2rem; text-align: justify;">
                                                        ในอุตสาหกรรมผลิตอาหารมีการใส่สารเคมีลงไปในอาหารเพื่อผลิตอาหารได้ในระยะเวลาที่รวดเร็ว เช่น การเติมยาปฏิชีวนะลงในอาหารสัตว์เพื่อปรับปรุงคุณภาพอาหารให้เก็บไว้นานๆ โดยไม่เน่าเสีย รวมถึงผลทางโภชนาที่ดี ซึ่งสารเคมีที่ใส่ลงไปในอาหาร จัดเป็นวัตถุเจือปนอาหาร อย่างเช่นฟอร์มาลิน สารนี้เป็นสารก่อมะเร็ง กฎหมายห้ามนำมาใส่ในอาหาร อย่างไรก็ตามพบว่ามีผู้ผลิตบางรายใส่สารต้องห้ามเหล่านี้ลงไปในอาหารด้วย
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col-md">
                                    <div class="card" style="border-radius: 1.5rem;">
                                        <div class="card-body" >
                                            <div class="row">
                                                <div class="col-md">
                                                    <h2>การรายงานผลความปลอดภัยของฟอร์มาลินเชิงพื้นที่</h2>
                                                    <p style="text-indent: 2rem; text-align: justify;">
                                                        จากการเก็บรวบรวมและวิเคราะห์ตัวอย่างของอาหารโดยใช้ชุดทดสอบสารฟอร์มาลินในอาหาร (Formalin Test Kit) นั้นพบว่ามักมีการปนเปื้อนฟอร์มาลินในอาหาร จำพวกอาหารทะเลสดและเนื้อสัตว์สด จึงได้มีการลงพื้นที่ตรวจสอบการปนเปื้อนของฟอร์มาลินโดยผู้เชี่ยวชาญเพื่อวิเคราะห์สถานการณ์ความปลอดภัยด้านอาหารและผลิตภัณฑ์สุขภาพ ณ สถานที่จำหน่าย ในเขตเทศบาลเมืองแสนสุข เพื่อให้มีการตรวจสังเกตระวังการปนเปื้อนฟอร์มาลินในอาหาร
                                                    </p>
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
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
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
                        <!-- <iframe width="100%" height="315" src="https://www.youtube.com/embed/PqsHI_SU0V4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                        <video width="100%" height="315" controls>
                            <source src="./assets/img/formalin_kit_video.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
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
                                            <div class="col-md text-center"> <h2>Facebook</h2> </div>
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
                                            <div class="col-md text-center"> <h2>Line</h2> </div>
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

        <section class="py-4">
            <div class="container">
                <div class="row row-grid align-items-center">
                    <div class="col-md-6">
                        <div class="pr-md-5">
                            <h1>ร้านอาหาร</h1>
                            <p>“รวม 140 ร้านเด็ด ทั่วบางแสน” ที่คัดมาแล้วว่าสด สะอาด ปลอดสารฟอร์มาลิน</p>
                            <a href="./tourist/index.php?content=list-restaurant" class="font-weight-bold text-warning mt-5">ดูทั้งหมด >> </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="./assets/img/theme/landing-4.jpg" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>

        <!-- <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="row justify-content-lg-center">

                            <div class="col-lg-4">
                                <div class="card card-lift--hover shadow border-0">
                                    <div class="card-body py-5">
                                        <div class="icon icon-shape bg-gradient-success text-white rounded-circle mb-4">
                                            <i class="ni ni-shop"></i>
                                        </div>
                                        <h4 class="h3 text-success text-uppercase">ร้านอาหาร</h4>
                                        <p class="description mt-3">“รวม 140 ร้านเด็ด ทั่วบางแสน” ที่คัดมาแล้วว่าสด สะอาด ปลอดสารฟอร์มาลิน</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card card-lift--hover shadow border-0">
                                    <div class="card-body py-5">
                                        <div class="icon icon-shape bg-gradient-primary text-white rounded-circle mb-4">
                                            <i class="ni ni-like-2"></i>
                                        </div>
                                        <h4 class="h3 text-primary text-uppercase">อร่อย ปลอดภัย โดนใจ</h4>
                                        <p class="description mt-3">รางวัลสุดยอดร้านอาหารอร่อย ปลอดภัย โดนใจ ที่การันตีโดยรีวิว เรตติ้ง จากผู้ใช้งานระบบ
                                            เราจึงขอเป็นสื่อกลางเฟ้นหาร้านอาหารที่ดีที่สุด </p>
                                        <div>
                                            <span class="badge badge-pill badge-primary">เครื่องหมาย</span>
                                            <span class="badge badge-pill badge-primary">Certification (CERT)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- <section class="py-6">
            <div class="container">
                <div class="row row-grid align-items-center">
                    <div class="col-md-6 order-md-2">
                        <img src="./assets/img/theme/landing-8.jpg" class="img-fluid">
                    </div>
                    <div class="col-md-6 order-md-1">
                        <div class="pr-md-5">
                            <h1> Introduction</h1>
                            <p>ระบบระบบสารสนเทศนี้ได้มีการตรวจวิเคราะห์หาสารฟอร์มาลินที่เจือปนในอาหารทะเลที่จำหน่ายในบริเวณเขตเทศบาลเมืองแสนสุข จ.ชลบุรี
                                และระบบสารสนเทศสำหรับการจัดระดับคุณภาพ มาตรฐาน และความพึงพอใจต่อร้านอาหารในระบบ
                                เพื่อให้ข้อมูลแก่นักท่องเที่ยวในการตรวจสอบร้านอาหารที่มีความปลอดภัยและสุขใจเมื่อได้รับประทาน</p>
                            <ul class="list-unstyled mt-5">
                                <li class="py-2">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="badge badge-circle badge-success mr-3">
                                                <i class="ni ni-like-2"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">อาหารสด สะอาด ปลอดสารฟอร์มาลิน</h4>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="badge badge-circle badge-success mr-3">
                                                <i class="ni ni-building"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">สนับสนุนการท่องเที่ยวของท้องถิ่น</h4>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="badge badge-circle badge-success mr-3">
                                                <i class="ni ni-world"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">อนุรักษ์ประเพณี และสิ่งแวดล้อม</h4>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- <section class="py-6">
            <div class="container">
                <div class="row row-grid align-items-center">
                    <div class="col-md-6">
                        <img src="./assets/img/theme/landing-4.jpg" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <div class="pr-md-5">
                            <h1>ร้านอาหาร</h1>
                            <p>“รวม 140 ร้านเด็ด ทั่วบางแสน” ที่คัดมาแล้วว่าสด สะอาด ปลอดสารฟอร์มาลิน</p>
                            <a href="./tourist/index.php?content=list-restaurant" class="font-weight-bold text-warning mt-5">ดูทั้งหมด >> </a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- <section class="py-6">
            <div class="container">
                <div class="row row-grid align-items-center">
                    <div class="col-md-6 order-md-2">
                        <img src="./assets/img/theme/landing-6.jpg" class="img-fluid">
                    </div>
                    <div class="col-md-6 order-md-1">
                        <div class="pr-md-5">
                            <h1>สถานที่ท่องเที่ยว</h1>
                            <p>ตำบลแสนสุขเต็มไปด้วยสถานที่ให้ท่องเที่ยว พิพิธภัณฑ์สัตว์น้ำ ตลาดคนเดิน และธรรมชาติอีกมากมาย</p>
                            <a href="./pages/widgets.html" class="font-weight-bold text-info mt-5">ดูทั้งหมด >> </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-6">
            <div class="container">
                <div class="row row-grid align-items-center">
                    <div class="col-md-6">
                        <img src="./assets/img/theme/landing-5.jpg" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <div class="pr-md-5">
                            <h1>กิจกรรมกีฬา</h1>
                            <p>พบกับงานวิ่งมาราธอน ปั่นจักรยาน แข่งรถ การแข่งขันกีฬาทางน้ำ และกีฬาอีกมากมาย</p>
                            <a href="./pages/examples/profile.html" class="font-weight-bold text-warning mt-5">ดูทั้งหมด >> </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-6">
            <div class="container">
                <div class="row row-grid align-items-center">
                    <div class="col-md-6 order-md-2">
                        <img src="./assets/img/theme/landing-7.jpg" class="img-fluid">
                    </div>
                    <div class="col-md-6 order-md-1">
                        <div class="pr-md-5">
                            <h1>เทศกาลท้องถิ่น</h1>
                            <p>อีกทั้งยังมีงานเทศกาลต่างๆ เช่น วันไหลบางแสน บางแสนเคาท์ดาวน์</p>
                            <a href="./pages/widgets.html" class="font-weight-bold text-info mt-5">ดูทั้งหมด >> </a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        
        <!-- <section class="py-7 section-nucleo-icons bg-white overflow-hidden">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 class="display-3">ท่องเที่ยวบางแสน</h2>
                
                        <style>
                        .search-panel {
                            position: relative;
                        }

                        .search-icon {
                            position: absolute;
                            font-size: 24px;
                            top: 10px;
                            right: 10px;
                            cursor: pointer;
                            transition: all .5s ease;
                        }

                        .search-icon:hover {
                            color: #5e72e4;
                        }
                        </style>

                        <div>
                            <div class="search-panel">
                                <input type="text" class="form-control text-center" style="padding-right: 3rem;" name="txtSearch" placeholder="ค้นหาร้านอาหาร หรือสถานที่ท่องเที่ยว" value="">
                                <i class="fa fa-search search-icon"></i>
                            </div>
                        </div>
                        <div class="btn-wrapper my-3">
                            <button type="button" class="btn btn-primary">ค้นหา</button>
                        </div>

                    </div>
                </div>
                <div class="blur--hover">
                    <a href="./tourist/?content=disp-block-map">
                        <div class="icons-container blur-item mt-5">
                            <i class="icon ni ni-square-pin"></i>
                            <i class="icon icon-sm ni ni-building"></i>
                            <i class="icon icon-sm ni ni-bus-front-12"></i>
                            <i class="icon icon-sm ni ni-map-big"></i>
                            <i class="icon ni ni-world"></i>
                            <i class="icon ni ni-note-03"></i>
                            <i class="icon ni ni-bag-17"></i>
                            <i class="icon icon-sm fa fa-hotel"></i>
                            <i class="icon icon-sm ni ni-shop"></i>
                            <i class="icon icon-sm fa fa-bed"></i>
                            <i class="icon fa fa-bath"></i>
                            <i class="icon fa fa-coffee"></i>
                            <i class="icon fa fa-shopping-cart"></i>
                        </div>
                        <span class="blur-hidden h5 text-success">สำรวจร้านที่ร่วมรายการมากกว่า 100+ แห่ง</span>
                    </a>
                </div>
            </div>
        </section> -->


        <!-- <section class="py-7">
      <div class="container">
        <div class="row row-grid justify-content-center">
          <div class="col-lg-8 text-center">
            <h2 class="display-3">Do you love this awesome <span class="text-success">Dashboard for Bootstrap 4?</span></h2>
            <p class="lead">Cause if you do, it can be yours now. Hit the button below to navigate to get the free version or purchase a license for your next project. Build a new web app or give an old Bootstrap project a new look!</p>
            <div class="btn-wrapper">
              <a href="https://www.creative-tim.com/product/argon-dashboard" class="btn btn-neutral mb-3 mb-sm-0" target="_blank">
                <span class="btn-inner--text">Get FREE version</span>
              </a>
              <a href="https://www.creative-tim.com/product/argon-dashboard-pro" class="btn btn-primary btn-icon mb-3 mb-sm-0">
                <span class="btn-inner--icon"><i class="ni ni-basket"></i></span>
                <span class="btn-inner--text">Purchase now</span>
                <span class="badge badge-md badge-pill badge-floating badge-danger border-white">$79</span>
              </a>
            </div>
            <div class="text-center">
              <h4 class="display-4 mb-5 mt-5">Available on these technologies</h4>
              <div class="row justify-content-center">
                <div class="w-10 mx-2 mb-2">
                  <a href="https://www.creative-tim.com/product/argon-dashboard" target="_blank" data-toggle="tooltip" data-original-title="Bootstrap 4 - Most popular front-end component library">
                    <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/bootstrap.jpg" class="img-fluid rounded-circle shadow shadow-lg--hover">
                  </a>
                </div>
                <div class="w-10 mx-2 mb-2">
                  <a href=" https://www.creative-tim.com/product/vue-argon-dashboard" target="_blank" data-toggle="tooltip" data-original-title="Vue.js - The progressive javascript framework">
                    <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/vue.jpg" class="img-fluid rounded-circle">
                  </a>
                </div>
                <div class="w-10 mx-2 mb-2">
                  <a href=" https://www.creative-tim.com/product/argon-dashboard" target="_blank" data-toggle="tooltip" data-original-title="Sketch - Digital design toolkit">
                    <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/sketch.jpg" class="img-fluid rounded-circle">
                  </a>
                </div>
                <div class="w-10 mx-2 mb-2">
                  <a href=" https://www.creative-tim.com/product/argon-dashboard-angular" target="_blank" data-toggle="tooltip" data-original-title="Angular - One framework. Mobile &amp; desktop">
                    <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/angular.jpg" class="img-fluid rounded-circle">
                  </a>
                </div>
                <div class="w-10 mx-2 mb-2">
                  <a href=" https://www.creative-tim.com/product/argon-dashboard-react" target="_blank" data-toggle="tooltip" data-original-title="React - A JavaScript library for building user interfaces">
                    <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/react.jpg" class="img-fluid rounded-circle">
                  </a>
                </div>
                <div class="w-10 mx-2 mb-2">
                  <a href=" https://www.creative-tim.com/product/argon-dashboard-laravel" target="_blank" data-toggle="tooltip" data-original-title="Laravel - The PHP Framework For Web Artisans">
                    <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/logos/laravel_logo.png" class="img-fluid rounded-circle">
                  </a>
                </div>
                <div class="w-10 mx-2 mb-2">
                  <a href=" https://www.creative-tim.com/product/argon-dashboard-nodejs" target="_blank" data-toggle="tooltip" data-original-title="Node.js - a JavaScript runtime built on Chrome's V8 JavaScript engine">
                    <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/logos/nodejs-logo.jpg" class="img-fluid rounded-circle">
                  </a>
                </div>
                <div class="w-10 mx-2 mb-2">
                  <a href=" https://www.adobe.com/products/photoshop.html" target="_blank" data-toggle="tooltip" data-original-title="[Coming Soon] Adobe Photoshop - Software for digital images manipulation">
                    <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/ps.jpg" class="img-fluid rounded-circle opacity-3">
                  </a>
                </div>
              </div>
              <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
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

</html>