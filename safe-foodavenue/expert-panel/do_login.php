<!-- 
  /*
  * do_login
  * do_login
  * @input -
  * @output -
  * @author Jutamas Thaptong 62160079
  * @Create Date 2565-07-08
  */ 
-->

<?php 

  session_start();
  require("../php/config.php"); 
  
  $sql = "
    SELECT * 
    FROM sfa_expert
    WHERE expe_username	= '".trim($_POST["txtUsername"])."'
    AND expe_password	= '".trim($_POST["txtPassword"])."'

  ";
  $result = mysqli_query($con, $sql);
  
  if(mysqli_num_rows($result) > 0) {
    
    $row = mysqli_fetch_array($result);

    $_SESSION["id"] = $row["expe_id"];
    $_SESSION["username"] = $row["expe_username"];
    $_SESSION["fullname"] = $row["expe_fname"]." ".$row["expe_lname"];
    $_SESSION["status"] = $row["expe_status"];
    if(isset($_POST["keepme"])) {
      $_SESSION["is_keep_me"] = $_POST["keepme"];
    }

  } else {

    echo "
      <script>
        alert('เข้าสู่ระบบไม่สำเร็จ');
        window.history.back();
      </script>
    ";

    return;
  }

  header("location: index.php");

?>