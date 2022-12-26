<?php 
     require '../../php/config.php'; 
     $role = $_POST["role_title"]; 
     
     $sql = "INSERT INTO `sfa_role`(`role_title`) VALUES ('$role')"; 
     $query = mysqli_query($con, $sql); 

     echo "<script>
     alert('เพิ่มประเภทผู้ใช้งานสำเร็จ');
     window.location.href='../?content=list-user-role';
     </script>
     ";
?>