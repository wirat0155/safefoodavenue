<!-- 
/*
* add-zone
* add-zone
* @input entprenuer name,  
* @output form add zone
* @author Jutamas Thaptong 62160079
* @Create Date 2565-06-20
*/ 
-->

<script>
let location_order = 1;

function confirmDelete(order) {

    if (confirm("ต้องการลบจุดที่เลือก?")) {
        // to delete zone
        $("#location_" + order).remove()
    }
    return false;

}

function addLocation() {

    $("#locationPanel").append('' +
        '<div id="location_' + location_order + '" class="row pb-4">' +
        '<div class="col-md-4">' +
        '<label>ละติจูด</label>' +
        '<input type="text" id="zone_lat' + location_order + '" name="zone_lat" class="form-control">' +
        '</div>' +
        '<div class="col-md-4">' +
        '<label>ลองจิจูด</label>' +
        '<input type="text" id="zone_lon' + location_order + '" name="zone_lon" class="form-control">' +
        '</div>' +
        '<div class="col-md-4">' +
        '<label>&nbsp;</label><br>' +
        '<button type="button" class="btn btn-danger" onclick="return confirmDelete(' + location_order + ')">ลบ</button>' +
        '</div>' +
        '</div>'
    )

    location_order += 1;
    // to add postion
}

/*
 * check_name_block
 * check name block that have in database
 * @input 
 * @output 
 * @author Nantasiri Saiwaew
 * @Create Date 2565-06-29
 */
// เช็คชื่อโซนซ้ำ
function check_zone_name() {

    jQuery.ajax({
        url: "<?php echo "check_name.php" ?>",
        data: 'zone_title=' + $("#zone_title").val(),
        type: "POST",
        success: function(data) {
            $("#status_zone_title").html(data);
        },
        error: function() {}
    });
}
</script>

<?php
$sql = "SELECT * FROM sfa_government";
$arr_government= mysqli_query($con, $sql);
?>

<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">เพิ่มโซนร้านอาหาร</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ฺเพิ่มโซนร้านอาหาร</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card border-0">
                <div class="table-responsive py-4 px-4">

                    <form action="./php/action-add-zone.php" method="POST" enctype="multipart/form-data" id="add_zone">
                        <div class="row pb-4">
                            <div class="col-md-6">
                                <label class="required">ชื่อโซนร้านอาหาร</label>
                                <input type="text" id="zone_title" name="zone_title" class="form-control" placeholder="ใส่ชื่อโซนร้านอาหาร" oninput="check_zone_name()" required>
                                <span id="status_zone_title"></span>
                            </div>
                        </div>

                        <div class="row pb-4">
                            <div class="col-md">
                                <label class="required">รายละเอียดโซนร้านอาหาร</label>
                                <textarea id="zone_description" name="zone_description" class="form-control" rows="3" placeholder="ใส่รายละเอียดโซนร้านอาหาร" required></textarea>
                            </div>
                        </div>

                        <div class="row pb-4">
                            <div class="col-md-6">
                                <label class="required" for="zone_gov_id">องค์กรปกครองส่วนท้องถิ่น</label>
                                <select id="zone_gov_id" name="zone_gov_id" class="select2 form-control" required>
                                    <option value="" selected disabled>เลือกองค์กรปกครองส่วนท้องถิ่น</option>
                                    <?php 
                                    while ($obj_government = mysqli_fetch_array($arr_government)) { ?>
                                        <option value="<?= $obj_government["gov_id"] ?>">
                                            <?= $obj_government["gov_name"] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="row pb-4">
                            <div class="col-md-8">
                                <label>ตำแหน่งที่ตั้ง
                                    <!-- <span class="text-danger">(Dynamic form)</span> -->
                                </label>&nbsp&nbsp <button type="button" class="btn btn-primary" onclick="getLocation()"> <i class="ni ni-pin-3"></i> &nbsp ตำแหน่งปัจจุบัน</button>
                            </div>
                            <!-- <div class="col-md-4 text-end">
                                <button type="button" class="btn btn-info" onclick="addLocation()">+เพิ่มตำแหน่ง</button>
                            </div> -->
                        </div>

                        <div id="locationPanel">

                            <div class="row pb-4">
                                <div class="col-md-4">
                                    <label class="required">ละติจูด</label>
                                    <input type="number" id="zone_lat" name="zone_lat" class="form-control" required>
                                    <span class="text-danger" id="error_zone_lat"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="required">ลองจิจูด</label>
                                    <input type="number" id="zone_lon" name="zone_lon" class="form-control" required>
                                    <span class="text-danger" id="error_zone_lon"></span>
                                </div>
                            </div>

                        </div>

                        <div class="row pb-4">
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-success" value="บันทึก">
                                <input type="reset" class="btn btn-secondary" onclick="location.href='./?content=list-zone'" value="ยกเลิก">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <!-- Footer -->
    <?php include("footer.php"); ?>
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
        $sql = "SELECT * FROM sfa_zone WHERE `zone_lat` IS NOT NULL AND `zone_lon` IS NOT NULL";
        $obj = mysqli_query($con, $sql);
        ?>
var locations = [
    <?php
            while ($row = mysqli_fetch_array($obj)) {
            ?>['<?php echo $row["zone_title"]; ?>', <?php echo $row["zone_lat"]; ?>, <?php echo $row["zone_lon"]; ?>],
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

for (i = 0; i < script locations.length; i++) {
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
<script>
let lat_log = document.getElementById("zone_lat");
let lon_log = document.getElementById("zone_lon");

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
</script>