<!-- 
/*
* detail-restaurant
* detail-restaurant
* @input entprenuer name,  
* @output detail restaurant
* @author Jutamas Thaptong 62160079
* @Create Date 2565-06-24
*/ 
-->

<script>
function setRate(index, score) {

    $("#rating-score-" + index).val(score);

    for (let i = 1; i <= 5; i++) {
        if (i <= score) {
            $("#star-" + index + "-" + i).addClass('text-warning');
        } else {
            $("#star-" + index + "-" + i).removeClass('text-warning');
        }
    }

}
</script>

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

<!-- Content -->
<?php
  
  $perpage = 12;
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }
  $start = ($page - 1) * $perpage;

  $bid = NULL;
  $q = NULL;

  if (isset($_GET["bid"]) && isset($_GET["q"])) {
    $bid = $_GET["bid"];
    $q = $_GET["q"];
  }
  if($bid == NULL && $q == NULL){
    $sql = "
    SELECT * 
    FROM sfa_restaurant 
    LEFT JOIN sfa_block ON sfa_block.block_id = sfa_restaurant.res_block_id 
    LIMIT "  . $start .  "," . $perpage; 
  }
  else if ($bid != "" && $q == ""){ 
    $sql = "
    SELECT * 
    FROM sfa_restaurant 
    LEFT JOIN sfa_block ON sfa_block.block_id = sfa_restaurant.res_block_id 
    WHERE sfa_block.block_id = $bid
    LIMIT " . $start .  "," . $perpage; 
  }
  else if ($bid == "" && $q != ""){ 
    $sql = "
    SELECT * 
    FROM sfa_restaurant 
    LEFT JOIN sfa_block ON sfa_block.block_id = sfa_restaurant.res_block_id 
    WHERE res_title LIKE '%$q%'
    LIMIT  $start , $perpage
  "; 
  }
  else if ($bid != "" && $q != ""){ 
    $sql = "
    SELECT * 
    FROM sfa_restaurant 
    LEFT JOIN sfa_block ON sfa_block.block_id = sfa_restaurant.res_block_id 
    WHERE res_title LIKE '%$q%' AND sfa_block.block_id = $bid
    LIMIT  $start , $perpage 
  "; 
  }


  $tSql = $sql; //Temporary
$dbRestaurant = mysqli_query($con, $sql) or Die("Check");
  
  $sql = "
    SELECT * 
    FROM sfa_block 
  "; 
  $dbBlock = mysqli_query($con, $sql);
  
  function getResImgPath($imgPath){
    if ($imgPath) {
      return "https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/admin-panel/php/uploads/img/".$imgPath;
    } 
    return "https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/assets/img/theme/detail-banner-default.jpg";
  }
?>


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
                                    <div class="col-md-2">
                                        <select class="form-control" name="s_block" id="s_block" onchange="get_block_search()">
                                            <option value="" selected disabled>เลือกสถานที่</option>
                                            <?php foreach($dbBlock as $key => $value): ?>
                                            <option value="<?= $value["block_id"] ?>" <?php if($bid == $value["block_id"] ){echo "selected";} ?>><?= $value["block_title"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="s_restaurant" id="s_restaurant" placeholder="ชื่อร้านอาหาร" aria-describedby="button-addon2" onchange="get_keyword_search()" value="<?php echo $q; ?>">
                                            <button class="btn btn-primary" type="button" id="button-addon2" onclick="get_keyword_search()">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <script>
                    function get_block_search() {
                        var val = document.getElementById('s_block').value;
                        window.location.href = '?content=list-restaurant&bid=' + val;
                    }

                    function get_keyword_search() {
                        var val1 = document.getElementById('s_block').value;
                        var val2 = document.getElementById('s_restaurant').value;
                        if (val1 != "" && val2 != "") {
                            window.location.href = '?content=list-restaurant&bid=' + val1 + '&q=' + val2;
                        } else if (val1 == "" && val2 != "") {
                            window.location.href = '?content=list-restaurant&q=' + val2;
                        }

                    }
                    </script>
                    <div class="row justify-content-md-center" style="padding: 0px 75px;">

                        <?php while($row = mysqli_fetch_array($dbRestaurant)){ ?>
                        <div class="col-md-4">
                            <?php
                            $res_img_id=$row['res_id'];
    
                            $sql_image = " SELECT * FROM sfa_res_image WHERE res_img_id='$res_img_id'";
                            $dbRestaurantImg = mysqli_query($con, $sql_image);
                            $resImg = mysqli_fetch_array($dbRestaurantImg);
                            ?>
                            <div class="div-res">
                                <a href="?content=detail-restaurant&id=<?= $row["res_id"] ?>">
                                    <div class="row">
                                        <div class="col-md">
                                            <div style="width: 100%; max-height:250px; overflow:hidden; border-radius:10px 10px 0px 0px;">
                                                <img src="<?php echo getResImgPath($resImg["res_img_path"])?>" alt="" style="width: 100%;">

                                            </div>
                                        </div>
                                    </div>


                                    <div style="padding: 10px 20px;">
                                        <div class="row">
                                            <div class="col-md py-2 h2" style="color: #3366FF;">

                                                <?php echo $row["res_title"]?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md py-2">
                                                <i class="ni ni-pin-3"></i>
                                                <?= $row["block_title"] ?>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            </a>

                        </div>
                        <?php } ?>
                    </div>

                    <?php
            // PAGINATION
            $sql2 = "select * from sfa_restaurant ";
            $tSql = substr($tSql, 0, strlen($tSql) - 18);
            $query2 = mysqli_query($con, $tSql);
            $total_record = mysqli_num_rows($query2);
            $total_page = ceil($total_record / $perpage);

            $paging_info = array(); // start out array
            $max_pagination = 5;
            $paging_info['si']        = ($page * $max_pagination) - $max_pagination; // what row to start at
            $paging_info['pages']     = $total_page;                   // add the pages
            $paging_info['curr_page'] = $page; 
          ?>

                    <div class="row">
                        <div class="col-md text-center">
                            <div class="pagination">
                                <!-- If the current page is more than 1, show the First and Previous links -->
                                <?php if($paging_info['curr_page'] > 1) : ?>
                                <a class="" href="./index.php?content=list-restaurant&page=<?= $paging_info['curr_page'] - 1 ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                                <?php endif; ?>

                                <?php
                    //setup starting point

                    //$max is equal to number of links shown
                    $max = 5;
                    if($paging_info['curr_page'] < $max)
                        $sp = 1;
                    elseif($paging_info['curr_page'] >= ($paging_info['pages'] - floor($max / 2)) )
                        $sp = $paging_info['pages'] - $max + 1;
                    elseif($paging_info['curr_page'] >= $max)
                        $sp = $paging_info['curr_page']  - floor($max/2);
                ?>

                                <!-- If the current page >= $max then show link to 1st page -->
                                <?php if($paging_info['curr_page'] >= $max) : ?>

                                <a class="" href="./index.php?content=list-restaurant&page=1">1</a>
                                <a href="#">...</a>

                                <?php endif; ?>

                                <!-- Loop though max number of pages shown and show links either side equal to $max / 2 -->
                                <?php for($i = $sp; $i <= ($sp + $max -1);$i++) : ?>

                                <?php
                        if($i > $paging_info['pages'])
                            continue;
                    ?>

                                <?php $active = $paging_info['curr_page'] == $i ? "active" : ""; ?>
                                <a class="<?= $active ?>" href="./index.php?content=list-restaurant&page=<?php echo $i; ?>"><?php echo $i; ?></a>

                                <?php endfor; ?>


                                <!-- If the current page is less than say the last page minus $max pages divided by 2-->
                                <?php if($paging_info['curr_page'] < ($paging_info['pages'] - floor($max / 2))) : ?>

                                <a href="#">...</a>
                                <a class="" href="./index.php?content=list-restaurant&page=<?php echo $paging_info['pages']; ?>"><?php echo $paging_info['pages']; ?></a>

                                <?php endif; ?>

                                <!-- Show last two pages if we're not near them -->
                                <?php if($paging_info['curr_page'] < $paging_info['pages']) : ?>

                                <a class="" href="./index.php?content=list-restaurant&bid=<?php echo $bid; ?>&page=<?= $paging_info['curr_page'] + 1 ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include("footer.php"); ?>
</div>
<script>
$('form#search_res').submit(function(event) {
    event.preventDefault();
    // รับค่าจากฟอร์ม
    var block_name = $('input#s_block').val();
    var res_name = $('input#s_restaurant').val();
    // ส่งค่าไป search_result.php ด้วย jQuery Ajax
    $.ajax({
        url: 'search_result.php',
        type: 'POST',
        dataType: 'json',
        data: {
            block_name: block_name,
            res_name: res_name
        },
        success: function(data) {
            if (data.length != 0) {
                // กรณีมีข้อมูล


                // วนลูปข้อมูล JSON 
                $.each(data, function(key, value) {


                });
            } else {
                alert('ไม่พบข้อมูลที่ค้นหา');
            }
        }
    });
});
</script>