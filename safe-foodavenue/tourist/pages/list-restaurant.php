<style>
    .btn-custom {
        box-shadow: none !important;
    }

    .div-res {
        margin-bottom: 25px;
        border-radius: 10px;
        background-color: #f7f7f7;
        box-shadow: 2px 2px 5px #CCC;
    }

    .div-res a {
        color: #32325d !important;
    }


    .div-res:hover {
        background-color: #e6e6e6;
    }

    .pagination {
        display: inline-block;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
    }

    .pagination a.active {
        background-color: #3366FF;
        color: white;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }

    .col-md-4 {
        flex: 0 0 33.33333% !important;
        max-width: 33.33333% !important;
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
        max-height: 400px !important;
        height: 400px !important;

    }

    .badge-warning-fix {
        background-color: #FFB600;
    }
</style>

<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">รายการร้านอาหาร</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="?content=disp-block-map">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">รายการร้านอาหาร</li>
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


<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card border-0">

                <div class="table-responsive py-4 px-4">

                    <div class="container">
                        <div class="row pb-4 justify-content-center">
                            <div class="col-md-11 h2">
                                <label>รายการร้านอาหาร</label>
                            </div>
                        </div>
                        <div class="row pb-4 justify-content-center">
                            <div class="col-md-11 h2">

                                <form action="" method="post" id="search_res">

                                    <input type="hidden" name="content" value="list-restaurant">

                                    <div class="row justify-content-center">
                                        <div class="col-12 col-sm-8 col-md-8 col-lg-4 py-2">
                                            <select class="select2 form-control" id="div_provinces">
                                                <option value=""  selected>เลือกจังหวัด</option>
                                            </select>
                                        </div>

                                        <div class="col-12 col-sm-8 col-md-8 col-lg-4 py-2">
                                            <select class="select2 form-control" name="s_block" id="div_amphures" onchange="">
                                                <option value="" selected >เลือกอำเภอ</option>
                                            </select>
                                        </div>

                                        <div class="col-12 col-sm-8 col-md-8 col-lg-4 py-2">
                                            <select class="select2 form-control" name="" id="div_districts" onchange="">
                                                <option value="" selected >เลือกตำบล</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-2 justify-content-center">
                                        <div class="col-12 col-sm-8 col-md-8 col-lg-4 py-2">
                                        <select class="select2 form-control" name="" id="div_zone" onchange="">
                                                <option value="" selected >เลือกโซน</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-8 col-md-8 col-lg-4 py-2">
                                            <div class="">
                                                <select class="form-control" id="star_search">
                                                    <option value="0">เลือกคะแนน</option>
                                                    <option value="5">5 ดาว</option>
                                                    <option value="4">4 ดาว</option>
                                                    <option value="3">3 ดาว</option>
                                                    <option value="2">2 ดาว</option>
                                                    <option value="1">1 ดาว</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-8 col-md-8 col-lg-4 py-2">

                                            <input type="text" class="form-control" name="s_restaurant" id="search_restaurant" placeholder="ชื่อร้านอาหาร" aria-describedby="button-addon2" value="">

                                        </div>
                                    </div>


                                    <div class="row mt-2">
                                        <div class="col d-flex flex-row-reverse">
                                            <button class="btn btn-primary ml-2" type="button" id="button_search">
                                                <i class="fa fa-search" aria-hidden="true"></i> ค้นหา
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="list_res" id="list_res"></div>

                    </div>

                    <div align="center" id="page_next">
                        <button type="button" name="previous" class="btn btn-warning btn-sm previous" id="pre">ก่อนหน้า</button>
                        <button type="button" name="next" class="btn btn-warning btn-sm next" id="next">ถัดไป</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    var page_number = 1;
    var query = '';
    var provinces = '';
    var districts = '';
    var amphures = '';
    var zone = '';


    $(document).ready(function() {

        get_res_list_data('', page_number);

        get_provinces();

        $('#button_search').click(function() {

            //alert("test");
            query = $('#search_restaurant').val();
            provinces = $('#div_provinces').val();
            amphures = $('#div_amphures').val();
            districts = $('#div_districts').val();
            zone = $('#div_zone').val();

          //  console.log("result = " + provinces + amphures + districts + zone);


            //query = '', page_number, provinces = null, amphures = null, districts = null,  zone = null
            get_res_list_data(query, page_number, provinces, amphures, districts, zone);

        });



        $('#div_provinces').on('change', function() {
            //alert(this.value);
            get_amphures(this.value);
            get_zone(this.value);
        });

        $('#div_amphures').on('change', function() {
            //alert(this.value);
            get_districts(this.value);
        });

    });

    function get_provinces() {
        $.ajax({
            url: "./get_provinces_amphure_dis.php",
            method: "POST",
            dataType: "JSON",
            data: {
                provinces: "province"
            },
            success: function(data) {

                show_province_dropdown(data);

            }
        })
    }

    function get_amphures(pro_id) {

        $.ajax({
            url: "./get_provinces_amphure_dis.php",
            method: "POST",
            dataType: "JSON",
            data: {
                amphures: "amphures",
                provinces_id: pro_id
            },
            success: function(data) {

                console.log(data)
                show_amphures_dropdown(data);

            }
        })
    }


    function get_districts(amp_id) {
        $.ajax({
            url: "./get_provinces_amphure_dis.php",
            method: "POST",
            dataType: "JSON",
            data: {
                districts: "districts",
                amphures_id: amp_id,
            },
            success: function(data) {

                show_districts_dropdown(data)

            }
        })
    }

    function get_zone(provinces_id) {
        $.ajax({
            url: "./get_provinces_amphure_dis.php",
            method: "POST",
            dataType: "JSON",
            data: {
                zone: "zone",
                provinces_id: provinces_id,
            },
            success: function(data) {

                show_zone_dropdown(data)

            }
        })
    }

    function get_res_list_data(query = '', page_number, provinces = '', amphures = '', districts = '',  zone = '') {
        // alert(page_number);
        $.ajax({
            url: "./get-restaurant-list.php",
            method: "POST",
            data: {
                page: page_number,
                query: query,
                provinces: provinces,
                amphures: amphures,
                districts: districts,
                zone: zone
            },
            success: function(data) {

                console.log(data);

                set_data_in_page(data)

            },
            error: function() {
                console.log("error")
            }
        });
    }


    // show data restaurant in page
    function set_data_in_page(data) {

        let html = '';

        if (data != "No data" ) {

            html += '  <div class="row py-3">';
            //loop show data 
            data.data_res.forEach((row_res, index_res) => {

                html += '<div class="col-12 col-sm-6 col-md-6 col-lg-4 py-2">';
                html += ' <a href="?content=detail-restaurant&id=' + row_res.res_id + '">';
                html += ' <div class="card card-fix rounded-4">';

                if (row_res.res_img_path == null) {

                    html += '<img class="card-img-top" style="height: 200px; object-fit: cover;" src="../assets/img/theme/detail-banner-default.jpg" alt="Card image cap">';

                } else {

                    html += ' <img class="card-img-top w-100" style="height: 200px; object-fit: cover;" src="' + '../admin-panel/php/uploads/img/' + row_res.res_img_path + '" alt="Card image cap">';

                }
                html += '<div class="card-body">';
                html += '<div class="row">';
                html += ' <div class="col col-sm-8 col-md-8 col-lg-6">';

                if (row_res.res_for_status == 0) {
                    html += '   <span class="badge badge-success text-size-12  text-white">ปลอดภัยจากสารฟอมาลีน</span>';
                } else {
                    html += '   <span class="badge badge-warning badge-warning-fix text-size-12  text-white">กำลังรอตรวจสอบ</span>';
                }

                html += ' </div>';
                html += '<div class="col col-sm-8 col-md-8 col-lg-6">';
                html += '   <h4 class="text-center text-size-11">';

                let avg_rating = parseFloat(row_res.review[0]); // set float data review star

                for (var star = 1; star <= 5; star++) {
                    var class_name = '';

                    if (Math.ceil(avg_rating) >= star) {
                        class_name = 'text-warning';
                    } else {
                        class_name = 'star-light';
                    }
                    html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                }

                html += '   </h4>';
                html += '</div>';
                html += '</div>';
                html += '<div class="row mt-2">';
                html += '   <div class="col col-sm-12 col-md-12 col-lg-12">';
                html += '       <h2 class="ml-2">' + row_res.res_title + '</h2>';
                html += '    </div> ';
                html += '</div>';
                html += ' <div class="row">';
                html += '     <div class="col">';
                if (row_res.res_cat_title != null) {
                    html += '        <p class="ml-2 text-dark">' + row_res.res_cat_title + '</p>';
                } else {
                    html += '        <p class="ml-2 text-dark">อื่น ๆ</p>';
                }

                html += '      </div>     ';
                html += '</div>     ';
                html += '</div>     ';
                html += '</div>     ';
                html += '</div>     ';

            });
            html += ' </a>';
            html += ' </div>     ';

            $('#list_res').html(html);
            $('#page_next').html(data.page);

        } else {

        console.log("check ");

            html += '<div class="container text-center">';
            html += '<div class="row">';
            html += '<h1>ไม่พบร้านค้า จากการค้นหานี้';
            html += '</div>';
            html += '</div>';

            $('#list_res').html(html);
            $('#page_next').html(" ");
        }

    }


    function show_province_dropdown(data) {

        let html_code = "";

        for (let i = 0; i < data['data'].length; i++) {

            html_code += '<option value="' + data['data'][i].id + '">' + data['data'][i].name_th + '</option>';
        }

        $('#div_provinces').append(html_code);

    }

    function show_amphures_dropdown(data) {
        clear_amphures_dropdown()
        let html_code = "";

        for (let i = 0; i < data['data'].length; i++) {

            html_code += '<option value="' + data['data'][i].id + '">' + data['data'][i].name_th + '</option>';
        }

        $('#div_amphures').append(html_code);

    }

    function show_districts_dropdown(data) {

        clear_districts_dropdown()
        let html_code = "";

        for (let i = 0; i < data['data'].length; i++) {

            html_code += '<option value="' + data['data'][i].id + '">' + data['data'][i].name_th + '</option>';
        }

        $('#div_districts').append(html_code);

    }

    function show_zone_dropdown(data) {

        clear_zone_dropdown()
        let html_code = "";

        for (let i = 0; i < data['data'].length; i++) {

            html_code += '<option value="' + data['data'][i].zone_id + '">' + data['data'][i].zone_title + '</option>';
        }

        $('#div_zone').append(html_code);

    }

    function clear_amphures_dropdown() {
        var option = '<option value=""  selected>เลือกอำเภอ</option>';
        $("#div_amphures").html(option);
    }


    function clear_districts_dropdown() {
        var option = '<option value=""  selected>เลือกตำบล</option>';
        $("#div_districts").html(option);
    }

    function clear_zone_dropdown() {
        var option = '<option value=""  selected>เลือกโซน</option>';
        $("#div_zone").html(option);
    }
</script>