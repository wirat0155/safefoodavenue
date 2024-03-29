<!-- 
/*
* detail-restaurant
* detail-restaurant
* @input entprenuer name,  
* @output detail restaurant
* @author Jutamas Thaptong 62160079
* @Create Date 2565-06-20
*/ 
-->

<?php
$res_id = isset($_GET["res_id"]) ? $_GET["res_id"] : "1";
?>


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

    @media only screen and (max-width: 600px) {
        .res-hide {
            display: none;
        }
    }

    @media screen and (max-width: 400px) {
        .res-hide {
            display: none;
        }
    }

    .comment-widgets .comment-row:hover {
        background: rgba(0, 0, 0, 0.02) !important;
        cursor: pointer !important;
    }

    .comment-widgets .comment-row {
        border-bottom: 1px solid rgba(120, 130, 140, 0.13) !important;
        padding: 15px !important;
    }

    .comment-text:hover {
        visibility: hidden;
    }

    .comment-text:hover {
        visibility: visible;
    }
</style>



<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">รายละเอียดร้านอาหาร</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
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


                                            <!-- <button class="btn btn-secondary mr-2" type="button" id="modal_infomation">
                                                <i class="fa fa-info"></i>
                                            </button> -->

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
                                <div class="card d-flex bg-gray-fix">
                                    <div class="card-body text-center">
                                        <div class="row">
                                            <div class="col text-center ">

                                                <b><span class="text-size-28 text-dark" id="average_rating"></span></b>
                                                <div class="main_star text-size-28" id="">

                                                </div>
                                                <h3 class="text-size-16 mt-2"><span id="total_review"></span></h3>

                                            </div>
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


                                        <div class="mt-5 text-left" id="review_content"></div>


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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var res_id = <?php echo $res_id;  ?>;
    var res_location_lat = '';
    var res_location_lon = '';
    var star = 0;

    $(document).ready(function() {
        //set data in ajax
        jQuery.ajax({
            url: "./get-restaurant-detail.php",
            data: {
                res_id: res_id
            },
            type: "POST",
            success: function(data) {
                set_data_in_page(data);
                set_picture_res(data['data_pic']);
            },
            error: function() {
                console.log("ERROR");
            }
        });


    });

    load_rating_data(star);

    //show modal menu in res
    $("#modal_sfa_menu").click(function() {
        $('#sfa_menu_modal').modal('show');
        get_data_menu();
    });

    //show information
    $("#modal_infomation").click(function() {
        $('#sfa_information_modal').modal('show');
    });


    function get_data_menu() {
        jQuery.ajax({
            url: "./get-data-menu-detail-res-page.php",
            data: {
                res_id: res_id
            },
            type: "POST",
            success: function(data) {
                console.log(data);
                show_data_menu(data);
            },
            error: function() {
                console.log("ERR Data menu");
            }
        });
    }

    function show_data_menu(data) {
        let element = '';
        //add table to var html
        element += '<table class="table table-hover table-responesive">';
        element += '   <thead class="thead-primary bg-primary">';
        element += '       <tr>';
        element += '           <th class="res-hide"> <h3 class="text-white">ลำดับ</h3></th>';
        element += '           <th><h3 class="text-white">รายการ</h3></th>';
        element += '           <th><h3 class="text-white">ผลการตรวจสอบ</h3></th>';
        element += '           <th><h3 class="text-white">ตรวจเมื่อ</h3></th>';
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
                element += '<td class="res-hide">' + (index_menu + 1) + '</td>';
                element += '<td>';
                element += row_menu['menu_name'];
                element += '</td>';

                if (row_menu['for_status'] == 2) {
                    element += '<td>';
                    element += '<p class="text-success">ผ่าน</p>';
                    element += '</td>';
                } else {
                    element += '<td>';
                    element += '<p class="text-warning">รอตรวจสอบ</p>';
                    element += '</td>';
                }

                element += '<td>';
                element += data["data_date_check"][index_menu];
                element += '</td>';
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

        $("#ent_tel").html(data["data_res"][0].ent_tel); //set  tel
        $("#res_address").html(data["data_res"][0].res_address); //set address
        $("#res_provinces").html("อำเภอ" + data["data_res"][0].name_amp + " " + "จังหวัด" + data["data_res"][0].name_pro + " " + data["data_res"][0].zip_code); //set 


        // set status formalin
        let status_for_html = '';
        if (data["data_formalin"][0] == "Not Safe") {

            //  status_for_html += '<img src="./../assets/img/icons/common/formalin_not_grey.PNG" class=" text-center" alt="test">';
            status_for_html += ' <span> ร้านนี้กำลังรอตรวจสอบ</span>';

        } else if (data["data_formalin"].length == 0) {
            //  status_for_html += '<img src="./../assets/img/icons/common/formalin_not_grey.PNG" class=" text-center" alt="test">';
            status_for_html += ' <span> ร้านนี้กำลังรอตรวจสอบ</span>';
        } else if (data["data_formalin"][0] == "Safe") {
            // status_for_html += '<img src="./../assets/img/icons/common/formalin_grey.PNG" class=" text-center" alt="test">';
            status_for_html += '   <span class="badge badge-success text-size-24  text-white">ปลอดภัย</span>';
            status_for_html += ' <span> ร้านนี้ปลอดภัย ไร้สารฟอร์มาลีน</span> <br><br>';
            status_for_html += ' <span>ได้รับการตรวจเมื่อวันที่ ' + data["data_formalin_date"][0] + '</span>';
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

                console.log(data);
                var html = '';
                if (data.review_data.length > 0) {

                    avg_rating = parseFloat(data.review_avg[0].avg_rev_rating);

                    $('#average_rating').text(Number(avg_rating.toFixed(1)));

                    $('#total_review').text(data.review_data.length + " " + "รีวิว");


                    let score = data.review_avg[0].avg_rev_rating;
                    let whole_star = Math.floor(score);
                    var haft_star = (whole_star < score);


                    for (var star = 1; star <= whole_star; star++) {
                        let class_name = 'text-warning';
                        html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                    }


                    // And the half star
                    if (haft_star) {
                        let class_name = 'fa-star-half';
                        html += '<i class="fas fa-star text-warning ' + class_name + ' mr-1"></i>';

                    }

                    $(".main_star").html(html);
                    html = '';

                    html += '<div class="comment-widgets m-b-20">';
                    for (var i = 0; i < data.review_data.length; i++) {
                        html += '<div class="d-flex flex-row comment-row" >';
                        html += '<div class="comment-text w-100">';

                        html += '<b><h3>' + data.review_data[i].us_fname + ' ' + data.review_data[i].us_lname + '<h3></b>';
                        html += ' <div class="comment-footer">';
                       
                        for (var star = 1; star <= 5; star++) {
                            var class_name = '';

                            if (data.review_data[i].rev_rating >= star) {
                                class_name = 'text-warning';
                            } else {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                        }
                        html += '<p class="date">' + data.review_data_date[i] + '</p>';

                        html += '</div>'; //footer
                    
                        html += '<p class="m-b-5 m-t-10">' + data.review_data[i].rev_comment + '</p>';

                        html += '</div>';//comment text w-100
                        html += '</div>';

                    }
                    $('#review_content').html(html);
                } else {

                    $('#total_review').text("ยังไม่มีการรีวิว");

                    html += '<div class="row mb-3 mt-4 p-5 text-center">';
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
</script>
<!-- Footer -->
<?php include("footer.php"); ?>