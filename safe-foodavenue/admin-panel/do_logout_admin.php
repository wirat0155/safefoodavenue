<!-- 
  /*
  * do_logout_admin
  * do_logout_admin
  * @input -
  * @output -
  * @author Jutamas Thaptong 62160079
  * @Create Date 2565-07-08
  */ 
-->

<?php 

  session_start();
  session_destroy();
  echo("<script>location.href = '../login/login.php';</script>");

?>