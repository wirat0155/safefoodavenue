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

    .limit-char {
        max-width: 24ch;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    @media only screen and (max-width: 720px) {
        .limit-char {
            max-width: 16ch;
        }
    }

    @media only screen and (max-width: 360px) {
        .limit-char {
            max-width: 16ch;
        }
    }

    .fix-a {
        color: #fff !important;
    }

    .fix-a hover {
        color: #fff;
    }

    .card-custom {
        border-radius: 20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .card-custom:hover {
        transform: scale(1.05);
    }

    .fixul {
        display: inline-block;
        text-align: left;
    }

    .text-size-11 {
        font-size: 11px;
    }
    .badge-success {
        background-color: #3FCE5E;
    }

    .text-size-12 {
        font-size: 14px;
    }

    .text-size-18 {
        font-size: 18px;
    }

    .text-size-11 {
        font-size: 11px;
    }

    .card-fix {
        max-height: 350px !important;
        height: 350px !important;

    }

    .badge-warning-fix {
        background-color: #FFA728;
    }

    .loader_bg {
        position: fixed;
        z-index: 9999999;
        background: #fff;
        width: 100%;
        height: 100%;
        text-align: center;
        justify-content: center;
        align-items: center;

    }

    .loader4 {
        width: 200px;
        height: 200px;
        margin-top: 6rem;
        position: absolute;
        padding: 0px;
        border-radius: 100%;
        border: 5px solid;
        border-top-color: rgba(246, 36, 89, 1);
        border-bottom-color: rgba(255, 255, 255, 0.3);
        border-left-color: rgba(246, 36, 89, 1);
        border-right-color: rgba(255, 255, 255, 0.3);
        -webkit-animation: loader4 1s ease-in-out infinite;
        animation: loader4 1s ease-in-out infinite;
    }

    @keyframes loader4 {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @-webkit-keyframes loader4 {
        from {
            -webkit-transform: rotate(0deg);
        }

        to {
            -webkit-transform: rotate(360deg);
        }
    }
</style>


<body>

    <nav id="navbar-main" class="navbar navbar-horizontal navbar-main navbar-expand-lg navbar-dark">
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
                        <a class="nav-link" href="./aboutme.php" style="font-size: 16px; color:black;">เกี่ยวกับเรา</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./tourist/register_tourist.php" style="font-size: 16px; color:black;">ลงทะเบียน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./login/login.php" style="font-size: 16px; color:black;">เข้าสู่ระบบ</a>
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



        <div class="container-fulid mt--5 pl-5 pr-5">

            <div class="row">
                <div class="col-12">
                    <div class="card mx-auto">
                        <div class="card-header">
                            <h2 class="card-title">ร้านไกล้ฉัน</h2>
                        </div>



                        <div class="card-body">



                            <div class="container">
                                <div class="row">
                                    <div class="" id="list_res">

                                    </div>
                                </div>

                            </div>


                            <div class="row d-flex justify-content-end">
                                <a class="btn btn-primary px-4 m-2 fix-a" href="./tourist/index.php?content=list-restaurant">
                                    ดูทั้งหมด</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="py-6 pb-9 bg-default px-3 mt-5">
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
                <div id="map-restaurant-panel" style="background-color: white; height: 70vh; overflow-y: auto;" class="p-1 text-center">
                    <div class="container">
                        <div class="" id="res_list">
                            <h1 class="mt-4">คลิกบนแผนที่เพื่อเลือกร้านอาหาร</h1>
                        </div>
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

    <script>
        var my_lat;
        var my_lon;
        $(document).ready(function() {

            getLocation();

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    console.log("Geolocation is not supported by this browser.");
                }
            }

            function showPosition(position) {
                my_lat = position.coords.latitude;
                my_lon = position.coords.longitude;

                fetch("https://maps.googleapis.com/maps/api/geocode/json?latlng=" + my_lat + "," + my_lon + "&key=AIzaSyAxCoeDi4K2LJTzTC1VzL2DEJcD5srXq0o")
                    .then(response => response.json())
                    .then(data => {
                        // The data object contains the full address of the location, including the province
                        const addressComponents = data.results[0].address_components;

                        console.log(data.results[0].address_components.length);


                        for (let i = 0; i < data.results[0].address_components.length; i++) {

                            if (data.results[0].address_components[i].long_name.length == "5" && Number.isInteger(+data.results[0].address_components[i].long_name)) {

                                get_data_res_near_me(data.results[0].address_components[i].long_name);

                            } else {
                                let html = '';

                                html += '<div class="container p-9">';
                                html += '<div class="row text-center">';
                                html += '<div class="col text-center">';
                                html += '<h1>ไม่พบร้านค้า ไกล้ตำแหน่งของคุณ</h1>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="row mt-4 text-center">';
                                html += '<div class="col text-center">';

                                html += '</div>';
                                html += '</div>';
                                html += '</div>';

                                $('#list_res').html(html);

                            }
                        }

                    });
            }

            function get_data_res_near_me(zip_code) {
                console.log("zipcode = " + zip_code)
                $('.loader_bg').fadeToggle();
                $.ajax({
                    url: "./tourist/get_data_res_near_me.php",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        zip_code: zip_code,
                    },
                    success: function(data) {
                        console.log(data);
                        $('.loader_bg').hide();
                        show_res_data(data)

                    },
                    error: function(error) {
                        alert(error);
                    }
                })
            }
        });


        function show_res_data(data) {

            // show data restaurant in page
            let html = '';

            if (data != "No data") {

                html += '  <div class="row py-3">';
                //loop show data 
                data.data_res.forEach((row_res, index_res) => {

                    html += '<div class="col-12 col-sm-6 col-md-6 col-lg-4 py-2">';
                    html += ' <a href="/tourist/index.php?content=detail-restaurant&id=' + row_res.res_id + '">';
                    html += ' <div class="card card-fix card-custom rounded-4 hover-zoom">';

                    if (row_res.res_img_path == null) {

                        html += '<img class="card-img-top" style="height: 200px; object-fit: cover;" src="../assets/img/theme/detail-banner-default.jpg" alt="Card image cap">';

                    } else {

                        html += ' <img class="card-img-top w-100" style="height: 200px; object-fit: cover;" src="' + '../admin-panel/php/uploads/img/' + row_res.res_img_path + '" alt="Card image cap">';

                    }
                    html += '<div class="card-body">';
                    html += '<div class="d-flex justify-content-between">';
                    html += ' <div  class="p-2">';
                    if (row_res.res_for_status == 0) {
                        html += '   <span class="badge badge-success text-size-12  text-white">ปลอดภัย</span>';
                        //html += '<img src="./../assets/img/icons/common/formalin.png" class="set-pic text-center" alt="test"> <br>';
                    }

                    html += ' </div>';
                    html += '<div  class="p-2">';

                    if (row_res.srs_count != null && row_res.srs_sum_review != null) {

                        let score = row_res.srs_sum_review / row_res.srs_count;

                        html += '   <span class="badge badge-warning-fix text-size-12  text-white"><i class="fas fa-star text-warnng mr-1"></i>' + score.toFixed(1) + '</span>';
                        html += '   <span class="text-size-12 text-dark">' + row_res.srs_count + ' รีวิว</span>';

                    } else {
                        html += '<span>ไม่มีรีวิว</span>';
                    }
                 
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="row mt-2">';
                    html += '   <div class="col col-sm-12 col-md-12 col-lg-12">';
                    html += '       <h2 class="ml-2 limit-char">' + row_res.res_title + '</h2>';
                    html += '    </div> ';
                    html += '</div>';
                    html += ' <div class="row">';
                    html += '     <div class="col">';
                  

                    html += '      </div>     ';
                    html += '</div>     ';
                    html += '</div>     ';
                    html += '</div>     ';
                    html += '</div>     ';

                });
                html += ' </a>';
                html += ' </div>     ';

                $('#list_res').html(html);


            } else {

                html += '<div class="container p-9">';
                html += '<div class="row text-center">';
                html += '<div class="col text-center">';
                html += '<h1>ไม่พบร้านค้า ไกล้ตำแหน่งของคุณ</h1>';
                html += '</div>';
                html += '</div>';
                html += '<div class="row mt-4 text-center">';
                html += '<div class="col text-center">';

                html += '</div>';
                html += '</div>';
                html += '</div>';


                $('#list_res').html(html);

            }
        }
    </script>
</body>