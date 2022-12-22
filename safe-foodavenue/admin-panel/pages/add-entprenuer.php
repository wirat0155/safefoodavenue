   <!-- 
/*
* add-entprenuer
* add-entprenuer
* @input entprenuer name,  
* @output form add restaurant
* @author Suwapat Saowarod 62160340
* @Create Date 2564-07-18
*/ 
-->
   <!-- Header -->
   <!-- <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet"> -->
   <div class="header bg-primary pb-6">
       <div class="container-fluid">
           <div class="header-body">
               <div class="row align-items-center py-4">
                   <div class="col-lg-6 col-7">
                       <h6 class="h2 text-white d-inline-block mb-0">เพิ่มผู้ประกอบการ</h6>
                       <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                           <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                               <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
                               <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
                               <li class="breadcrumb-item active" aria-current="page">ฺเพิ่มผู้ประกอบการ</li>
                           </ol>
                       </nav>
                   </div>
                   <div class="col-lg-6 col-5 text-right">
                       <a href="#" class="btn btn-sm btn-neutral">New</a>
                       <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- <style>
       body {
           font-family: 'Prompt';
       }
   </style> -->

   <!-- main content -->
   <div class="container-fluid mt--6">
       <div class="row">
           <div class="col">
               <div class="card border-0">
                   <div class="table-responsive py-4">
                       <div class="card-body">
                           <form action="#" method="POST">

                               <div class="form-group">
                                   <h2>ข้อมูลส่วนตัว</h2>
                                   <div class="row">

                                       <!-- คำนำหน้า -->
                                       <div class="col-md-2">
                                           <label for="ent_title" style="color:#000000; margin-bottom: 4px;">คำนำหน้า</label><br>
                                           <select class="form-control" name="ent_title" id="ent_title" required>
                                               <option value="" selected disabled>เลือกคำนำหน้า</option>
                                           </select>
                                       </div>
                                       <!-- ชื่อจริง -->
                                       <div class="col-md-4">
                                           <label for="ent_firstname" style="color:black">ชื่อจริง</label>
                                           <input type="text" class="form-control" placeholder="ชื่อภาษาไทย" name='ent_firstname' required>
                                       </div>
                                       <!-- กรอกนามสกุล -->
                                       <div class="col-md-4">
                                           <label for="ent_lastname" style="color:black">นามสกุล</label>
                                           <input type="text" class="form-control" placeholder="นามสกุลภาษาไทย" name='ent_lastname' required>
                                       </div>
                                       <!-- หมายเลขบัตรประชาชน -->
                                       <div class="col-md-4">
                                           <label for="ent_id_card" style="color:black">เลขบัตรประชาชน</label>
                                           <input type="text" class="form-control" placeholder="หมายเลขบัตรประชาชน" name='ent_id_card'>
                                       </div>
                                       <!-- กรอกวันเกิด -->
                                       <div class="col-md-4">
                                           <label for="ent_bd" style="color:black">วันเกิด</label>
                                           <input type="date" class="form-control" name="ent_birthdate" required>
                                       </div>
                                   </div>
                                   <hr>
                                   <h2>ข้อมูลติดต่อ</h2>
                                   <div class="row">
                                       <!-- กรอกเบอร์โทรศัพท์ -->
                                       <div class="col-md-4">
                                           <label for="ent_tel" style="color:black">เบอร์โทรศัพท์</label>
                                           <input type="tel" id="ent_tel" class="form-control" placeholder="000-000-0000" name='ent_tel' pattern="[0]{1}[0-9]{2}-[0-9]{3}-[0-9]{4}" required>
                                       </div>

                                       <!-- กรอกอีเมล -->
                                       <div class="col-md-4">
                                           <label for="ent_email" style="color:black">อีเมล</label>
                                           <input type="text" class="form-control" placeholder="example@email.com" name='ent_email' required>
                                       </div>
                                   </div>
                               </div>
                               <div class="row pb-4">
                                   <div class="col-md-4">
                                       <input type="submit" class="btn btn-success" value="บันทึก">
                                       <input type="reset" class="btn btn-secondary" value="ยกเลิก">
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- Footer -->
       <?php include("footer.php"); ?>
   </div>