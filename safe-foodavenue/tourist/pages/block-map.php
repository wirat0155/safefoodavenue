<style>
  #map {
    height: 70vh;
    width: 100%;
  }

  .maker-title {
    font-size: 20px;
    font-weight: bold;
  }

  .loader_bg {
    position: fixed;
    z-index: 9999999;
    background: #fff;
    width: 100%;
    height: 100%;
    text-align: center;
    justify-content: center;
    align-items: center;
    display: none;

  }

  ::-webkit-scrollbar {
    display: none;
  }

  .loader4 {
    width: 200px;
    height: 200px;
    margin-top: 6rem;
    position: absolute;
    padding: 0px;
    border-radius: 100%;
    border: 5px solid;
    border-top-color: rgba(246, 36, 89, 1);
    border-bottom-color: rgba(255, 255, 255, 0.3);
    border-left-color: rgba(246, 36, 89, 1);
    border-right-color: rgba(255, 255, 255, 0.3);
    -webkit-animation: loader4 1s ease-in-out infinite;
    animation: loader4 1s ease-in-out infinite;
  }

  @keyframes loader4 {
    from {
      transform: rotate(0deg);
    }

    to {
      transform: rotate(360deg);
    }
  }

  @-webkit-keyframes loader4 {
    from {
      -webkit-transform: rotate(0deg);
    }

    to {
      -webkit-transform: rotate(360deg);
    }
  }
</style>

<div id="map" class="map-canvas"></div>
<div class="d-flex justify-content-end">
  <div>
    <button class="btn btn-secondary px-4 m-2" onClick="relocation()">
      <img src="../../assets/img/brand/user.png" alt="" height="20">
      ตำแหน่งปัจจุบัน</button>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  var map;
  var my_lat;
  var my_lon;

  $(document).ready(function() {
    if (location.protocol === "https:") {
      getLocation();
    } else {
      showDefaultPosition();
    }

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
      initMap(my_lat, my_lon);
    }

    function showDefaultPosition() {
      // buu informatics
      // my_lat = 13.2814501;
      // my_lon = 100.9240634;

      // government
      my_lat = 13.2886064;
      my_lon = 100.9145879;
      initMap(my_lat, my_lon);
    }

    function get_block_location() {
      var fetch_location = [];
      $.ajax({
        dataType: "JSON",
        url: "../tourist/get-formalin-detail.php",
        type: "POST",
        cache: false,
        async: false,
        success: function(block_data) {
          //console.log(block_data);
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

    function initMap(my_lat, my_lon) {
      var locations = get_block_location();
      locations.push([0, "", my_lat, my_lon, 0, "user", 1]);
      var myStyles = [{
        featureType: "poi",
        elementType: "labels",
        stylers: [{
          visibility: "off"
        }]
      }];
      //console.log(locations);
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

        // if (locations[i][5] == "user") {
        //   mIcon = "../../assets/img/brand/user.png";
        // } else if (locations[i][4] == 1) {
        //   color = "#fff";
        //   if (locations[i][5] == "res_id") {
        //     mIcon = "../../assets/img/brand/icon-store-grey.png";
        //   }
        // } else {
        //   color = "#42ee7d";
        //   if (locations[i][5] == "res_id") {
        //     mIcon = "../../assets/img/brand/icon-store-green.png";
        //   }
        // }
        // console.log("block_id " + locations[i][0] + " " + locations[i][4]);
        if (locations[i][5] == "user") {
          mIcon = "../../assets/img/brand/user.png";
        } else {
          if (locations[i][4] === 1) mIcon = "../../assets/img/brand/icon-store-grey.png";
          else mIcon = "../../assets/img/brand/icon-store-green.png";;
        }

        var num_restaurant = locations[i][5] == "block_id" ? locations[i][6] : " ";
        num_restaurant = num_restaurant.toString();
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i][2], locations[i][3]),
          map: map,
          title: num_restaurant,
          icon: mIcon,
          label: {
            color: '#000',
            fontSize: '12px',
            fontWeight: '400',
            text: num_restaurant
          }
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            // console.log(locations[i][0], locations[i][5]);
            // $("#map-restaurant-panel").html("คุณคลิ๊ก " + locations[i][5] + " ที่ " + locations[i][0]);
            get_data_restarant_panel(locations[i][5], locations[i][0])
          }
        })(marker, i));
      }
    }
  });

  function relocation() {
    // map.setCenter(new google.maps.LatLng(my_lat, my_lon));
    map.setCenter(new google.maps.LatLng(13.2886064, 100.9145879));
  }

  function get_data_restarant_panel(res_location_type, id) {

    // console.log(res_location_type + id)
    $.ajax({
      url: "./tourist/get_data_map.php",
      method: "POST",
      dataType: "JSON",
      data: {
        res_location_type: res_location_type,
        id: id
      },
      success: function(data) {

        // console.log(data);
        show_data_block(data)
        // show_province_dropdown(data);

      },
      error: function(error) {
        //console.log("error")a}
        alert(error);
      }
    })

  }

  function show_data_block(data) {
    let html = '';

    if (data != "No data") {

      html += '  <div class="row text-center">';
      //loop show data 
      data.data_res.forEach((row_res, index_res) => {

        html += '<div class="col-12 col-md-4 col-xl-12 py-2">';
        html += ' <a href="/tourist/index.php?content=detail-restaurant&id=' + row_res.res_id + '">';
        html += ' <div class="card card-fix card-custom rounded-4 hover-zoom">';

        if (row_res.res_img_path == null) {

          let src = get_jpg_name(row_res.res_title);
          html += '<img class="card-img-top" style="height: 200px; object-fit: cover;" src="' + src + '" alt="Card image cap">';

        } else {

          html += ' <img class="card-img-top w-100" style="height: 200px; object-fit: cover;" src="' + '../admin-panel/php/uploads/img/' + row_res.res_img_path + '" alt="Card image cap">';

        }
        html += '<div class="card-body">';
        html += '<div class="d-flex justify-content-between">';
        html += ' <div  class="p-2">';
        if (row_res.res_for_status == 0) {
          html += '   <span class="badge badge-success text-size-12  text-white">ปลอดภัย</span>';
          //html += '<img src="./../assets/img/icons/common/formalin.png" class="set-pic text-center" alt="test"> <br>';
        }

        html += ' </div>';
        html += '<div  class="p-2">';

        if (row_res.srs_count != null && row_res.srs_sum_review != null) {

          let score = row_res.srs_sum_review / row_res.srs_count;

          html += '   <span class="badge badge-warning-fix text-size-12  text-white"><i class="fas fa-star text-warnng mr-1"></i>' + score.toFixed(1) + '</span>';
          html += '   <span class="text-size-12 text-dark">' + row_res.srs_count + ' รีวิว</span>';

        } else {
          html += '<span>ไม่มีรีวิว</span>';
        }
        html += '</div>';
        html += '</div>';
        html += '<div class="row mt-2">';
        html += '   <div class="col col-sm-12 col-md-12 col-lg-12">';
        html += '       <h2 class="ml-2">' + row_res.res_title + '</h2>';
        html += '    </div> ';
        html += '</div>';
        html += ' <div class="row">';
        html += '     <div class="col">';

        html += '      </div>     ';
        html += '</div>     ';
        html += '</div>     ';
        html += '</div>     ';
        html += '</div>     ';

      });
      html += ' </a>';
      html += ' </div>     ';

      $('#res_list').html(html);
    }
  }

</script>