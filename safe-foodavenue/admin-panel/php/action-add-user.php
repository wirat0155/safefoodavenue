<?php 
     require '../../php/config.php'; 
    //  $bid = $_POST["block_id"]; 
     $prefix = $_POST["us_pre_id"];
     $fname = $_POST["us_fname"];
     $lname = $_POST["us_lname"];
     $role = $_POST["role_id"]; 
     $username = $_POST["us_username"]; 
     $password = $_POST["us_password"];
     
     $sql = "INSERT INTO `sfa_user`(`us_fname`, `us_lname`, `us_username`, `us_password`, `us_role_id`, `us_pre_id`) 
            VALUES ('$fname' ,'$lname','$username','$password','$role','$prefix')"; 
     $query = mysqli_query($con, $sql); 

     echo "<script>
     alert('เพิ่มผู้ใช้งานสำเร็จ');
     window.location.href='../?content=list-user';
     </script>
     ";
     // header("location:../?content=list-user");
?>