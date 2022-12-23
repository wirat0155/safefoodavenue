<?php
  session_destroy();
  
  echo "<script>
    alert('ออกจากระบบสำเร็จ');
    window.location.href='../';
    </script>
    ";
?>