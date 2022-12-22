<?php 
     require '../../php/config.php'; 
    //  $bid = $_POST["block_id"]; 
     // $fcl_id = $_POST["fcl_id"];
     $bid = $_POST["fcl_id"];
     $startdate = $_POST["fcl_startdate"];
     $enddate = $_POST["fcl_enddate"];
     // echo "$startdate, $enddate "  ;
     
     $sql = "UPDATE `sfa_formalin_checklist` SET `fcl_startdate`='$startdate',`fcl_enddate`='$enddate' WHERE fcl_id = '$bid';
     "; 
     $query = mysqli_query($con, $sql);

     echo "<script>
     alert('แก้ไขรอบสำเร็จ');
     window.location.href='../?content=list-res-schedule';
     </script>
     ";
     
?>