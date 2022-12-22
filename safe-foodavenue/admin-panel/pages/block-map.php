<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<style>
/* Set the size of the div element that contains the map */
#map {
    height: 650px;
    /* The height is 400 pixels */
    width: 100%;
    /* The width is the width of the web page */
}

.maker-title {
    font-size: 20px;
    font-weight: bold;
}
</style>

<div id="map" class="map-canvas"></div>

<script>
// Initialize and add the map 
function getLocationData() {
    var fetch_location = []
    $.ajax({
        url: "../admin-panel/get-formalin-detail.php",
        type: "POST",
        cache: false,
        async: false,
        success: function(dataResult) {
            for (let index = 0; index < dataResult.length; index++) {
                fetch_location.push(dataResult[index])
            }
        }
    });
    return fetch_location
}

function getRestuarantData(block_id) {
    var returnData = []
    $.ajax({
        url: "../admin-panel/get-restaurant-detail.php",
        type: "POST",
        data: {
            "block_id": block_id
        },
        cache: false,
        async: false,
        success: function(dataResult) {
            for (let index = 0; index < dataResult.length; index++) {
                returnData.push({
                    res_name: dataResult[index][0],
                    result: dataResult[index][1]
                })
            }
        }
    });

    return returnData
}

var locations = getLocationData()
// console.log(locations)
var myStyles = [{
    featureType: "poi",
    elementType: "labels",
    stylers: [{
        visibility: "off"
    }]
}];
var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: new google.maps.LatLng(13.285381, 100.913837),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    styles: myStyles
});

var infowindow = new google.maps.InfoWindow();

var marker, i;

for (i = 0; i < locations.length; i++) {

    var restStatus = getRestuarantData(locations[i][0])
    var checkStatus = true;
    for (let index = 0; index < restStatus.length; index++) {
        const element = restStatus[index];
        var status = element.result;
        console.log(status);
        if (!status.includes("รอตรวจสอบ")) {
            // image = "../assets/img/brand/favicon-grey.png";
            checkStatus = false;
        }

    }
    if (checkStatus) {
        image = "../assets/img/brand/icon-store-grey.png";
        
    } else {
        image = "../assets/img/brand/icon-store-green.png";
    }

    marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][2], locations[i][3]),
        icon: image,
        map: map
    });



    google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {

            // get restuarant list
            var restuarantContent = getRestuarantData(locations[i][0])

            // set window content
            var makerContent = ""
            // title
            makerContent += "<div class='maker-title'>" + locations[i][1] + "</div>";
            // restuarant content
            makerContent += "<table style='width:100%'>";
            for (let index = 0; index < restuarantContent.length; index++) {
                const element = restuarantContent[index];
                var row = "<tr><td>" + element.res_name + "</td><td>" + element.result + "</td></tr>";
                makerContent += row;
            }
            makerContent += "</table>";

            infowindow.setContent(makerContent);
            infowindow.open(map, marker);
        }
    })(marker, i));
}
</script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<style>
/* Set the size of the div element that contains the map */
#map {
    height: 650px;
    /* The height is 400 pixels */
    width: 100%;
    /* The width is the width of the web page */
}

.maker-title {
    font-size: 20px;
    font-weight: bold;
}
</style>

<div id="map" class="map-canvas"></div>

<script>
// Initialize and add the map 
function getLocationData() {
    var fetch_location = []
    $.ajax({
        url: "https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/tourist/get-formalin-detail.php",
        type: "POST",
        cache: false,
        async: false,
        success: function(dataResult) {
            for (let index = 0; index < dataResult.length; index++) {
                fetch_location.push(dataResult[index])
            }
        }
    });
    return fetch_location
}

function getRestuarantData(block_id) {
    var returnData = []
    $.ajax({
        url: "https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/tourist/get-restuarant-data.php",
        type: "POST",
        data: {
            "block_id": block_id
        },
        cache: false,
        async: false,
        success: function(dataResult) {
            for (let index = 0; index < dataResult.length; index++) {
                returnData.push({
                    res_name: dataResult[index][0],
                    result: dataResult[index][1]
                })
            }
        }
    });

    return returnData
}

var locations = getLocationData()
// console.log(locations)
var myStyles = [{
    featureType: "poi",
    elementType: "labels",
    stylers: [{
        visibility: "off"
    }]
}];
var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: new google.maps.LatLng(13.285381, 100.913837),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    styles: myStyles
});

var infowindow = new google.maps.InfoWindow();

var marker, i;

for (i = 0; i < locations.length; i++) {

    var restStatus = getRestuarantData(locations[i][0])
    var checkStatus = true;
    for (let index = 0; index < restStatus.length; index++) {
        const element = restStatus[index];
        var status = element.result;
        console.log(status);
        if (!status.includes("รอตรวจสอบ")) {
            // image = "../assets/img/brand/favicon-grey.png";
            checkStatus = false;
        }

    }
    if (checkStatus) {
        image = "./assets/img/brand/store-grey.png";

    } else {
        image = "./assets/img/brand/store-green.png";
    }

    marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][2], locations[i][3]),
        icon: image,
        map: map
    });



    google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {

            // get restuarant list
            var restuarantContent = getRestuarantData(locations[i][0])

            // set window content
            var makerContent = ""
            // title
            makerContent += "<div class='maker-title'>" + locations[i][1] + "</div>";
            // restuarant content
            makerContent += "<table style='width:100%'>";
            for (let index = 0; index < restuarantContent.length; index++) {
                const element = restuarantContent[index];
                var row = "<tr><td>" + element.res_name + "</td><td>" + element.result + "</td></tr>";
                makerContent += row;
            }
            makerContent += "</table>";

            infowindow.setContent(makerContent);
            infowindow.open(map, marker);
        }
    })(marker, i));
}
</script> -->