<!-- 
  /*
  * upload
  * upload
  * @input picture test kit 
  * @output form upload
  * @author Jutamas Thaptong 62160079
  * @Create Date 2565-07-08
  */ 
-->

<script>

  function checkUpload(){
    
    if ($("#fileUpload").get(0).files.length == 0) {
      alert("กรุณาเลือกไฟล์ที่ต้องการอัพโหลด")
      return false;
    }

  }

</script>

<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">

        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">อัพโหลดผลการตรวจสารฟอร์มาลิน</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
              <li class="breadcrumb-item active" aria-current="page">อัพโหลดผลการตรวจสารฟอร์มาลิน</li>
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
<div class="container-fluid mt--6">
  
  <div class="row">
    <div class="col">
      <div class="card border-0">
        <div class="table-responsive py-4 px-4">

          <div class="row">
            <div class="col-md text-center">
              <h2>กรุณาอัพโหลดรูปภาพผลการตรวจ</h2>
              <h2>สารฟอร์มาลินอย่างชัดเจน</h2>
            </div>
          </div>

          <div class="row justify-content-md-center py-2">
            <div class="col-md-3 text-center">
              <img src="../assets/img/theme/scan_image.png" alt="" style="width:100%;">
            </div>
          </div>

          <div class="row justify-content-md-center py-4">
            <div class="col-md-2 text-center">

              <form action="index.php?content=do_upload" method="POST" 
                enctype="multipart/form-data">

                <input type="hidden" name="txtMenuId" value="<?= $_GET['menu_id'] ?>">
                <input type="hidden" name="txtResId" value="<?= $_GET['res_id'] ?>">

                <input type="file" id="fileUpload" name="fileUpload">
                <button onclick="return checkUpload()" type="submit" class="w-100 btn btn-lg btn-primary my-4">อัพโหลดรูปภาพ</button>
              </form>
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

  // function doUpload(){
  //   // do upload and use detector api
  //   var formData = new FormData();    
  //   var fileUpload = $('#fileUpload')[0].files;   
    
  //   // Check file selected or not
  //   if(fileUpload.length > 0 ){
  //     formData.append('file',fileUpload[0]);
  //   }


  //   $.ajax({
  //     url: 'index.php?content=do_upload',
  //     data: {
  //       "file[]": formData
  //     },                         
  //     type: 'post',
  //     success: function(response){
  //       console.log(response);
  //     }
  //   });
  // }

</script>