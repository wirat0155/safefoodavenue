<!-- 
  /*
  * do_logout
  * do_logout
  * @input -
  * @output -
  * @author Jutamas Thaptong 62160079
  * @Create Date 2565-07-08
  */ 
-->

<?php 

  session_start();
  session_destroy();
  header("location: ../login/login.php");

?>