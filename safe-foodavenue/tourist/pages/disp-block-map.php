<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">แผนที่ตั้งร้านอาหาร</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="../"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="../">หน้าเเรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="?content=list-restaurant">รายการร้านอาหาร</a></li>
                            <li class="breadcrumb-item active" aria-current="page">เเผนที่ร้านอาหาร</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <!-- <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a> -->
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
                <?php include "block-map.php"; ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include("footer.php"); ?>
</div>