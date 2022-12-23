<?php 
  session_start();
  ob_start();
  require("../php/config.php"); 
  
  $sql = "SELECT * FROM sfa_user
    LEFT JOIN `sfa_role` ON `sfa_user`.`us_role_id` = `sfa_role`.`role_id`
    LEFT JOIN `sfa_government` ON `sfa_user`.`us_gov_id` = `sfa_government`.`gov_id`
    WHERE us_username	= '".trim($_POST["txtUsername"])."' AND us_password	= '".trim($_POST["txtPassword"])."'";
  $result = mysqli_query($con, $sql);

  
  if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $_SESSION["us_id"] = $row["us_id"];
    $_SESSION["us_fullname"] = $row["us_fname"] . " " . $row["us_lname"];
    $_SESSION["us_username"] = $row["us_username"];
    $_SESSION["us_role_id"] = $row["us_role_id"];
    $_SESSION["us_role_title"] = $row["role_title"];
    $_SESSION["us_gov_id"] = $row["us_gov_id"];
    $_SESSION["us_gov_name"] = $row["gov_name"];

    // echo $_SESSION["us_id"] . "<br/>";
    // echo $_SESSION["us_fullname"] . "<br/>";
    // echo $_SESSION["us_username"] . "<br/>";
    // echo $_SESSION["us_role_id"] . "<br/>";
    // echo $_SESSION["us_role_title"] . "<br/>";
    // echo $_SESSION["us_gov_id"] . "<br/>";
    // echo $_SESSION["us_gov_name"] . "<br/>";
    
    if($_SESSION["us_role_id"] ==1){
      //หน้าจอของผู้ดูแลระบบ
      echo("<script>location.href = '../admin-panel/';</script>");
    } else if($_SESSION["role"] == 2){
       //หน้าจอของผู้เชี่ยวชาญ
       echo("<script>location.href = '../admin-panel/';</script>");
      // header("location: ../expert-panel/");
    } else if($_SESSION["us_role_id"] == 4){
      // หน้าจอของผู้ประกอบการ
    }elseif ($_SESSION["us_role_id"] == 5){
      // หน้าจอของเทศบาล
      echo("<script>location.href = '../local-gov/';</script>");
    } 
    else {
      //กรณีไม่ใช่ role หลักที่มีส่วนสำคัญในระบบ (ผู้ดูแลระบบ ผู้เชี่ยวชาญ เทศบาล(อยู่ในระหว่างการพัฒนา) ผู้ประกอบการ(ถ้ามี อยู่ในระหว่างการพัฒนา)) จะถูกส่งไปหน้านักท่องเที่ยวทั้งหมด
      header("location: ../tourist/?content=disp-block-map");
    }

  } else {
    $api_url = 'https://prepro.informatics.buu.ac.th/team2/Tourist/Auth/Login_tourist/login_tourist_api/'.trim($_POST["txtUsername"]).'/'.trim($_POST["txtPassword"]);

    $json_data = file_get_contents($api_url);

    $response_data = json_decode($json_data);
    if($response_data){
      $_SESSION["id_tourist"] = $response_data->tus_id;
      $_SESSION["username"] = $response_data->tus_firstname. " " . $response_data->tus_lastname;
    

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

    header("location: ../tourist/?content=list-restaurant");
  }

  

?>