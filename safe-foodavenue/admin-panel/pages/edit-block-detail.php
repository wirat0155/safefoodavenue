<!--

=========================================================
* * NextJS Argon Dashboard PRO v1.1.0 based on Argon Dashboard PRO React v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/nextjs-argon-dashboard-pro
* Copyright 2021 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<?php
$bid = $_GET["bid"];
$sql = "SELECT * FROM sfa_block WHERE block_id = " . $bid;
$entries = mysqli_query($con, $sql);
$entry = mysqli_fetch_array($entries);
?>

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
                    <h6 class="h2 text-white d-inline-block mb-0">เเก้ไขบล๊อก</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ฺเเก้ไขบล๊อก</li>
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
                    <form action="./php/action-edit-block-detail.php" method="POST" enctype="multipart/form-data" id="update_block">
                        <div class="row pb-4">
                            <!-- ชื่อบล๊อก -->
                            <div class="col-md-6">
                                <label class="required">ชื่อบล๊อก</label>
                                <input type="text" id="block_title" name="block_title" class="form-control" placeholder="ใส่ชื่อบล๊อก" oninput="check_name_block()" value="<?php echo $entry['block_title']; ?>" required>
                                <span id="status_block_title"></span>
                            </div>
                        </div>
                        <div class="row pb-4">
                            <h3 class="mb-0">ตำเเหน่งที่ตั้ง </h3> &nbsp&nbsp <button type="button" class="btn btn-primary" onclick="getLocation()"> <i class="ni ni-pin-3"></i> &nbsp ตำแหน่งปัจจุบัน</button>
                        </div>
                        <div class="row pb-4">
                            <!-- ละติจูด -->
                            <div class="col-md-4">
                                <label class="required">ละติจูด</label>
                                <input type="text" id="lat_name" name="lat_name" class="form-control" placeholder="ใส่ละติจูด" value="<?php echo $entry['block_lat']; ?>" required>
                                <span class="text-danger" id="error_lat_name"></span>
                            </div>
                            <!-- ลองติจูด -->
                            <div class="col-md-4">
                                <label class="required">ลองติจูด</label>
                                <input type="text" id="lon_name" name="lon_name" class="form-control" placeholder="ใส่ลองติจูด" value="<?php echo $entry['block_lon']; ?>" required>
                                <span class="text-danger" id="error_lon_name"></span>
                            </div>

                        </div>
                        <div class="row pb-4">
                            <button type="button" class="btn btn-success" onclick="submit_update()">บันทึก</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='./?content=list-block'">ยกเลิก</button>
                        </div>
                        <input type="hidden" name="block_id" value="<?php echo $entry['block_id'] ?>">
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
    // เช็คชื่อบล็อกซ้ำ
    function check_name_block() {

        jQuery.ajax({
            url: "<?php echo "check_name.php" ?>",
            data: 'block_title=' + $("#block_title").val(),
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
let lat = document.getElementById("lat_name");
let lon = document.getElementById("lon_name");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        lat.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    lat.value = position.coords.latitude;
    lon.value = position.coords.longitude;
}

function submit_update() {
    if (confirm("ยืนยันการแก้ไขข้อมูล")) {
        document.getElementById("update_block").submit();
    }
}
</script>