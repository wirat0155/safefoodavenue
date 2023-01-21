<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Safe Food Avenue | BUU</title>
    <link rel="icon" href="./assets/img/brand/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/argon.css?v=1.1.0" type="text/css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsQsJq6QLsJRyETeDLBLyc6Wx73snZPIo&callback=initMap"></script> 
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsQsJq6QLsJRyETeDLBLyc6Wx73snZPIo&callback=initMap"></script>  -->

</head>

<style>
    body {
        font-family: 'Prompt';
    }
    /* width */
    ::-webkit-scrollbar {
    width: 6px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
    background: #f1f1f1; 
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
    background: #ccc; 
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
    background: #555; 
    }
</style>

<body>
    <!-- Navabr -->
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-main navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="./pages/dashboards/dashboard.html">
                <img src="./assets/img/brand/plogo.png">
            </a>
            <div class="col-3">
            <img src="./assets/img/brand/logo-saensuk.jpg">
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
                </ul>
                <hr class="d-lg-none" />
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
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

        <section class="py-6 pb-9 bg-default px-3">
            <div class="row">
                <div class="col">
                    <h2 class="display-3 text-white">แผนที่แสดงร้านอาหารปลอดสารฟอร์มาลิน</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-xl-9 p-0" id="map-panel">
                    <?php require("./tourist/pages/block-map.php"); ?>
                </div>
                <div class="col-12 col-xl-3 p-0" id="click-map-panel">
                    <div id="map-restaurant-panel" style="background-color: white; height: 70vh; overflow-y: auto;" class="p-1">
                        <?php
                        for ($i = 0; $i < 100; $i++) {
                            echo "restaurant panel" . "<br>";
                        }
                        ?>
                    </div>
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
    </div>
   <?php require('tourist/footer.php'); ?>
    <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="./assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="./assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <script src="./assets/vendor/onscreen/dist/on-screen.umd.min.js"></script>
    <script src="./assets/js/argon.js?v=1.1.0"></script>
</body>
</html>