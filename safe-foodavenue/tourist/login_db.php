<?php 
	
    session_start();
  require("../php/config.php"); 
  
  $sql = "
    SELECT * 
    FROM sfa_tourist
    WHERE tour_username	= '".trim($_POST["txtUsername"])."'
    AND tour_password	= '".trim($_POST["txtPassword"])."'

  ";
  $result = mysqli_query($con, $sql);
  
  if(mysqli_num_rows($result) > 0) {
    
    $row = mysqli_fetch_array($result);

    $_SESSION["id_tourist"] = $row["tour_id"];
    $_SESSION["username_tourist"] = $row["tour_username"];
   

    if(isset($_POST["login"])) {
      $_SESSION["is_login"] = $_POST["login"];
    }

  } else {
    $api_url = 'https://prepro.informatics.buu.ac.th/team2/Tourist/Auth/Login_tourist/login_tourist_api/'.trim($_POST["txtUsername"]).'/'.trim($_POST["txtPassword"]);

    $json_data = file_get_contents($api_url);

    $response_data = json_decode($json_data);
    if($response_data){
      $_SESSION["id_tourist"] = $response_data->tus_id;
      $_SESSION["username_tourist"] = $response_data->tus_username;
    

      if(isset($_POST["login"])) {
        $_SESSION["is_login"] = $_POST["login"];
      }
    }else{
      echo "
        <script>
          alert('เข้าสู่ระบบไม่สำเร็จ');
          window.history.back();
        </script>
      ";

      return;
    }
  }

  header("location: https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/tourist/?content=list-restaurant");

?>