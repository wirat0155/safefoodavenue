<?php
    // get block data
    $block_id = $_GET["block_id"];
    $sql = "SELECT * FROM `sfa_block` WHERE `block_id` = " . $block_id;
    $arr_block = mysqli_query($con, $sql);
    $obj_block = mysqli_fetch_array($arr_block);

    // get government
    $sql = "SELECT * FROM `sfa_government`";
    $arr_government= mysqli_query($con, $sql);

    // get gov_id by zone_id
    $sql = "SELECT * FROM `sfa_zone` WHERE `sfa_zone`.`zone_id` = '" . $obj_block["block_zone_id"] . "'";
    $arr_zone = mysqli_query($con, $sql);
    $obj_zone = mysqli_fetch_array($arr_zone);
    $gov_id = $obj_zone["zone_gov_id"];
    
    // get zone to dropdown
    $sql = "SELECT * FROM `sfa_zone` WHERE `sfa_zone`.`zone_gov_id` = '" . $gov_id . "'";
    $arr_zone = mysqli_query($con, $sql);
?>

<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">เเก้ไขบล๊อก</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">แก้ไขบล๊อก</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card border-0">
                <div class="table-responsive py-4 px-4">
                    <form action="./php/action-edit-block.php" method="POST" enctype="multipart/form-data">
                        <div class="row pb-4">
                                <!-- องค์กรปกครองส่วนท้องถิ่น -->
                                <div class="col-md-6">
                                    <label class="required" for="gov_id">องค์กรปกครองส่วนท้องถิ่น</label>
                                    <select id="gov_id" name="gov_id" class="select2 form-control" onchange="get_zone()" required>
                                        <option value="" selected disabled>เลือกองค์กรปกครองส่วนท้องถิ่น</option>
                                        <?php 
                                        while ($obj_government = mysqli_fetch_array($arr_government)) { 
                                            $selected = $gov_id == $obj_government["gov_id"]? "selected" : "";
                                            ?>
                                            <option value="<?= $obj_government["gov_id"] ?>" <?= $selected ?>>
                                                <?= $obj_government["gov_name"] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <!-- เลือกโซน -->
                                <div class="col-md-6">
                                    <label for="block_zone_id" class="required">โซน</label>
                                    <select name="block_zone_id" id="block_zone_id" class="select2 form-control" onchange="check_name_block()" required>
                                        <option value="" selected disabled>เลือกโซน</option>
                                        <?php 
                                        while ($obj_zone = mysqli_fetch_array($arr_zone)) {
                                            $selected = $obj_block["block_zone_id"] == $obj_zone["zone_id"]? "selected" : "";
                                            ?>
                                            <option value="<?= $obj_zone["zone_id"] ?>" <?= $selected?>>
                                                <?= $obj_zone["zone_title"] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                        <div class="row pb-4">
                            <!-- ชื่อบล๊อก -->
                            <div class="col-md-6">
                                <label class="required">ชื่อบล๊อก</label>
                                <input type="text" id="block_title" name="block_title" class="form-control" placeholder="ใส่ชื่อบล๊อก" oninput="check_name_block();" value="<?php echo $obj_block['block_title']; ?>" required>
                                <span id="status_block_title"></span>
                            </div>
                        </div>


                        <div class="row pb-4">
                            <div class="col">
                                <h3 class="mb-0">ตำเเหน่งที่ตั้ง </h3> 
                                <button type="button" class="btn btn-primary" onclick="getLocation()"> <i class="ni ni-pin-3"></i> &nbsp ตำแหน่งปัจจุบัน</button>
                            </div>
                        </div>

                        <div class="row pb-4">
                            <!-- ละติจูด -->
                            <div class="col-md-4">
                                <label class="required">ละติจูด</label>
                                <input type="text" id="block_lat" name="block_lat" class="form-control" placeholder="ใส่ละติจูด" value="<?php echo $obj_block['block_lat']; ?>" required>
                                <span class="text-danger" id="error_block_lat"></span>
                            </div>
                            <!-- ลองติจูด -->
                            <div class="col-md-4">
                                <label class="required">ลองติจูด</label>
                                <input type="text" id="block_lon" name="block_lon" class="form-control" placeholder="ใส่ลองติจูด" value="<?php echo $obj_block['block_lon']; ?>" required>
                                <span class="text-danger" id="error_block_lon"></span>
                            </div>

                        </div>
                        <div class="row pb-4">
                            <div class="col">
                                <input type="submit" id="cf_btn" class="btn btn-warning" value="แก้ไขบล็อก">
                                <button type="button" class="btn btn-secondary" onclick="location.href='./?content=list-block'">ยกเลิก</button>
                            </div>
                        </div>
                        <input type="hidden" name="block_id" value="<?php echo $obj_block['block_id'] ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <style>
    /* Set the size of the div element that contains the map */
    #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
    }
    </style>

    <div id="map" class="map-canvas"></div>
    <script>
    // Initialize and add the map
    <?php
        $sql = "SELECT * FROM sfa_block WHERE `block_lat` IS NOT NULL AND `block_lon` IS NOT NULL";
        $obj = mysqli_query($con, $sql);
        ?>
    var locations = [
        <?php
            while ($row = mysqli_fetch_array($obj)) {
            ?>['<?php echo $row["block_title"]; ?>', <?php echo $row["block_lat"]; ?>, <?php echo $row["block_lon"]; ?>],
        <?php
            } // End while
            ?>['บางแสน', 13.285381, 100.913837, 1]

    ];

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: new google.maps.LatLng(13.285381, 100.913837),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }
    </script>
</div>


<script>
let lat2 = document.getElementById("block_lat");
let lon2 = document.getElementById("block_lon");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        lat2.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    lat2.value = position.coords.latitude;
    lon2.value = position.coords.longitude;
}

function get_zone() {
        jQuery.ajax({
            dataType: "json",
            url: "<?php echo "get_location.php" ?>",
            data: 'gov_id=' + $("#gov_id").val(),
            type: "POST",
            success: function(arr_zone) {
                if (arr_zone != "no output") {
                    clear_zone_dropdown();
                    show_zone_dropdown(arr_zone);
                } else {
                    clear_zone_dropdown();
                }
                $("#block_zone_id").val();
                check_name_block();
            },
            error: function() {}
        });
    }
    function show_zone_dropdown(arr_zone) {
        for(var i = 0; i < arr_zone.length; i++) {
            option = '<option value="' + arr_zone[i]['zone_id'] + '">' + arr_zone[i]['zone_title'] + '</option>'
            $("#block_zone_id").append(option);
        }
    }
    function clear_zone_dropdown() {
        var option = '<option value="" disabled selected>เลือกโซน</option>';
        $("#block_zone_id").html(option);
    }

    function check_name_block() {
        jQuery.ajax({
            dataType: "json",
            url: "<?php echo "check_name.php" ?>",
            data: {
                zone_id: $("#block_zone_id").val(),
                block_title: $("#block_title").val(),
            },
            type: "POST",
            success: function(status) {
                console.log(status);
                if ($("#block_title").val() == "" || $("#block_zone_id").val() == "") {
                    $("#status_block_title").html("");
                    chk_block_title = 1;
                } else {
                    if (status != "duplicate") {
                        $("#status_block_title").html("<span style='color:green'>สามารถใช้ชื่อบล็อกนี้ได้</span>");
                        chk_block_title = 0;
                    } else {
                        $("#status_block_title").html("<span style='color:red'>ชื่อบล็อกนี้มีผู้ใช้งานแล้ว</span>");
                        chk_block_title = 1;
                    }
                }
                check_btn_submit();
            },
            error: function() {
                $("#status_block_title").html("");
            }
        });
    }
    function check_btn_submit() {
        if (chk_block_title == 1) {
            $('#cf_btn').prop('disabled', true);
        } else {
            $('#cf_btn').prop('disabled', false);
        }
    }
</script>