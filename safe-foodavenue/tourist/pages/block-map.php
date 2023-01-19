<style>
  #map {
    height: 650px;
    width: 100%;
  }
  .maker-title {
    font-size: 20px;
    font-weight: bold;
  }
</style>

<div id="map" class="map-canvas"></div>
<button onClick="relocation()">Re Location</button>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  // var my_lat = 13.285381;
  // var my_lon = 100.913837;
  var my_lat;
  var my_lon;
  var map;
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
    console.log(position.coords.latitude, position.coords.longitude);
    initMap(position.coords.latitude, position.coords.longitude);
  }

  function relocation() {
    map.setCenter(new google.maps.LatLng(my_lat, my_lon));
  }

  function get_block_location() {
    console.log("call get_location_data");
    var fetch_location = []
    $.ajax({
      dataType: "JSON",
      url: "../tourist/get-formalin-detail.php",
      type: "POST",
      cache: false,
      async: false,
      success: function(block_data) {
        for (let i = 0; i < block_data.length; i++) {
          fetch_location.push(block_data[i])
        }
      },
      error: function() {
        console.log("get_location_data return error");
      }
    });
    return fetch_location;
  }

  function get_restaurant_data(block_id) {
    var returnData = []
    $.ajax({
      url: "../tourist/get-restuarant-data.php",
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
  
  // console.log(my_lat, my_lon);
  function initMap(my_lat, my_lon) {
    var locations = get_block_location(); // get location
    locations.push([0, "", my_lat, my_lon, 0, "user", 1]);
    console.log(locations);
    var myStyles = [{
      featureType: "poi",
      elementType: "labels",
      stylers: [{
        visibility: "off"
      }]
    }];
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: new google.maps.LatLng(my_lat, my_lon),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      styles: myStyles
    });
    var infowindow = new google.maps.InfoWindow();
    var marker, i
    var color = "#fff";
    for (i = 0; i < locations.length; i++) {
      var mIcon = {
        path: google.maps.SymbolPath.CIRCLE,
        fillOpacity: 1,
        fillColor: color,
        strokeOpacity: 1,
        strokeWeight: 1,
        strokeColor: '#333',
        scale: 12
      };

      if (locations[i][5] == "user") {
        mIcon = "../../assets/img/brand/favicon-grey.png";
      } else if (locations[i][4] == 1) {
        color = "#fff";
        if (locations[i][5] == "res_id") {
          mIcon = "../../assets/img/brand/icon-store-grey.png";
        }
      } else {
        color = "#9dfa64";
        if (locations[i][5] == "res_id") {
          mIcon = "../../assets/img/brand/icon-store-green.png";
        }
      }

      var num_restaurant = locations[i][6];
      num_restaurant = num_restaurant.toString();
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][2], locations[i][3]),
        // icon: image,
        map: map,
        title: num_restaurant,
        icon: mIcon,
        label: {color: '#000', fontSize: '12px', fontWeight: '400',
          text: num_restaurant}
      });
  
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          console.log(locations[i][0], locations[i][5]);
        }
      })(marker, i));
    }
  }
</script>