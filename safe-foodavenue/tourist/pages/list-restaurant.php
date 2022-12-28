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

    .text-size-11 {
        font-size: 11px;
    }

    .card-fix {
        max-height: 400px !important;
        height: 400px !important;

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

                    <div class="row pb-4 justify-content-md-center">
                        <div class="col-md-11 h2">
                            <label>รายการร้านอาหาร</label>
                        </div>
                    </div>
                    <div class="row pb-4 justify-content-md-center">
                        <div class="col-md-11 h2">
                            <form action="" method="post" id="search_res">

                                <input type="hidden" name="content" value="list-restaurant">

                                <div class="row">
                                    <div class="col-md-3">
                                        <select class="form-control" name="s_block" id="s_block" onchange="">
                                            <option value="" selected disabled>เลือกจังหวัด</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <select class="form-control" name="s_block" id="s_block" onchange="">
                                            <option value="" selected disabled>เลือกอำเภอ</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <select class="form-control" name="s_block" id="s_block" onchange="">
                                            <option value="" selected disabled>เลือกตำบล</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <select class="form-control" name="s_block" id="s_block" onchange="">
                                            <option value="" selected disabled>เลือกโซน</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="s_block" id="s_block" onchange="">
                                            <option value="" selected disabled>เลือกล๊อก</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="s_restaurant" id="s_restaurant" placeholder="ชื่อร้านอาหาร" aria-describedby="button-addon2" onchange="get_keyword_search()" value="<?php echo $q; ?>">
                                            <button class="btn btn-primary ml-2" type="button" id="button-addon2" onclick="get_keyword_search()">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                    <div class="row justify-content-md-center" style="padding: 0px 75px;">
                        <div class="container">


                            <div class="list_res" id="list_res"></div>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var page_number = 0;

    $(document).ready(function() {

        get_res_list_data(page_number);

    });


    function get_res_list_data(page_number) {
        $.ajax({
            url: "./get-restaurant-list.php",
            method: "POST",
            data: {
                page: page_number
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

        if (data.data_res.length > 0) {

            html += '  <div class="row py-3">';
            //loop show data 
            data.data_res.forEach((row_res, index_res) => {

                // console.log(row_res);


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
                html += ' <div class="col col-sm-12 col-md-12 col-lg-6">';
                html += '   <span class="badge badge-success text-size-12  text-white">ปลอดภัยจากสารฟอมาลีน</span>';
                html += ' </div>';
                html += '<div class="col col-sm-12 col-md-12 col-lg-6">';
                html += '   <h4 class="text-center text-size-11">';


                for (var star = 1; star <= 5; star++) {
                    var class_name = '';

                    if (row_res.rev_rating >= star) {
                        class_name = 'text-warning';
                    } else {
                        class_name = 'star-light';
                    }
                    html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                }

                html += '   </h4>';
                html += '</div>';
                html += '</div>';
                html += '<div class="row">';
                html += '   <div class="col col-sm-12 col-md-12 col-lg-12">';
                html += '       <h2 class="ml-2">' + row_res.res_title + '</h2>';
                html += '    </div> ';
                html += '</div>';
                html += ' <div class="row">';
                html += '     <div class="col">';
                html += '        <p class="ml-2 text-dark">' + row_res.res_cat_title + '</p>';
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

            $('#total_review').text("ยังไม่มีการรีวิว");

            html += '<div class="row mb-3">';
            html += '<div class="col-sm-12">';
            html += 'ร้านนี้ยังไม่มีรีวิว';
            html += '</div>';
            html += '</div>';

            $('#review_content').html(html);
        }

    }
</script>