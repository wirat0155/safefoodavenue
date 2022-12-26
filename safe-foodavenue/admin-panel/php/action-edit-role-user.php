<?php 
     require '../../php/config.php'; 
     $role_id = $_POST["role_id"];
     $role = $_POST["role_title"]; 
     
     $sql = "UPDATE `sfa_role` SET `role_title`= '$role' WHERE role_id = $role_id"; 
     $query = mysqli_query($con, $sql); 

     echo "<script>
     alert('เเก้ไขประเภทผู้ใช้งานสำเร็จ');
     window.location.href='../?content=list-user-role';
     </script>
     ";
?>