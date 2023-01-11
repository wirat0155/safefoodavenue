<?php
session_start();
$res_id = isset($_GET["id"]) ? $_GET["id"] : "1";
?>

<script>
</script>

<style>
    .card-fix {
        max-height: 500px !important;
        height: 500px !important;

    }

    .text-size-24 {
        font-size: 24px;
    }

    .text-size-28 {
        font-size: 28px;
    }

    .text-size-16 {
        font-size: 16px;
    }

    .text-size-36 {
        font-size: 36px;
    }

    .text-size-42 {
        font-size: 42px;
    }

    .bg-gray-fix {
        background-color: #F5F5F5;
    }

    .badge-success {
        background-color: #3FCE5E;
    }

    .set-pic {
        width: 150px;
        height: 150px;
    }

    #res_img_path {
        width: 100%;
        height: 100%;
    }

    .badge-warning-fix {
        background-color: #FFB600;
    }

    .pic_fix {
        object-fit: cover;
    }


    .card-custom {
        border-radius: 20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .card-custom:hover {
        transform: scale(1.05);
    }

    @media only screen and (max-width: 600px) {}
</style>

<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body ">
            <div class="row align-items-center py-4 py-config">
                <div class="col-lg-16 col-sm-16">
                    <h6 class="h2 text-white d-inline-block mb-0">รายละเอียดร้านอาหาร</h6>
                    <nav aria-label="breadcrumb" class=" d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href=""><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="?content=disp-block-map">หน้าแรก</a></li>
                            <li class="breadcrumb-item"><a href="?content=list-restaurant">รายการร้านอาหาร</a></li>
                            <li class="breadcrumb-item active" aria-current="page">รายละเอียดร้านอาหาร</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid container-config mt--6">
    <div class="row">
        <div class="col">
            <div class="card border-0">
                <div class="table-responsive py-4 px-4">
                    <div class="container" id="container">
                        <div class="row">
                            <div class="col">
                                <div class="" style="height: 500px;">
                                    <img id="res_img_path" class="pic_fix" src="">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-8 col-md-16">
                                <div class="card card-fix bg-gray-fix">
                                    <div class="card-body">

                                        <div class="row justify-content-between">

                                            <div class="" id="display_formalin"></div>


                                            <button class="btn btn-secondary mr-2" type="button" id="modal_infomation">
                                                <i class="fa fa-info"></i>
                                            </button>

                                        </div>

                                        <h1 class="mt-2 text-size-42" id="res_title"></h1>
                                        <p class="mt-2" id="res_cat_title"></p>

                                        <button class="btn btn-primary mt-2" id="modal_sfa_menu">ดูวัตถุดิบที่ได้รับการตรวจ</button>

                                        <p class="font-weight-bold mt-3 text-size-24">รายละเอียดร้านอาหาร</p>

                                        <p class="text text-size-16" id="res_description"></p>

                                    </div>


                                </div>
                            </div>

                            <div class="col-lg-4 col-md-16">
                                <div class="card card-fix">
                                    <div class="card-body text-center bg-gray-fix">

                                        <div class="" id="google_map_app"></div>

                                        <p class="text mt-4 text-size-16" id="res_address">ตัวอย่าง ที่อยู่</p>
                                        <p class="text mt-2 text-size-16" id="res_provinces"></p>
                                        <hr>
                                        <p>เบอร์โทร : <span id="ent_tel"></span></p>

                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="card d-flex justify-content-center bg-gray-fix">
                                    <div class="card-body text-center">
                                        <div class="row">
                                            <div class="col text-center ">

                                                <b><span class="text-size-28 text-dark" id="average_rating"></span></b>
                                                <div class="main_star" id="main_star">
                                                </div>

                                                <h3 class="text-size-16 mt-2"><span id="total_review"></span></h3>

                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <span class="text-size-24">ให้คะแนนร้านนี้</span> <br>
                                                <h4 class="text-center mt-2 mb-4 text-size-24">
                                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <div class="form-group justify-content-center">
                                                    <textarea name="rev_comment" id="rev_comment" rows="7" class="form-control text-size-16" placeholder="รีวิวของคุณ"></textarea>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row mt-3 mr-3 text-right justify-content-end">
                                            <button type="button" class="btn btn-info text-size-16" id="save_review">โพสต์</button>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-8">
                                                <div class="form-inline m-3">
                                                    <label for="">ตัวกรอง : </label>
                                                    <select class="form-control m-2 bg-info text-white" id="star_search">
                                                        <option value="0">ทั้งหมด</option>
                                                        <option value="5">5 ดาว</option>
                                                        <option value="4">4 ดาว</option>
                                                        <option value="3">3 ดาว</option>
                                                        <option value="2">2 ดาว</option>
                                                        <option value="1">1 ดาว</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="mt-5" id="review_content"></div>


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


<div class="modal bd-example-modal-lg" id="sfa_menu_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">วัตถุดิบที่ได้รับการตรวจสารฟอร์มาลีน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="table_menu"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>



<div class="modal bd-example-modal-lg" id="sfa_information_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">สัญลักษณ์ที่ใช้ในระบบ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">สัญลักษณ์</th>
                            <th scope="col">คำอธิบาย</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><img src="./../assets/img/icons/common/formalin.PNG" class=" text-center" alt="test"> </td>
                            <td>ปลอดภัยจากสารฟอร์มาลีน</td>
                          
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td><img src="./../assets/img/icons/common/formalin_not.PNG" class=" text-center" alt="test"> </td>
                            <td>รอตรวจสอบสารฟอร์มาลีน</td>     
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>


</div>

<?php require('../tourist/footer.php');   ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var res_id = <?php echo $res_id;  ?>;
    var res_location_lat = '';
    var res_location_lon = '';
    star = 0;

    $(document).ready(function() {

        //set data in ajax
        jQuery.ajax({
            url: "./get-restuarant-detail-data.php",
            data: {
                res_id: res_id
            },
            type: "POST",
            success: function(data) {
                //console.log(data)
                set_data_in_page(data);
                set_picture_res(data['data_pic']);


            },
            error: function() {
                console.log("ERROR");
                location.href = "./index.php?content=404_page";
            }
        });

        //show modal menu in res
        $("#modal_sfa_menu").click(function() {
            $('#sfa_menu_modal').modal('show');
            get_data_menu();
        });

        //show information
        $("#modal_infomation").click(function() {
            $('#sfa_information_modal').modal('show');
        });

        if (localStorage.getItem("rev_rating") && us_id != "no session") {

            save_review(localStorage.getItem("rev_rating"), localStorage.getItem("rev_comment"));

            localStorage.removeItem("rev_rating");
            localStorage.removeItem("rev_comment");

            <?php
            $_SESSION["res_id"] = $res_id;
            ?>
        }

        load_rating_data(star);
    });


    function get_data_menu() {
        jQuery.ajax({
            url: "./get-data-menu-detail-res-page.php",
            data: {
                res_id: res_id
            },
            type: "POST",
            success: function(data) {
                //console.log(data);
                show_data_menu(data);
            },
            error: function() {

            }
        });
    }

    function show_data_menu(data) {
        let element = '';
        //add table to var html
        element += '<table class="table table-hover">';
        element += '   <thead class="thead-primary bg-primary">';
        element += '       <tr>';
        element += '           <th> <h3 class="text-white">ลำดับ</h3></th>';
        element += '           <th><h3 class="text-white">รายการ</h3></th>';
        element += '           <th><h3 class="text-white">ผลการตรวจสอบ</h3></th>';
        element += '       </tr>';
        element += '   </thead>';
        element += '    <tbody>'

        if (data["data_menu"].length == 0) {
            element += '<tr class="text-center" >';
            element += '<td colspan = "3">ไม่มีข้อมูล</td>';
            element += '<tr>';
        } else {
            data["data_menu"].forEach((row_menu, index_menu) => {

                element += '<tr>';
                element += '<td>' + (index_menu + 1) + '</td>';
                element += '<td>';
                element += row_menu['menu_name'];
                element += '</td>';

                if (row_menu['for_status'] == 2) {
                    element += '<td>';
                    element += '<p class="text-success">ผ่านการตรวจสอบ</p>';
                    element += '</td>';
                } else {
                    element += '<td>';
                    element += '<p class="text-warning">รอตรวจสอบ</p>';
                    element += '</td>';
                }
            });
        }
        element += '    </tbody>'
        element += '  </table>'

        $("#table_menu").html(element); //set ent_tel
    }

    function set_data_in_page(data) {

        //set data in html
        $("#res_title").html(data["data_res"][0].res_title); //set title
        $("#res_description").html(data["data_res"][0].res_description); //set description
        $("#res_cat_title").html(data["data_res"][0].res_cat_title); //set res title
        $("#ent_tel").html(data["data_res"][0].ent_tel); //set  tel
        $("#res_address").html(data["data_res"][0].res_address); //set address
        $("#res_provinces").html("อำเภอ" + data["data_res"][0].name_amp + " " + "จังหวัด" + data["data_res"][0].name_pro + " " + data["data_res"][0].zip_code); //set 

        // set status
        let status_for_html = '';
        if (data["data_formalin"][0] == "Not Safe") {

            status_for_html += '<img src="./../assets/img/icons/common/formalin_not.PNG" class=" text-center" alt="test">';
            status_for_html += ' <span> ร้านนี้กำลังรอตรวจสอบ</span>';

        } else if (data["data_formalin"].length == 0) {
            status_for_html += '<img src="./../assets/img/icons/common/formalin_not.PNG" class=" text-center" alt="test">';
            status_for_html += ' <span> ร้านนี้กำลังรอตรวจสอบ</span>';
        } else if (data["data_formalin"][0] == "Safe") {
            status_for_html += '<img src="./../assets/img/icons/common/formalin.PNG" class=" text-center" alt="test">';
            status_for_html += ' <span> ร้านนี้ปลอดภัย ไร้สารฟอมาลีน</span>';
        }

        $("#display_formalin").html(status_for_html); //set display for status

        //กรณีไม่มีล๊อก
        // //button "นำทาง
        res_location_lat = data["data_location"][0].lat; // set location data
        res_location_lon = data["data_location"][0].lon; // set location data 

        html_map = '';
        if (res_location_lat == null && res_location_lon == null) {
            // lat lon res = null ---> no button
            html_map += '<img src="./../assets/img/icons/common/googlemap.PNG" class="set-pic text-center" alt="test"> <br>';
            html_map += '<button class="btn btn-light mt-2" id="button_geolocation" ><span class="text-size-16">';
            html_map += '<i class="fas fa-map-marker"></i> ไม่มีข้อมูลตำแหน่ง</span></button>';
            $("#google_map_app").html(html_map);
        } else {
            // create button
            html_map += '<img src="./../assets/img/icons/common/googlemap.PNG" class="set-pic text-center" alt="test"> <br>';
            html_map += '<button class="btn btn-info mt-2" id="button_geolocation" onclick="click_go_google_map()" ><span class="text-size-16"> <i class="fas fa-map-marker"></i> นำทาง</span></button>';
            $("#google_map_app").html(html_map);
        }

    }

    function click_go_google_map() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(on_geo_success, on_geo_error);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    // If we have a successful location update
    function on_geo_success(event) {
        lat = event.coords.latitude;
        lon = event.coords.longitude;

        if (!lat && !lon) {

            window.open(
                "https://maps.google.com/?daddr=" + res_location_lat + ',' + res_location_lon,
                '_blank'
            );
        } else {
            window.open(
                "https://maps.google.com/?saddr=" + lat + "," + lon + "&daddr=" + res_location_lat + ',' + res_location_lon,
                '_blank'
            );
        }
    }


    // If something has gone wrong with the geolocation request
    function on_geo_error(event) {
        alert("Error code " + event.code + ". " + event.message);
    }

    function set_picture_res(data) {
        //set picture
        let html = '';

        //set image null
        if (data[0] == null) {
            //defaul picture
            document.getElementById("res_img_path").src = "../assets/img/theme/detail-banner-default.jpg";
        } else if (data[0] != null) {
            document.getElementById("res_img_path").src = "../admin-panel/php/uploads/img/" + data[0].res_img_path;
        }
        //modal_sfa_menu
    }

    // rating module
    var us_id = <?php if ($_SESSION["us_id"]) {
                    echo $_SESSION["us_id"];
                } else {
                    echo "'no session'";
                } ?>;
    var rev_rating = 0;


    $("#star_search").change(function() {
        // $(this).css("background-color", "#D6D6FF");



        star = $(this).val();

        load_rating_data(star)

    });

    function load_rating_data(star = '') {
        $.ajax({
            url: "./get_rating.php",
            method: "POST",
            data: {
                action: 'load_data',
                res_id: res_id,
                star: star
            },
            dataType: "JSON",
            success: function(data) {

                // console.log(data);
                var html = '';
                if (data.review_data.length > 0) {

                    avg_rating = parseFloat(data.review_avg[0].avg_rev_rating);

                    $('#average_rating').text(Number(avg_rating.toFixed(1)));

                    $('#total_review').text(data.review_data.length + " " + "รีวิว");


                    for (var i = 0; i < Math.ceil(avg_rating); i++) {
                        html += '<i class="fas fa-star text-warning mr-1 main_star text-size-36"></i>';
                    }
                    for (var i = 0; i < 5 - Math.ceil(avg_rating); i++) {
                        html += '<i class="fas fa-star star-light mr-1 main_star text-size-36"></i>';
                    }

                    $("#main_star").html(html);


                    html = '';

                    for (var i = 0; i < data.review_data.length; i++) {
                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-1"><i class="fas fa-user text-size-36"></i>';
                        html += '</div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>' + data.review_data[i].us_fname + ' ' + data.review_data[i].us_lname + '</b></div>';

                        html += '<div class="card-body">';

                        for (var star = 1; star <= 5; star++) {
                            var class_name = '';

                            if (data.review_data[i].rev_rating >= star) {
                                class_name = 'text-warning';
                            } else {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                        }

                        html += '<br />';
                        html += '<br />';

                        html += data.review_data[i].rev_comment;

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }
                    $('#review_content').html(html);
                } else {

                    $('#total_review').text("ยังไม่มีการรีวิว");

                    html += '<div class="row mb-3 mt-4 p-5 ">';
                    html += '<div class="col-sm-12">';
                    html += 'ร้านนี้ยังไม่มีรีวิว เป็นคนแรกที่รีวิวเลยสิ';
                    html += '</div>';
                    html += '</div>';

                    $('#review_content').html(html);
                }
            },
            error: function(error) {
                Swal.fire(
                    'Error',
                    'ขออภัย มีข้อผิดพลาดเกิดขึ้น',
                    'error'
                )
            }
        })
    }

    $(document).on('mouseenter', '.submit_star', function() {

        var rating = $(this).data('rating');

        reset_background();

        for (var i = 1; i <= rating; i++) {

            $('#submit_star_' + i).addClass('text-warning');

        }

    });

    function reset_background() {
        for (var i = 1; i <= 5; i++) {

            $('#submit_star_' + i).addClass('star-light');

            $('#submit_star_' + i).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function() {

        reset_background();

        for (var count = 1; count <= rev_rating; count++) {

            $('#submit_star_' + count).removeClass('star-light');

            $('#submit_star_' + count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function() {

        rev_rating = $(this).data('rating');

    });



    $('#save_review').click(function() {

        var rev_comment = $('#rev_comment').val();
        if (rev_comment.trim() == "" && rev_rating == 0) {
            Swal.fire(
                'แจ้งเตือน',
                'กรุณากรอกการรีวิว',
                'warning'
            );
            return false;
        } else {
            if (us_id == "no session") {
                localStorage.setItem("rev_rating", rev_rating);
                localStorage.setItem("rev_comment", rev_comment);

                <?php
                $_SESSION["res_id"] = $res_id;
                ?>

                window.location.href = '../../login/login.php';

            } else {
                save_review(rev_rating, rev_comment);
            }
        }

    });



    function save_review(rev_rating, rev_comment) {
        $.ajax({
            url: "./add_rating.php",
            method: "POST",
            data: {
                rev_rating: rev_rating,
                rev_comment: rev_comment,
                us_id: us_id,
                res_id: res_id
            },
            success: function(data) {

                toastify_success();

                $('#rev_comment').val('');

                reset_background();

                load_rating_data();

            },
            error: function(error) {
                Swal.fire(
                    'Error',
                    'ขออภัย มีข้อผิดพลาดเกิดขึ้น',
                    'error'
                )
            }
        })
    }

    function toastify_success() {
        Toastify({
            text: "ขอบคุณลูกค้าสำหรับการรีวิว",
            duration: 5000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            style: {
                background: "#12a63a",
            }
        }).showToast();
    }
</script>