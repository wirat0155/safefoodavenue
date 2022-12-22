<!-- 
/*
* add-log
* add-log
* @input entprenuer name,  
* @output form add restaurant
* @author Jutamas Thaptong 62160079
* @Create Date 2565-06-17
*/ 
-->

<style>
.form-control {
    color: #525f7f;
}

.required:after {
    color: red;
    content: ' *';
    display: inline;
}

.required {
    color: blue;
}
</style>
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">เพิ่มบล๊อก</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ฺเพิ่มบล๊อก</li>
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

<!-- Content -->
<?php
    $sql = " SELECT * FROM sfa_zone ";
    $dbZone = mysqli_query($con, $sql);
?>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card border-0">
                <div class="table-responsive py-4 px-4">
                    <form action="./php/action-add-block-detail.php" method="POST" enctype="multipart/form-data" id="add_log">
                        <div class="row pb-4">
                            <!-- เลือกโซน -->
                            <div class="col-md-3">
                                <label for="zone_id" class="required">โซน</label>
                                <select name="zone_id" id="zone_id" class="form-control" onchange="toggleBlock()" required>
                                    <option value="" selected disabled>เลือกโซน</option>
                                    <?php while ($row = mysqli_fetch_array($dbZone)) { ?>
                                    <option value="<?= $row["zone_id"] ?>">
                                        <?= $row["zone_title"] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- ชื่อบล๊อก -->
                            <div class="col-md-6">
                                <label class="required">ชื่อบล๊อก</label>
                                <input type="text" id="block_title" name="block_title" class="form-control" placeholder="ใส่ชื่อบล๊อก" oninput="check_name_block()" required disabled>
                                <span id="status_block_title"></span>
                            </div>
                        </div>



                        <!-- ตำแหน่งที่ตั้ง -->
                        <div class="row pb-4">
                            <h3 class="mb-0">ตำเเหน่งที่ตั้ง</h3> &nbsp&nbsp <button type="button" class="btn btn-primary" onclick="getLocation()"> <i class="ni ni-pin-3"></i> &nbsp ตำแหน่งปัจจุบัน</button>
                        </div>
                        <div class="row pb-4">
                            <!-- ละติจูด -->
                            <div class="col-md-4">
                                <label class="required">ละติจูด</label>
                                <input type="text" id="lat_name" name="lat_name" class="form-control" placeholder="ใส่ละติจูด" required>
                                <span class="text-danger" id="error_lat_name"></span>
                            </div>
                            <!-- ลองติจูด -->
                            <div class="col-md-4">
                                <label class="required">ลองติจูด</label>
                                <input type="text" id="lon_name" name="lon_name" class="form-control" placeholder="ใส่ลองติจูด" required>
                                <span class="text-danger" id="error_lon_name"></span>
                            </div>
                        </div>
                        <div class="row pb-4">
                            <button type="button" class="btn btn-success" onclick="submit_log()">บันทึก</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='./?content=list-block'">ยกเลิก</button>
                            <!-- <a href="./?content=list-block" class="btn btn-secondary">ยกเลิก</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    /*
     * check_name_block
     * check name block that have in database
     * @input 
     * @output 
     * @author Nantasiri Saiwaew
     * @Create Date 2565-06-29
     */

    function toggleBlock() {
        if ($("#zone_id").val() !== "") {
            $("#block_title").removeAttr('disabled');
        } else {
            $("#block_title").attr('disabled', 'disabled');
        }
        check_name_block()
    }

    // เช็คชื่อบล็อกซ้ำ
    function check_name_block() {
        jQuery.ajax({
            url: "<?php echo "check_name.php" ?>",
            // data: 'block_title=' + $("#block_title").val(),
            data: {
                zone_id: $("#zone_id").val(),
                block_title: $("#block_title").val(),
            },
            type: "POST",
            success: function(data) {
                $("#status_block_title").html(data);
            },
            error: function() {}
        });
    }
    </script>



</div>
<script>
let lat_log = document.getElementById("lat_name");
let lon_log = document.getElementById("lon_name");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        lat.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    lat_log.value = position.coords.latitude;
    lon_log.value = position.coords.longitude;
}

function submit_log() {
    if (confirm("ยืนยันการเพิ่มข้อมูล")) {
        document.getElementById("add_log").submit();
    }
}
</script>