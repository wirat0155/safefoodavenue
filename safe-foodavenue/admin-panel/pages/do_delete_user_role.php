<?php
  require("../php/config.php");

  $sql = "DELETE FROM sfa_role WHERE role_id = '". $_GET["role_id"] . "'";
  mysqli_query($con, $sql);

  echo "<script>
  alert('ลบผู้ใช้งานสำเร็จ');
  window.location.href='./?content=list-user-role';
  </script>
  ";
?>